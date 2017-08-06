<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Company
 */
class Company
{
    /**
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('companyName', new NotBlank(array(
            'message' => 'Company name should not be blank!',
        )));
        $metadata->addPropertyConstraint('contactPerson', new NotBlank(array(
            'message' => 'Contact person should not be blank!',
        )));
        $metadata->addConstraint(new UniqueEntity(array(
            'fields'  => 'email',
            'message' => 'Email already exists!',
        )));
        $metadata->addPropertyConstraint('email', new NotBlank(array(
            'message' => 'Email should not be blank!',
        )));
        $metadata->addPropertyConstraint('email', new Assert\Email(array(
            'message' => 'The email "{{ value }}" is not valid!',
            'checkMX' => false,
        )));
        $metadata->addPropertyConstraint('address', new NotBlank(array(
            'message' => 'Address should not be blank!',
        )));
        $metadata->addPropertyConstraint('officeNo', new NotBlank(array(
            'message' => 'Office number should not be blank!',
        )));
        $metadata->addPropertyConstraint('address', new NotBlank(array(
            'message' => 'Floor number should not be blank!',
        )));
        $metadata->addPropertyConstraint('gstNo', new NotBlank(array(
            'message' => 'GST number should not be blank!',
        )));
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $contactPerson;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $officeNo;

    /**
     * @var string
     */
    private $floorNo;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $gstNo;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $billing;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->billing = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contactPerson
     *
     * @param string $contactPerson
     *
     * @return Company
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    /**
     * Get contactPerson
     *
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return Company
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Company
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Company
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set officeNo
     *
     * @param string $officeNo
     *
     * @return Company
     */
    public function setOfficeNo($officeNo)
    {
        $this->officeNo = $officeNo;

        return $this;
    }

    /**
     * Get officeNo
     *
     * @return string
     */
    public function getOfficeNo()
    {
        return $this->officeNo;
    }

    /**
     * Set floorNo
     *
     * @param string $floorNo
     *
     * @return Company
     */
    public function setFloorNo($floorNo)
    {
        $this->floorNo = $floorNo;

        return $this;
    }

    /**
     * Get floorNo
     *
     * @return string
     */
    public function getFloorNo()
    {
        return $this->floorNo;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Company
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Company
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set gstNo
     *
     * @param string $gstNo
     *
     * @return Company
     */
    public function setGstNo($gstNo)
    {
        $this->gstNo = $gstNo;

        return $this;
    }

    /**
     * Get gstNo
     *
     * @return string
     */
    public function getGstNo()
    {
        return $this->gstNo;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Company
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add billing
     *
     * @param \CoreBundle\Entity\Billing $billing
     *
     * @return Company
     */
    public function addBilling(\CoreBundle\Entity\Billing $billing)
    {
        $this->billing[] = $billing;

        return $this;
    }

    /**
     * Remove billing
     *
     * @param \CoreBundle\Entity\Billing $billing
     */
    public function removeBilling(\CoreBundle\Entity\Billing $billing)
    {
        $this->billing->removeElement($billing);
    }

    /**
     * Get billing
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBilling()
    {
        return $this->billing;
    }
    /**
     * @var float
     */
    private $electricityPerUnit;


    /**
     * Set electricityPerUnit
     *
     * @param float $electricityPerUnit
     *
     * @return Company
     */
    public function setElectricityPerUnit($electricityPerUnit)
    {
        $this->electricityPerUnit = $electricityPerUnit;

        return $this;
    }

    /**
     * Get electricityPerUnit
     *
     * @return float
     */
    public function getElectricityPerUnit()
    {
        return $this->electricityPerUnit;
    }
    /**
     * @var boolean
     */
    private $igstApplies;


    /**
     * Set igstApplies
     *
     * @param boolean $igstApplies
     *
     * @return Company
     */
    public function setIgstApplies($igstApplies)
    {
        $this->igstApplies = $igstApplies;

        return $this;
    }

    /**
     * Get igstApplies
     *
     * @return boolean
     */
    public function getIgstApplies()
    {
        return $this->igstApplies;
    }
}
