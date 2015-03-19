<?php
//NOTE: ALL SQL ACTIONS TO TAKE PLACE IN THIS CLASS////////
class ShopTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }

    public function getShops() {
        $sqlQuery = "SELECT * FROM shop";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve shops");
        }
        
        return $statement;
    }
    
    public function getShopById($id) {
        $sqlQuery = "SELECT * FROM shop WHERE storeID = :storeID";
        
        $statement = $this->connection->prepare($sqlQuery);
        
        $params = array(
            "storeID" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve shop");
        }
        
        return $statement;
    }
    
   public function insertShop($sn, $mfn, $mln, $pn) {
        $sqlQuery = "INSERT INTO shop " .
                "(shopName, manFName, manLName, phoneNo) " .
                "VALUES (:shopName, :manFName, :manLName, :phoneNo)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "shopName" => $sn,
            "manFName" => $mfn,
            "manLName" => $mln,
            "phoneNo" => $pn
        );
        
        //NOTE: THE COMMENTED CODE IS JUST TO DISPLAY THE ARRAY. THIS ISNT NEEDED
        echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert shop");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    //DELETE PRODUCT ROW BY ID
    public function deleteShop($sid) {
        $sqlQuery = "DELETE FROM shop WHERE storeID = :storeID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "storeID" => $sid
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete shop");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateShop($sid, $sn, $mfn, $mln, $pn) {
        $sqlQuery =
                "UPDATE shop SET " .
                "storeID = :storeID, " .
                "shopName = :shopName, " .
                "manFName = :manFName, " .
                "manLName = :manLName, " .
                "phoneNo = :phoneNo " .
                "WHERE storeID = :storeID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "storeID" => $sid,
            "shopName" => $sn,
            "manFName" => $mfn,
            "manLName" => $mln,
            "phoneNo" => $pn,
        );
        
        echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';

        $status = $statement->execute($params);
        
        if (!$status) {
          die("Could not update Shop");
        }
        
        return ($statement->rowCount() == 1);
    }
    
}

