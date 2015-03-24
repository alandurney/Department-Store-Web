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
        <meta charset="utf-8">
        <title>Products</title>
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
    <body>
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
    <!--NOTE THIS IS THE CREATE NEW SECTION next to THE TABLE INFORMATION. -->
    <div class="createnew col-lg-2">
        <h1>Products</h1>
        <p>View, Create, Edit, Delete stock information.</p>
        <a href="createProductForm.php"><img src="img/create.png" alt=""></a>
        <a href="createProductForm.php"><h2>Create New Product<h2></a>
    </div>

    <div class="prod-table col-lg-10">
        <table class="table table-striped table-condensed table-hover" >
            <thead>
                <tr class="active">
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //INFORMATION RETRIEVED AND DISPLAYED HERE until loop ends retrieval//
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['prodName'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['salePrice'] . '</td>';
                    echo '<td>'
                    . '<a href="viewProduct.php?id=' . $row['productID'] . '">View</a> '
                    . '<a href="editProductForm.php?id=' . $row['productID'] . '">Edit</a> '
                    . '<a class="deleteProduct" href="deleteProduct.php?id=' . $row['productID'] . '">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
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
