<?php

///USER REDIRECTED HERE UPON SUCCESSFUL LOGIN. ACTUAL LEVEL 2//
require_once 'Product.php';
require_once 'Connection.php';
require_once 'ProductTableGateway.php';
require_once 'ShopTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$statement = $gateway->getShops();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/shop.js"></script>
        <title>Shops</title>
    </head>
    <body>
        <!--HOME AND LOGIN/OUT LINKS-->
        <?php require 'toolbar.php' ?>
        
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <!-- NOTE THIS IS THE TABLE DISPLAY FOR THE SHOP TABLE-->
        <table style="width:100%">
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Manager's First Name</th>
                    <th>Manager's Last Name</th>
                    <th>Phone No.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //INFORMATION RETRIEVED AND DISPLAYED HERE//
                //NOTE: EDITED SO IT DOES NOT DISPLAY ALL INFORMATION ON LOAD// USER SELECTS SHOP WHICH SHOWS ALL INFORMATION
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['manFName'] . '</td>';
                    echo '<td>' . $row['manLName'] . '</td>';
                    echo '<td>' . $row['phoneNo'] . '</td>';
                    echo '<td>'
                    . '<a href="viewShop.php?id='.$row['storeID'].'">View</a> '
                    . '<a href="editShopForm.php?id='.$row['storeID'].'">Edit</a> '
                    . '<a class="deleteShop" href="deleteShop.php?id='.$row['storeID'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="createShopForm.php">Create New Shop</a>
    </body>
</html>
