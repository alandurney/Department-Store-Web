<?php
class Product {
    private $productID;
    private $prodName;
    private $description;
    private $price;
    private $salePrice;
    
    public function __construct($pid, $pn, $d, $p, $sp) {
        $this->productID = $pid;
        $this->prodName = $pn;
        $this->description = $d;
        $this->price = $p;
        $this->salePrice = $sp;
    }
    
    public function getProductID() { return $this->productID; }
    public function getProdName() { return $this->prodName; }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price; }
    public function getSalePrice() { return $this->salePrice; }
}
