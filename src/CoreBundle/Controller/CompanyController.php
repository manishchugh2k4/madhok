<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Company controller.
 *
 */
class CompanyController extends Controller
{
    /**
     * Lists all company entities.
     *
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $companies = $em->getRepository('CoreBundle:Company')->findAll();

        return $this->render('CoreBundle:Company:list.html.twig', array(
            'companies' => $companies,
        ));
    }

    /**
     * Creates a new company entity.
     *
     */
    public function newAction(Request $request)
    {
        $company = new Company();
        $form = $this->createForm('CoreBundle\Form\CompanyType', $company);
        $form->handleRequest($request);

        if ('POST' === $request->getMethod()) {
        
            $validator = $this->get('validator');
            $errors = $validator->validate($company);
            if (count($errors) <= 0) {
                if ($form->isSubmitted() && $form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($company);
                    $em->flush();

                    return $this->redirectToRoute('company_show', array('id' => $company->getId()));
                }
            }
        }

        return $this->render('CoreBundle:Company:new.html.twig', array(
            'company' => $company,
            'errors' => isset($errors) ? $errors : array(),
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a company entity.
     *
     */
    public function showAction(Company $company)
    {
        $deleteForm = $this->createDeleteForm($company);

        return $this->render('CoreBundle:Company:show.html.twig', array(
            'company' => $company,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing company entity.
     *
     */
    public function editAction(Request $request, Company $company)
    {
        $deleteForm = $this->createDeleteForm($company);
        $editForm = $this->createForm('CoreBundle\Form\CompanyType', $company);
        $editForm->handleRequest($request);

        if ('POST' === $request->getMethod()) {
        
            $validator = $this->get('validator');
            $errors = $validator->validate($company);
            if (count($errors) <= 0) {

                if ($editForm->isSubmitted() && $editForm->isValid()) {
                    $this->getDoctrine()->getManager()->flush();

                    return $this->redirectToRoute('company_list');
                }
            }
        }

        return $this->render('CoreBundle:Company:edit.html.twig', array(
            'company' => $company,
            'errors' => isset($errors) ? $errors : array(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a company entity.
     *
     */
    public function deleteAction(Request $request, Company $company)
    {
        $form = $this->createDeleteForm($company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($company);
            $em->flush();
        }

        return $this->redirectToRoute('company_list');
    }

    /**
     * Creates a form to delete a company entity.
     *
     * @param Company $company The company entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Company $company)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('company_delete', array('id' => $company->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
