<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
require_once 'ShopTableGateway.php';
require_once 'Connection.php';

$conn = Connection::getInstance();
$shopGateway = new ShopTableGateway($conn);

$shops = $shopGateway->getShops();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/Product.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createProductForm" name="createProductForm" action="createProduct.php" 
              method="POST" 
              onsubmit="return validateCreateProduct(this);">
            <table border="0">
                <tbody>
                    <tr>
                        <th>Create New Product</th>
                    </tr>
                    <tr>
                        <td>Product Name:</td>
                        <td>
                            <input type="text" name="prodName" value="" />
                            <span id="prodNameError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <input type="text" name="description" value="" />
                            <span id="descriptionError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="text" name="price" value="" />
                            <span id="priceError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Sale Price:</td>
                        <td>
                            <input type="text" name="salePrice" value="" />
                            <span id="salePriceError" class="error"></span>
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
                            <input type="submit" value="Create Product" name="createProduct" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
