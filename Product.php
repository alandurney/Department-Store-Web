<?php
class Product {
    private $productID;
    private $prodName;
    private $description;
    private $price;
    private $salePrice;
    private $storeID;
    
    public function __construct($pid, $pn, $d, $p, $sp, $sid) {
        $this->productID = $pid;
        $this->prodName = $pn;
        $this->description = $d;
        $this->price = $p;
        $this->salePrice = $sp;
        $this->storeID = $sid;
    }
    
    public function getProductID() { return $this->productID; }
    public function getProdName() { return $this->prodName; }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price; }
    public function getSalePrice() { return $this->salePrice; }
    public function getStoreID() { return $this->storeID; }
}
