<?php

class Address
{

    private $id;
    private $addressType;
    private $isDefault;
    private $userID;
    private $street1;
    private $street2;
    private $city;
    private $state;
    private $postalCode;

    public function __construct($addressType, $isDefault, $userID, $street1, $street2, $city, $state, $postalCode){
        $this->addressType = $addressType;
        $this->isDefault = $isDefault;
        $this->userID = $userID;
        $this->street1 = $street1;
        $this->street2 = $street2;
        $this->city = $city;
        $this->state = $state;
        $this->postalCode = $postalCode;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAddressType()
    {
        return $this->addressType;
    }

    /**
     * @return mixed
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return mixed
     */
    public function getStreet1()
    {
        return $this->street1;
    }
    
    /**
     * @return mixed
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $addressType
     */
    public function setAddressType($addressType)
    {
        $this->addressType = $addressType;
    }

    /**
     * @param mixed $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @param mixed $street
     */
    public function setStreet1($street1)
    {
        $this->street1 = $street1;
    }
    
    /**
     * @param mixed $street
     */
    public function setStreet2($street2)
    {
        $this->street2 = $street2;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }
    
    public function print(){
        echo "<br>" . $this->getId() . " " . $this->getAddressType() . " " . $this->getIsDefault() . " " . $this->getStreet1() . " " . $this->getStreet2() . " " . 
        $this->getUserID() . " " . $this->getCity() . " " . $this->getState() . " " . $this->getPostalCode() . "<br>";
    }
    
}

