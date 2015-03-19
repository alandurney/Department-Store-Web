<?php
require_once 'shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';

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
$gateway = new ShopTableGateway($connection);

$statement = $gateway->getShopById($id);
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
                    echo '<td><b>Shop ID: </b></td>'
                    . '<td>' . $row['storeID'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><b>Store Name: </b></td>'
                    . '<td>' . $row['shopName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><b>Managers First Name:  </b></td>'
                    . '<td>' . $row['manFName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><b>Managers Last Name:    </b></td>'
                    . '<td>' . $row['manLName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td><b>Phone No:   </b></td>'
                    . '<td>' . $row['phoneNo'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editShopForm.php?id=<?php echo $row['storeID']; ?>">
                Edit</a>
            <a href="deleteShop.php?id=<?php echo $row['storeID']; ?>">
                Delete</a>
        </p>
    </body>
</html>

