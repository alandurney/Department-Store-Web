<?php

///USER REDIRECTED HERE UPON SUCCESSFUL LOGIN. ACTUAL LEVEL 2//
require_once 'Product.php';
require_once 'Connection.php';
require_once 'ProductTableGateway.php';
require_once 'ShopTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new ProductTableGateway($connection);

$statement = $gateway->getProducts();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/product.js"></script>
        <script type="text/javascript" src="js/shop.js"></script>
        <title>Home</title>
    </head>
    <body>
        <!--HOME AND LOGIN/OUT LINKS-->
        <?php require 'toolbar.php' ?>
        
        <!--NOTE: USER SEES DISPLAY OF PRODUCT AND STORES TABLES-->
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <a href="viewProducts.php">Products</a>
        <br>
        <a href="viewShops.php">Stores</a>
    </body>
</html>
