<?php

///USER REDIRECTED HERE UPON SUCCESSFUL LOGIN. ACTUAL LEVEL 2//
require_once 'Product.php';
require_once 'Connection.php';
require_once 'ProductTableGateway.php';
require_once 'ShopTableGateway.php';

require 'ensureUserLoggedIn.php';

//this is for the sort table by headings//
if(isset($_GET)&& isset($_GET['sortOrder'])){
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("shopName", "manFName", "manLName", "phoneNo");
    if(!in_array($sortOrder, $columnNames)) {
        $sortOrder = 'shopName';
    }
}
else{
    $sortOrder = 'shopName';
}

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$statement = $gateway->getShops($sortOrder);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Stores</title>
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
    <div class="prodtabledesc col-lg-2">
        <a href="home.php"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
        <h1>Stores</h1>
        <p>View, Create, Edit, Delete store information.</p>
        
        <!--CREATE NEW PART-->
            <div class="createnew col-lg-2">
                <a href="createShopForm.php"><span class="glyphicon glyphicon-plus"></span></a>
                <a href="createShopForm.php"><h3>Create New Store<h3></a>
            </div>
    </div>
    
    
    
     <!--THIS IS THE DATA TABLE-->
    <div class="prod-table col-lg-10">
        <table class="table table-striped table-condensed table-hover" >
            <thead>
                <tr class="active">
                    <th><a href="viewShops.php?sortOrder=shopName">Store Name</a></th>
                    <th><a href="viewShops.php?sortOrder=manFName">Manager's First Name</a></th>
                    <th><a href="viewShops.php?sortOrder=manLName">Manager's Last Name</a></th>
                    <th><a href="viewShops.php?sortOrder=phoneNo">Phone No.</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                //INFORMATION RETRIEVED AND DISPLAYED HERE//
                //NOTE: EDITED SO IT DOES NOT DISPLAY ALL INFORMATION ON LOAD// USER SELECTS SHOP WHICH SHOWS ALL INFORMATION
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['shopName'] . '</td>';
                    echo '<td>' . $row['manFName'] . '</td>';
                    echo '<td>' . $row['manLName'] . '</td>';
                    echo '<td>' . $row['phoneNo'] . '</td>';
                    echo '<td>'
                    . '<a href="viewShop.php?id=' . $row['storeID'] . '"><span class="glyphicon glyphicon-list"></span></a> '
                    . '<a href="editShopForm.php?id=' . $row['storeID'] . '"><span class="glyphicon glyphicon-pencil"></a> '
                    . '<a class="deleteShop" href="deleteShop.php?id=' . $row['storeID'] . '"><span class="glyphicon glyphicon-remove"></a> '
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
