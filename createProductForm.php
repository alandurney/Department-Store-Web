<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
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
                            <input type="text" name="storeID" value="" />
                            <span id="storeIDError" class="error"></span>
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
