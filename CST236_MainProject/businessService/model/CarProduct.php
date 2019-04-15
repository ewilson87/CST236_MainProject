<?php
namespace businessService\model;

class CarProduct
{

    private $id;
    private $carMake;
    private $carModel;
    private $carYear;
    private $carVin;
    private $carDescription;
    
    public function __construct($id, $carMake, $carModel, $carYear, $carVin, $carDescription){
        $this->id = $id;
        $this->carMake = $carMake;
        $this->carModel = $carModel;
        $this->carYear = $carYear;
        $this->carVin = $carVin;
        $this->carDescription = $carDescription;
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
    public function getCarMake()
    {
        return $this->carMake;
    }

    /**
     * @return mixed
     */
    public function getCarModel()
    {
        return $this->carModel;
    }

    /**
     * @return mixed
     */
    public function getCarYear()
    {
        return $this->carYear;
    }

    /**
     * @return mixed
     */
    public function getCarVin()
    {
        return $this->carVin;
    }

    /**
     * @return mixed
     */
    public function getCarDescription()
    {
        return $this->carDescription;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $carMake
     */
    public function setCarMake($carMake)
    {
        $this->carMake = $carMake;
    }

    /**
     * @param mixed $carModel
     */
    public function setCarModel($carModel)
    {
        $this->carModel = $carModel;
    }

    /**
     * @param mixed $carYear
     */
    public function setCarYear($carYear)
    {
        $this->carYear = $carYear;
    }

    /**
     * @param mixed $carVin
     */
    public function setCarVin($carVin)
    {
        $this->carVin = $carVin;
    }

    /**
     * @param mixed $carDescription
     */
    public function setCarDescription($carDescription)
    {
        $this->carDescription = $carDescription;
    }
    
}

