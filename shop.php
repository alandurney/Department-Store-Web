<?php
class shop {
    private $storeID;
    private $address;
    private $manFName;
    private $manLName;
    private $phoneNo;
    //private $regionID; NOTE: THIS MAY BE NEEDED ASK JOHN
    
    public function __construct($sid, $a, $mfn, $mln, $pn) {
        $this->storeID = $sid;
        $this->address = $a;
        $this->manFName = $mfn;
        $this->manLName = $mln;
        $this->phoneNo = $pn;
    }
    
    public function getShopID() { return $this->shopID; }
    public function getAddress() { return $this->address; }
    public function getMAnFName() { return $this->manFName; }
    public function getManLName() { return $this->manLName; }
    public function getPhoneNo() { return $this->phoneNo; }
}


