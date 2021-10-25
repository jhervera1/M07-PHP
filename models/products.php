<?php


class Product{
    private $id;
    private $name;
    private $price;
    private $available;

    public function __construct() {}


    function setId($id){
        $this->id = $id;
    }
    function setName($name){
        $this->name = $name;
    }
    function setPrice($price){
        $this->price = $price;
    }
    function setAvailability($available){
        $this->available = $available;
    }
    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
    function getPrice(){
        return $this->price;
    }
    function getAvailability(){
        return $this->available;
    }

}

?>