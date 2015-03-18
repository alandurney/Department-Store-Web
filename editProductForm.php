<?php
//EDIT FORM USER HAS TO FILL OUT TO COMPLETE UPDATE//
require_once 'Product.php';
require_once 'Connection.php';
require_once 'ProductTableGateway.php';
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
$gateway = new ProductTableGateway($connection);
$shopGateway = new ShopTableGateway($connection);


//$statement = $gateway->getProductById($id);
$products = $gateway->getProductById($id);
if ($products->rowCount() !== 1) {
    die("Illegal request");
}
//$row = $statement->fetch(PDO::FETCH_ASSOC);
$product = $products->fetch(PDO::FETCH_ASSOC);

$shops = $ShopGateway->getShops();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/product.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Product Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <!--FORM-->
        <form id="editProductForm" name="editProductForm" action="editProduct.php" method="POST">
            <input type="hidden" name="productID" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Product Name</td>
                        <td>
                            <input type="text" name="prodName" value="<?php
                                if (isset($_POST) && isset($_POST['prodName'])) {
                                    echo $_POST['prodName'];
                                }
                                else echo $row['prodName'];
                            ?>" />
                            <span id="prodNameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['prodName'])) {
                                    echo $errorMessage['prodName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="<?php
                                if (isset($_POST) && isset($_POST['description'])) {
                                    echo $_POST['description'];
                                }
                                else echo $row['description'];
                            ?>" />
                            <span id="descriptionError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['description'])) {
                                    echo $errorMessage['description'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="text" name="price" value="<?php
                                if (isset($_POST) && isset($_POST['price'])) {
                                    echo $_POST['price'];
                                }
                                else echo $row['price'];
                            ?>" />
                            <span id="priceError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['price'])) {
                                    echo $errorMessage['price'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Sale Price</td>
                        <td>
                            <input type="text" name="salePrice" value="<?php
                                if (isset($_POST) && isset($_POST['salePrice'])) {
                                    echo $_POST['salePrice'];
                                }
                                else echo $row['salePrice'];
                            ?>" />
                            <span id="salePriceError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['salePrice'])) {
                                    echo $errorMessage['salePrice'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                   <tr>
                        <td>Store ID:</td>
                        <td>
                            <select name="StoreID">
                                <option value="-1">No Store</option>
                                <?php
                                $s = $shops->fetch(PDO::FETCH_ASSOC);
                                //LOOP TO RETRIEVE ALL STORE IDS. LOOP REPEATS OVER UNTIL THERE IS NOTHING TO RETURN THE VALUE RETURNS FALSE AND IT ENDS//
                                while ($s) {
                                    echo '<option value="' . $s['id'] .'">'. $s['storeID'].'</option>';
                                    $s = $shops->fetch(PDO::FETCH_ASSOC);
                                }
                                ?>
                            </select>
                            
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Product" name="updateProduct" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>

