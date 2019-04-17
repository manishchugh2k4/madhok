<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BillingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('billNo', TextType::class, array(
                'label' => 'Bill No', 
                'attr'  => array(
                    'for' => 'billNo',
                    'class' => 'form-control'
                )
            ))
            ->add('billingParticulars', TextareaType::class, array(
                'label' => 'Billing Particulars', 
                'attr'  => array(
                    'for' => 'billingParticulars',
                    'class' => 'form-control'
                )
            ))
            ->add('rentAmount', TextType::class, array(
                'label' => 'Rent Amount', 
                'attr'  => array(
                    'for' => 'rentAmount',
                    'class' => 'form-control rentAmount'
                )
            ))
            ->add('electricNewReading', TextType::class, array(
                'label' => 'Electricity new reading', 
                'attr'  => array(
                    'for' => 'electricNewReading',
                    'class' => 'form-control newReading'
                )
            ))
            ->add('electricOldReading', TextType::class, array(
                'label' => 'Electricity old reading', 
                'attr'  => array(
                    'for' => 'floorNo',
                    'class' => 'form-control oldReading'
                )
            ))
            ->add('electricityUnits', TextType::class, array(
                'label' => 'Units Consumed', 
                'attr'  => array(
                    'for' => 'electricityUnits',
                    'class' => 'form-control electricityUnits'
                )
            ))
            ->add('billingTotalAmount', TextType::class, array(
                'label' => 'Billing Total Amount', 
                'attr'  => array(
                    'for' => 'billingTotalAmount',
                    'class' => 'form-control billingTotalAmount'
                )
            ))
            ->add('billingDate', DateType::class, array(
                'required' => false,
                'widget' => 'single_text', 
                'format' => 'MM-dd-yyyy', 
                'label'  => 'Billing Date',
                'attr' => array(
                    'placeholder'=>'Billing Date', 
                    'for' => 'billingDate', 
                    'class'=>'form-control billingDate datepicker', 
                    'data-format'=>'MM-dd-yyyy', 
                    'readonly'=>'readonly'
                )
            ))
            ->add('canteenAmount', TextType::class, array(
                'label' => 'Canteen Amount', 
                'attr'  => array(
                    'for' => 'canteenAmount',
                    'class' => 'form-control canteenAmount'
                )
            ))
            ->add('company', EntityType::class, array(
                'class' => 'CoreBundle:Company',
                //'empty_value' => 'Select', 
                'label'  => 'Company',
                'choice_label' => 'companyName', 
                'attr'  => array(
                    'for' => 'canteenAmount',
                    'class' => 'form-control companyList'
                )
            ))

            ->add('chargePerUnit', TextType::class, array(
                'label' => 'Charge per unit',
                'mapped' => false,
                'attr'  => array(
                    'for' => 'chargePerUnit',
                    'class' => 'form-control chargePerUnit'
                )
            ))
            ->add('electricityAmt', TextType::class, array(
                'label' => 'Electricity Amount',
                'mapped' => false,
                'attr'  => array(
                    'for' => 'electricityAmt',
                    'class' => 'form-control electricityAmt'
                )
            ))

            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Billing'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'corebundle_billing';
    }


}
