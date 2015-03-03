<?php
require_once 'Product.php';
require_once 'Connection.php';
require_once 'ProductTableGateway.php';

//NOTE: THIS IS THE STARTING PAGE WHETHER OR NOT USER IS SIGNED IN. MAKE THIS THE ACCESS TO LEVEL 2 PAGE

$id = session_id();
if ($id == "") {
    session_start();
}

/*require 'ensureUserLoggedIn.php';*/
/*don't use ensureuserlogin for index as it should display first without need for login*/

$connection = Connection::getInstance();
$gateway = new ProductTableGateway($connection);
$statement = $gateway->getProducts();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <p>A department store has a number of shops. For each shop, the store needs to 
            record the address of the shop, the name of the shop manager, and the phone 
            number of the shop. Each shop is assigned to a particular region. For each 
            region, the store needs to record the name of the region, the name of the 
            regional manager, and the email address and phone number of the regional 
            manager. Each region may have more than one shop assigned to it.</p>

        <p>Each shop has a number of employees assigned to it. For each employee, the 
           shop needs to record the employee’s name, address, date of birth, mobile 
           phone number, email address, and salary. Each employee is assigned to only 
           one shop.</p>

        <p>Each shop sells a number of products. Each product is sold by a number of 
            different shops. For each product, the store needs to record the name of 
            product, a description of the product, its cost price, and its sale price. 
            The store also needs to know the stock level of the product on sale in 
            each shop.</p>
</p>
    </body>
</html>
