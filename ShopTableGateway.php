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
        $sqlQuery = "SELECT * FROM shop WHERE shopID = :shopID";
        
        $statement = $this->connection->prepare($sqlQuery);
        
        $params = array(
            "shopID" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve shop");
        }
        
        return $statement;
    }
    
   public function insertShop($a, $mfn, $mln, $pn) {
        $sqlQuery = "INSERT INTO shop " .
                "(address, manFName, manLName, phoneNo) " .
                "VALUES (:address, :manFName, :manLName, :phoneNo)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "manFName" => $mfn,
            "manLName" => $mln,
            "phoneNo" => $pn
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert shop");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    //DELETE PRODUCT ROW BY ID
    public function deleteShop($sid) {
        $sqlQuery = "DELETE FROM shop WHERE shopID = :shopID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "shopID" => $sid
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete shop");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateShop($sid, $a, $mfn, $mln, $pn) {
        $sqlQuery =
                "UPDATE shop SET " .
                "shopID = :shopID, " .
                "address = :address, " .
                "manFName = :manFName, " .
                "manLName = :manLName, " .
                "phoneNo = :phoneNo " .
                "WHERE shopID = :shopID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "shopID" => $sid,
            "address" => $a,
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

