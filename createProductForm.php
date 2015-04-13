<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
//connects to shop table//
require_once 'ShopTableGateway.php';
require_once 'Connection.php';

$conn = Connection::getInstance();
//conection to the shop table gateway
$shopGateway = new ShopTableGateway($conn);

$shops = $shopGateway->getShops();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Create New Product</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script src="js/respond.js"></script>
        <!--MODERNIZER IS FOR THE HOVER EFFECT IN SALE-->
        <script src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/product.js"></script>
        <script type="text/javascript" src="js/shop.js"></script>
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!--NOTE: USER SEES DISPLAY OF PRODUCT AND STORES TABLES-->
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?><!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--page name NOTE: DONT SET THIS INTO ITS OWN COL WHERE IT IS ALREDAY MEANS YOU WON'T NEED IT-->
                    <a class="navbar-brand page-scroll" href="index.php"><span class="glyphicon glyphicon-gift"></span> TheNewYou</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a><!--click icon goes to page top-->
                        </li>



                    </ul>

                    <!--NOTE: THE SIGNIN/LOGIN BUTTONS WOULD DISSAPEAR WHEN YOU HAVE LOGGED IN. THIS WOULD HAVE TO FIGURED OUT WITH THE PHP-->

                    <div class="sign col-lg-1 col-lg-push-8">
                        <a class="btn btn-sign" href="index.php" role="button">Sign Out</a>
                    </div>

                </div><!-- /.navbar-collapse -->

            </div>
            <!-- /end.navbar-collapse -->
        </div>
        <!-- /end .headercontainer -->
    </nav><!--end nav class-->

    <!----------------------------------END SCROLL HEAD-------------------------------------->

    <div class="jumbotron-login">
        <div class="login-section">
            <div class="container">
                <div class="row">
                    <div class="login form col-lg-6 col-md-6 col-sm-6">
                        <form id="createProductForm" name="createProductForm" action="createProduct.php" 
                              class="form-horizontal" 
           
                              method="POST"
                              onsubmit="return validateCreateProduct(this);">

                            <h1>Create New Product</h1>
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
                                            <!--THIS IS THE DROPDOWN MENU BOX FOR THE STORE IDS FROM THE 1:M RELATIONSHIP-->
                                            <td>Store ID:</td>
                                            <td>
                                                <select name="StoreID">
                                                    <option value="-1">No Store</option>
                                                    <?php
                                                    $s = $shops->fetch(PDO::FETCH_ASSOC);
                                                    //LOOP TO RETRIEVE ALL STORE IDS. LOOP REPEATS OVER UNTIL THERE IS NOTHING TO RETURN THE VALUE RETURNS FALSE AND IT ENDS//
                                                    while ($s) {
                                                        echo '<option value="' . $s['id'] . '">' . $s['storeID'] . '</option>';
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="contact" class="row">
        <!--NOTE: DOES USING SMALL TAGS COUNT ASS CSS IN HTML?-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <ul class="footer-contact">
                <li><p><span class="glyphicon glyphicon-info-sign"></span> Contact Us</p></li>
                <li><h4>TheNewYou</h4></li>
                <li><p><span class="glyphicon glyphicon-earphone"></span> Call Us: 01 23477545</p></li>
                <li><p><span class="glyphicon glyphicon-globe"></span> Email Us: thenewyou@gmail.com</p></li>

            </ul>
        </div>


        <!--NOTE THIS IS THE BOTTOM OF THE PAGE. HAS CARD INFORMATION TRADEMARKS ETC.-->
        <div class="pages-end col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-4 col-push-left">
                <p>Copyright © TheNewYou Retail plc 2015. All rights reserved. Legal Disclaimer.</p>
            </div>            
        </div>
    </footer>


    <!-- javascript -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>
    <!--NOTE:TOUCHEFFECTS IS FOR THE HOVER IMAGE EFFECT IN SALE-->
    <script src="js/toucheffects.js"></script>
</body>
</html>
