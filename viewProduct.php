<?php
require_once 'Product.php';
require_once 'Connection.php';
require_once 'ProductTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new ProductTableGateway($connection);

$statement = $gateway->getProductById($id);
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
        <table>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td><b>Product ID: </b></td>'
                    . '<td>' . $row['productID'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><b>Product Name: </b></td>'
                    . '<td>' . $row['prodName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><b>Description:  </b></td>'
                    . '<td>' . $row['description'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><b>Price:    </b></td>'
                    . '<td>' . $row['price'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><b>Sale Price:   </b></td>'
                    . '<td>' . $row['salePrice'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><b>Store ID: </b></td>'
                    . '<td>' . $row['storeID'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editProductForm.php?id=<?php echo $row['productID']; ?>">
                Edit</a>
            <a href="deleteProduct.php?id=<?php echo $row['productID']; ?>">
                Delete</a>
        </p>
    </body>
</html>

