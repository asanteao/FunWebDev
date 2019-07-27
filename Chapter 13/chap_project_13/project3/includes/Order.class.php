<?php
/*
   Represents a Order (for the book case)
 */
class Order {
    private $orderID;
    private $customerID;
    private $bookISBN;
    private $bookTitle;
    private $bookCategory;

    public function __construct($orderID, $customerID, $bookISBN, $bookTitle, $bookCategory) {
        $this->orderID = $orderID;
        $this->customerID = $customerID;
        $this->bookISBN = $bookISBN;
        $this->bookTitle = $bookTitle;
        $this->bookCategory = $bookCategory;
    }

    public function getOrderID() {
        return $this->orderID;
    }
    public function getCustomerID() {
        return $this->customerID;
    }
    public function getBookISBN() {
        return $this->bookISBN;
    }
    public function getBookTitle() {
        return $this->bookTitle;
    }
    public function getBookCategory() {
        return $this->bookCategory;
    }
}
?>