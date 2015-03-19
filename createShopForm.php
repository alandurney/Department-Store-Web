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
        <title>Create New Shop</title>
        <script type="text/javascript" src="js/shop.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createShopForm" name="createShopForm" action="createShop.php" 
              method="POST" 
              onsubmit="return validateCreateShop(this);">
            <table border="0">
                <tbody>
                    <tr>
                        <th>Create New Shop</th>
                    </tr>
                    <tr>
                        <td>Store Name:</td>
                        <td>
                            <input type="text" name="shopName" value="" />
                            <span id="shopNameError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager's First Name:</td>
                        <td>
                            <input type="text" name="manFName" value="" />
                            <span id="manFNameError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager's Last Name:</td>
                        <td>
                            <input type="text" name="manLName" value="" />
                            <span id="manLNameError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone No:</td>
                        <td>
                            <input type="text" name="phoneNo" value="" />
                            <span id="phoneNoError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Shop" name="createShop" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>

