<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Billing;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Billing controller.
 *
 */
class BillingController extends Controller
{
    /**
     * Lists all billing entities.
     *
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $billings = $em->getRepository('CoreBundle:Billing')->findAll();

        return $this->render('CoreBundle:Billing:list.html.twig', array(
            'billings' => $billings,
        ));
    }

    /**
     * Creates a new billing entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $companies = $em->getRepository('CoreBundle:Company')->findAll();
        $lastBill = $em->getRepository('CoreBundle:Billing')->findOneBy(array(), array('id' => 'desc'));

        $billing = new Billing();

        $form = $this->createForm('CoreBundle\Form\BillingType', $billing);
        $form->handleRequest($request);

        if ('POST' === $request->getMethod()) {

            $validator = $this->get('validator');
            $errors = $validator->validate($billing);
            if (count($errors) <= 0) {
                if ($form->isSubmitted() && $form->isValid()) {

                    //$billing->setBillingDate(new \DateTime);
                    $em->persist($billing);
                    $em->flush();

                    return $this->redirectToRoute('billing_show', array('id' => $billing->getId()));
                }
            }
        }

        return $this->render('CoreBundle:Billing:new.html.twig', array(
            'billing' => $billing,
            'companies' => $companies,
            'lastBill' => $lastBill,
            'errors' => isset($errors) ? $errors : array(),
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a billing entity.
     *
     */
    public function showAction(Billing $billing)
    {
        $em = $this->getDoctrine()->getManager();

        $setting = $em->getRepository('CoreBundle:Setting')->findOneBy(array(), array('id' => 'desc'));

        $deleteForm = $this->createDeleteForm($billing);

        return $this->render('CoreBundle:Billing:show.html.twig', array(
            'billing' => $billing,
            'setting' => $setting,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a billing print view.
     *
     */
    public function printViewAction(Billing $billing)
    {
        $em = $this->getDoctrine()->getManager();

        $setting = $em->getRepository('CoreBundle:Setting')->findOneBy(array(), array('id' => 'desc'));

        return $this->render('CoreBundle:Billing:printView.html.twig', array(
            'billing' => $billing,
            'setting' => $setting
        ));
    }

    /**
     * Displays a form to edit an existing billing entity.
     *
     */
    public function editAction(Request $request, Billing $billing)
    {
        $deleteForm = $this->createDeleteForm($billing);
        $editForm = $this->createForm('CoreBundle\Form\BillingType', $billing);
        $editForm->handleRequest($request);

        if ('POST' === $request->getMethod()) {

            $validator = $this->get('validator');
            $errors = $validator->validate($billing);
            if (count($errors) <= 0) {

                $corebundle_billing = $request->get('corebundle_billing');
                $billingDate = $corebundle_billing['billingDate'];
                $parts = explode('/', $billingDate);
                $billingDate = $parts[2] . '-' . $parts[0] . '-' . $parts[1];
                $billing->setBillingDate(new \DateTime(date("Y-m-d", strtotime($billingDate))));
                
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('billing_list');
            }
        }

        return $this->render('CoreBundle:Billing:edit.html.twig', array(
            'billing' => $billing,
            'errors' => isset($errors) ? $errors : array(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Billing entity.
     *
     */
    public function deleteAction(Request $request, Billing $billing)
    {
        $form = $this->createDeleteForm($billing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($billing);
            $em->flush();
        }

        return $this->redirectToRoute('billing_list');
    }

    /**
     * Creates a form to delete a billing entity.
     *
     * @param Billing $billing The billing entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Billing $billing)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('billing_delete', array('id' => $billing->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Finds and mail a bill.
     *
     */
    public function mailBillAction(Request $request, Billing $billing)
    {
        $em = $this->getDoctrine()->getManager();

        $setting = $em->getRepository('CoreBundle:Setting')->findOneBy(array(), array('id' => 'desc'));

        $html = $this->renderView('CoreBundle:Billing:printView.html.twig', array(
            'billing' => $billing,
            'setting' => $setting,
            'sendmail' => true
        ));

        $message = \Swift_Message::newInstance()
            ->setSubject('Test')
            ->setFrom('manishchugh2k4@gmail.com')
            ->setTo($billing->getCompany()->getEmail())
            ->setReplyTo('manishchugh2k4@gmail.com')
            ->setContentType('text/html')
            ->setBody($html);
        //$this->get('mailer')->send($message);
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Mail has been sent successfully!');

        return $this->redirectToRoute('billing_show', array('id' => $billing->getId()));
    }
}
