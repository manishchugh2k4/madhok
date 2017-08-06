<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CompanyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contactPerson', TextType::class, array(
                'label' => 'Contact Person', 
                'attr'  => array(
                    'for' => 'contactPerson',
                    'class' => 'form-control'
                )
            ))
            ->add('companyName', TextType::class, array(
                'label' => 'Company Name', 
                'attr'  => array(
                    'for' => 'companyName',
                    'class' => 'form-control'
                )
            ))
            ->add('email', TextType::class, array(
                'label' => 'Email', 
                'attr'  => array(
                    'for' => 'email',
                    'class' => 'form-control'
                )
            ))
            ->add('address', TextareaType::class, array(
                'label' => 'Address', 
                'attr'  => array(
                    'for' => 'address',
                    'class' => 'form-control'
                )
            ))
            ->add('officeNo', TextType::class, array(
                'label' => 'Office No', 
                'attr'  => array(
                    'for' => 'officeNo',
                    'class' => 'form-control'
                )
            ))
            ->add('floorNo', TextType::class, array(
                'label' => 'Floor', 
                'attr'  => array(
                    'for' => 'floorNo',
                    'class' => 'form-control'
                )
            ))
            ->add('phone', TextType::class, array(
                'label' => 'Phone', 
                'attr'  => array(
                    'for' => 'phone',
                    'class' => 'form-control'
                )
            ))
            ->add('mobile', TextType::class, array(
                'label' => 'Mobile', 
                'attr'  => array(
                    'for' => 'mobile',
                    'class' => 'form-control'
                )
            ))
            ->add('electricityPerUnit', TextType::class, array(
                'label' => 'Electricity Per Unit', 
                'attr'  => array(
                    'for' => 'electricityPerUnit',
                    'class' => 'form-control'
                )
            ))
            ->add('gstNo', TextType::class, array(
                'label' => 'GST No', 
                'attr'  => array(
                    'for' => 'gstNo',
                    'class' => 'form-control'
                )
            ))
            ->add('igstApplies', CheckboxType::class, array(
                'label'    => 'IGST Applies',
                'required' => false,
                'attr'  => array(
                    'for' => 'igstApplies',
                    'class' => 'form-control switcher'
                )
            ))
            ->add('active', CheckboxType::class, array(
                'label'    => 'Active',
                'required' => false,
                'attr'  => array(
                    'for' => 'gstNo',
                    'class' => 'form-control switcher'
                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Company'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'corebundle_company';
    }


}
