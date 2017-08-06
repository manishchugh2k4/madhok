<?php

namespace CoreBundle\Entity;

/**
 * Setting
 */
class Setting
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $contactPersonName;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $address;

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
     * @var string
     */
    private $serviceTaxNo;

    /**
     * @var string
     */
    private $sacCode;


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
     * Set contactPersonName
     *
     * @param string $contactPersonName
     *
     * @return Setting
     */
    public function setContactPersonName($contactPersonName)
    {
        $this->contactPersonName = $contactPersonName;

        return $this;
    }

    /**
     * Get contactPersonName
     *
     * @return string
     */
    public function getContactPersonName()
    {
        return $this->contactPersonName;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return Setting
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
     * Set address
     *
     * @param string $address
     *
     * @return Setting
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
     * Set phone
     *
     * @param string $phone
     *
     * @return Setting
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
     * @return Setting
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
     * @return Setting
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
     * Set serviceTaxNo
     *
     * @param string $serviceTaxNo
     *
     * @return Setting
     */
    public function setServiceTaxNo($serviceTaxNo)
    {
        $this->serviceTaxNo = $serviceTaxNo;

        return $this;
    }

    /**
     * Get serviceTaxNo
     *
     * @return string
     */
    public function getServiceTaxNo()
    {
        return $this->serviceTaxNo;
    }

    /**
     * Set sacCode
     *
     * @param string $sacCode
     *
     * @return Setting
     */
    public function setSacCode($sacCode)
    {
        $this->sacCode = $sacCode;

        return $this;
    }

    /**
     * Get sacCode
     *
     * @return string
     */
    public function getSacCode()
    {
        return $this->sacCode;
    }
    /**
     * @var integer
     */
    private $sgstPercent;

    /**
     * @var integer
     */
    private $cgstPercent;

    /**
     * @var integer
     */
    private $igstPercent;


    /**
     * Set sgstPercent
     *
     * @param integer $sgstPercent
     *
     * @return Setting
     */
    public function setSgstPercent($sgstPercent)
    {
        $this->sgstPercent = $sgstPercent;

        return $this;
    }

    /**
     * Get sgstPercent
     *
     * @return integer
     */
    public function getSgstPercent()
    {
        return $this->sgstPercent;
    }

    /**
     * Set cgstPercent
     *
     * @param integer $cgstPercent
     *
     * @return Setting
     */
    public function setCgstPercent($cgstPercent)
    {
        $this->cgstPercent = $cgstPercent;

        return $this;
    }

    /**
     * Get cgstPercent
     *
     * @return integer
     */
    public function getCgstPercent()
    {
        return $this->cgstPercent;
    }

    /**
     * Set igstPercent
     *
     * @param integer $igstPercent
     *
     * @return Setting
     */
    public function setIgstPercent($igstPercent)
    {
        $this->igstPercent = $igstPercent;

        return $this;
    }

    /**
     * Get igstPercent
     *
     * @return integer
     */
    public function getIgstPercent()
    {
        return $this->igstPercent;
    }

    /**
     * @var float
     */
    private $rentTdsPercentage;

    /**
     * @var float
     */
    private $electricityTdsPercentage;


    /**
     * Set rentTdsPercentage
     *
     * @param float $rentTdsPercentage
     *
     * @return Setting
     */
    public function setRentTdsPercentage($rentTdsPercentage)
    {
        $this->rentTdsPercentage = $rentTdsPercentage;

        return $this;
    }

    /**
     * Get rentTdsPercentage
     *
     * @return float
     */
    public function getRentTdsPercentage()
    {
        return $this->rentTdsPercentage;
    }

    /**
     * Set electricityTdsPercentage
     *
     * @param float $electricityTdsPercentage
     *
     * @return Setting
     */
    public function setElectricityTdsPercentage($electricityTdsPercentage)
    {
        $this->electricityTdsPercentage = $electricityTdsPercentage;

        return $this;
    }

    /**
     * Get electricityTdsPercentage
     *
     * @return float
     */
    public function getElectricityTdsPercentage()
    {
        return $this->electricityTdsPercentage;
    }
}
