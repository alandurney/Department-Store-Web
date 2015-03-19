<?php
//EDIT FORM USER HAS TO FILL OUT TO COMPLETE UPDATE//
require_once 'shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid requests');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$statement = $gateway->getShopById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/shop.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Shop Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <!--FORM-->
        <form id="editShopForm" name="editShopForm" action="editShop.php" method="POST">
            <input type="hidden" name="shopID" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Store Name</td>
                        <td>
                            <input type="text" name="shopName" value="<?php
                                if (isset($_POST) && isset($_POST['shopName'])) {
                                    echo $_POST['shopName'];
                                }
                                else echo $row['shopName'];
                            ?>" />
                            <span id="shopNameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['shopName'])) {
                                    echo $errorMessage['shopName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager's First Name</td>
                        <td>
                            <input type="text" name="manFName" value="<?php
                                if (isset($_POST) && isset($_POST['manFName'])) {
                                    echo $_POST['manFName'];
                                }
                                else echo $row['manFName'];
                            ?>" />
                            <span id="manFNameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['manFName'])) {
                                    echo $errorMessage['manFName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager's L Name</td>
                        <td>
                            <input type="text" name="manLName" value="<?php
                                if (isset($_POST) && isset($_POST['manLName'])) {
                                    echo $_POST['manLName'];
                                }
                                else echo $row['manLName'];
                            ?>" />
                            <span id="priceError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['manLName'])) {
                                    echo $errorMessage['manLName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone No</td>
                        <td>
                            <input type="text" name="phoneNo" value="<?php
                                if (isset($_POST) && isset($_POST['phoneNo'])) {
                                    echo $_POST['phoneNo'];
                                }
                                else echo $row['phoneNo'];
                            ?>" />
                            <span id="phoneNoError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['phoneNo'])) {
                                    echo $errorMessage['phoneNo'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Shop" name="updateShop" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>



