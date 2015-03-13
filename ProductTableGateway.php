<?php
//NOTE: ALL SQL ACTIONS TO TAKE PLACE IN THIS CLASS////////
class ProductTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    //SQL QUERY RETRIEVES ALL INFORMATION STORED ON DATABASE AS PART OF THE "VIEW PRODUCTS" OPTION
    //IF STATEMENT SHOWS IF INFORMATION CANNOT BE RETRIEVED
    public function getProducts() {
        //query to get all products
        $sqlQuery = "SELECT * FROM product";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve products");
        }
        
        return $statement;
    }
    
    //RETIREVES PRODUCT ROW BY SPECIFIC ID
    public function getProductById($id) {
        //query to get all products
        $sqlQuery = "SELECT * FROM product WHERE productID = :productID";
        
        $statement = $this->connection->prepare($sqlQuery);
        
        $params = array(
            "productID" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve product");
        }
        
        return $statement;
    }
    
    //SQL QUERY RETRIEVES ALL INFORMATION STORED ON DATABASE AS "INSERT INTO PRODUCTS" OPTION
    //IF STATEMENT SHOWS IF INFORMATION CANNOT BE RETRIEVED
   public function insertProduct($pn, $d, $p, $sp, $sid) {
        $sqlQuery = "INSERT INTO product " .
                "(prodName, description, price, salePrice, storeID) " .
                "VALUES (:prodName, :description, :price, :salePrice, :storeID)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "prodName" => $pn,
            "description" => $d,
            "price" => $p,
            "salePrice" => $sp,
            "storeID" => $sid
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert product");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    //DELETE PRODUCT ROW BY ID
    public function deleteProduct($pid) {
        $sqlQuery = "DELETE FROM product WHERE productID = :productID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "productID" => $pid
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete product");
        }

        return ($statement->rowCount() == 1);
    }

    //UPDATE/EDIT PRODUCT////////////////////////////////////////    
    public function updateProduct($pid, $pn, $d, $p, $sp, $sid) {
        $sqlQuery =
                "UPDATE product SET " .
                "productID = :productID, " .
                "prodName = :prodName, " .
                "description = :description, " .
                "price = :price, " .
                "salePrice = :salePrice, " .
                "storeID = :storeID " .
                "WHERE productID = :productID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "productID" => $pid,
            "prodName" => $pn,
            "description" => $d,
            "price" => $p,
            "salePrice" => $sp,
            "storeID" => $sid,
        );
        
        echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';

        $status = $statement->execute($params);
        
        if (!$status) {
          die("Could not update product");
        }
        
        return ($statement->rowCount() == 1);
    }
    
}

