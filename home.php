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
        <title>The New You Database</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script src="js/respond.js"></script>
        <!--MODERNIZER IS FOR THE HOVER EFFECT IN SALE-->
        <script src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/product.js"></script>
        <script type="text/javascript" src="js/shop.js"></script>
        <title>Home</title>
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
                        <a class="btn btn-sign" href="#" role="button">Sign Out</a>
                    </div>

                </div><!-- /.navbar-collapse -->

            </div>
            <!-- /end.navbar-collapse -->
        </div>
        <!-- /end .headercontainer -->
    </nav><!--end nav class-->

    <!----------------------------------END SCROLL HEAD-------------------------------------->


    <!-- DASHBOArd -->
    <section id="dashboard" class="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li><a href="viewProducts.php"><button type="button" class="btn btn-prod"><h1><span class="glyphicon glyphicon-tags"></span> Products</h1></button></a></li>
                        <li><a href="viewShops.php"><button type="button" class="btn btn-prod"><h1><span class="glyphicon glyphicon-certificate"></span> Stores</h1></button></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <footer id="contact" class="row">
        <!--NOTE: DOES USING SMALL TAGS COUNT ASS CSS IN HTML?-->
        <div class="col-lg-4">
            <ul class="footer-contact">
                <li><p><span class="glyphicon glyphicon-info-sign"></span> Contact Us</p></li>
                <li><h4>TheNewYou</h4></li>
                <li><p><span class="glyphicon glyphicon-earphone"></span> Call Us: 01 23477545</p></li>
                <li><p><span class="glyphicon glyphicon-globe"></span> Email Us: thenewyou@gmail.com</p></li>
            </ul>
        </div>

        <div class="col-lg-4">
            <ul class="footer-menu">
                <li><h4>Back to the top</h4></li>
                <li><p>Men</p></li>
                <li><p>Women</p></li>
                <li><p>Sale</p></li>
            </ul>
        </div>

        <div class="col-lg-4">
            <ul class="footer-news">
                <li><h4>Sign Up for our Newsletter</h4></li>
                <li><p>For news about the store, discounts, competitions, promotions and more, sign up today.</p></li>

                <li><div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Email</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                    </div></li>
            </ul>
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
