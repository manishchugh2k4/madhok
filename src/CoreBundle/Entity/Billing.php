<?php

namespace CoreBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Billing
 */
class Billing
{
    /**
     * Validatoion required fields.
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
         $metadata->addConstraint(new UniqueEntity([
            'fields' => 'billNo',
            'message' => 'Bill No is already genrated!'
        ]));
    }
    
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $billNo;

    /**
     * @var float
     */
    private $billingAmount;

    /**
     * @var string
     */
    private $billingParticulars;

    /**
     * @var float
     */
    private $rentAmount;

    /**
     * @var float
     */
    private $electricityUnits;

    /**
     * @var float
     */
    private $electricOldReading;

    /**
     * @var float
     */
    private $electricNewReading;

    /**
     * @var float
     */
    private $canteenAmount;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set billNo
     *
     * @param integer $billNo
     *
     * @return Billing
     */
    public function setBillNo($billNo)
    {
        $this->billNo = $billNo;

        return $this;
    }

    /**
     * Get billNo
     *
     * @return int
     */
    public function getBillNo()
    {
        return $this->billNo;
    }

    /**
     * Set billingAmount
     *
     * @param float $billingAmount
     *
     * @return Billing
     */
    public function setBillingAmount($billingAmount)
    {
        $this->billingAmount = $billingAmount;

        return $this;
    }

    /**
     * Get billingAmount
     *
     * @return float
     */
    public function getBillingAmount()
    {
        return $this->billingAmount;
    }

    /**
     * Set billingParticulars
     *
     * @param string $billingParticulars
     *
     * @return Billing
     */
    public function setBillingParticulars($billingParticulars)
    {
        $this->billingParticulars = $billingParticulars;

        return $this;
    }

    /**
     * Get billingParticulars
     *
     * @return string
     */
    public function getBillingParticulars()
    {
        return $this->billingParticulars;
    }

    /**
     * Set rentAmount
     *
     * @param float $rentAmount
     *
     * @return Billing
     */
    public function setRentAmount($rentAmount)
    {
        $this->rentAmount = $rentAmount;

        return $this;
    }

    /**
     * Get rentAmount
     *
     * @return float
     */
    public function getRentAmount()
    {
        return $this->rentAmount;
    }

    /**
     * Set electricityUnits
     *
     * @param float $electricityUnits
     *
     * @return Billing
     */
    public function setElectricityUnits($electricityUnits)
    {
        $this->electricityUnits = $electricityUnits;

        return $this;
    }

    /**
     * Get electricityUnits
     *
     * @return float
     */
    public function getElectricityUnits()
    {
        return $this->electricityUnits;
    }

    /**
     * Set electricOldReading
     *
     * @param float $electricOldReading
     *
     * @return Billing
     */
    public function setElectricOldReading($electricOldReading)
    {
        $this->electricOldReading = $electricOldReading;

        return $this;
    }

    /**
     * Get electricOldReading
     *
     * @return float
     */
    public function getElectricOldReading()
    {
        return $this->electricOldReading;
    }

    /**
     * Set electricNewReading
     *
     * @param float $electricNewReading
     *
     * @return Billing
     */
    public function setElectricNewReading($electricNewReading)
    {
        $this->electricNewReading = $electricNewReading;

        return $this;
    }

    /**
     * Get electricNewReading
     *
     * @return float
     */
    public function getElectricNewReading()
    {
        return $this->electricNewReading;
    }

    /**
     * Set canteenAmount
     *
     * @param float $canteenAmount
     *
     * @return Billing
     */
    public function setCanteenAmount($canteenAmount)
    {
        $this->canteenAmount = $canteenAmount;

        return $this;
    }

    /**
     * Get canteenAmount
     *
     * @return float
     */
    public function getCanteenAmount()
    {
        return $this->canteenAmount;
    }
    /**
     * @var float
     */
    private $billingTotalAmount;


    /**
     * Set billingTotalAmount
     *
     * @param float $billingTotalAmount
     *
     * @return Billing
     */
    public function setBillingTotalAmount($billingTotalAmount)
    {
        $this->billingTotalAmount = $billingTotalAmount;

        return $this;
    }

    /**
     * Get billingTotalAmount
     *
     * @return float
     */
    public function getBillingTotalAmount()
    {
        return $this->billingTotalAmount;
    }
    /**
     * @var \CoreBundle\Entity\Company
     */
    private $company;


    /**
     * Set company
     *
     * @param \CoreBundle\Entity\Company $company
     *
     * @return Billing
     */
    public function setCompany(\CoreBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \CoreBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @var \DateTime
     */
    private $billingDate;


    /**
     * Set billingDate
     *
     * @param \DateTime $billingDate
     *
     * @return Billing
     */
    public function setBillingDate($billingDate)
    {
        $this->billingDate = $billingDate;

        return $this;
    }

    /**
     * Get billingDate
     *
     * @return \DateTime
     */
    public function getBillingDate()
    {
        return $this->billingDate;
    }
}
