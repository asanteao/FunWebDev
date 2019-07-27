<?php
/*
   Represents a Customer (for the book case)
 */
class Customer {
    private $customerID;
    private $name;
    private $email;
    private $university;
    private $address;
    private $city;
    private $country;
    private $sales;

    public function __construct($id, $name, $email, $uni, $addr, $city, $cntry, $sales) {
        $this->customerID = $id;
        $this->name = $name;
        $this->email = $email;
        $this->university = $uni;
        $this->address = $addr;
        $this->city = $city;
        $this->country = $cntry;
        $this->sales = $sales;
    }

    public function getCustomerID () {
        return $this->customerID;
    }
    public function getName () {
        return $this->name;
    }
    public function getEmail () {
        return $this->email;
    }
    public function getUniversity () {
        return $this->university;
    }
    public function getAddress () {
        return $this->address;
    }
    public function getCity () {
        return $this->city;
    }
    public function getCountry () {
        return $this->country;
    }
    public function getSales () {
        return $this->sales;
    }
}
?>