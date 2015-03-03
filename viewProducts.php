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
        <title>Home</title>
    </head>
    <body>
        <!--HOME AND LOGIN/OUT LINKS-->
        <?php require 'toolbar.php' ?>
        
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table style="width:100%">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //INFORMATION RETRIEVED AND DISPLAYED HERE//
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['productID'] . '</td>';
                    echo '<td>' . $row['prodName'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['salePrice'] . '</td>';
                    echo '<td>'
                    . '<a href="viewProduct.php?id='.$row['productID'].'">View</a> '
                    . '<a href="editProductForm.php?id='.$row['productID'].'">Edit</a> '
                    . '<a class="deleteProduct" href="deleteProduct.php?id='.$row['productID'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="createProductForm.php">Create New Product</a>
        <br>
    </body>
</html>
