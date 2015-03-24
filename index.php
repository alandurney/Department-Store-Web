<?php
require_once 'Product.php';
require_once 'Connection.php';
require_once 'ProductTableGateway.php';

//NOTE: THIS IS THE STARTING PAGE WHETHER OR NOT USER IS SIGNED IN. MAKE THIS THE ACCESS TO LEVEL 2 PAGE

$id = session_id();
if ($id == "") {
    session_start();
}

/* require 'ensureUserLoggedIn.php'; */
/* don't use ensureuserlogin for index as it should display first without need for login */

$connection = Connection::getInstance();
$gateway = new ProductTableGateway($connection);
$statement = $gateway->getProducts();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TheNewYou</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script src="js/respond.js"></script>
        <!--MODERNIZER IS FOR THE HOVER EFFECT IN SALE-->
        <script src="js/modernizr.custom.js"></script>
    </head>
    <!--<body>-->
    <!--NOTE: CONTAINER FLUID IS A FULL WIDTH PAGE. CONTAINER IS A SET WIDTH PAGE-->
    <!--<div class="container-fluid">-->
    <!-- row 1: navigation -->
    <!-- <div class="row">-->
    <!--NOTE: NAV IS THE BASIC CLASS FOR NAVIGATION BARS. ADD MORE CLASSES TO GET MORE CHANGES-->
    <!--NOTE: ADDING THE NAV CLASS MAKES A BAR THAT SPANS THE ELEMENTS CONTAINER. IN THE CASE OF THE NAV BAR IT SPANS THE ENTIRE WIDTH.
    <!--NOTE: TABS ORDER NAV BAR INTO TABS. ADDING ACTIVE TO THE CLASS OF A LIST COMPPONENT GIVES IT AN ACTIVE APPEARANCE. USE THIS FOR WHEN YOU ARE ON A SPECIFIC PAGE-->
    <!--NOTE: JUSTIFIED STRECHES NAV BAR ACROSS RNTIRE WIDTH. NOTE: USE THIS IF YOU WANT THE WHOLE MENU CONTENT TO STRETCH ACROSS-->
    <!--NOTE: ADDED NAVBAR-FIXED-TOP TO HAVE A FIXED NAVBAR. ALSO NOTE THAT YOU HAVE TO ADD PADDIMG-TOP TO CUSTOM CSS TO PREVENT INEVITABLE OVERLAP-->

    <!--NOTE: YOU CAN USE CONTAINER CLASS ANYWHERE AS A DIV OUTSIDE ANYTHING IF YOU WANT IT TO STRETCH ACROSS THE SCREEN. THIS ISN'T 960-->

    <!-----------------------------------SCROLL HEAD------------------------------->

    <!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Navigation -->
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
                    <a class="navbar-brand page-scroll" href="#page-top"><span class="glyphicon glyphicon-gift"></span> TheNewYou</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a><!--click icon goes to page top-->
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Men<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Shoes & Boots</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Coats & Jackets</a></li>
                                <li><a href="#">Blazers</a></li>
                                <li><a href="#">Chinos</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Hoodies & Sweatshirts</a></li>
                                <li><a href="#">Jumpers & Cardigans</a></li>
                                <li><a href="#">Shirts</a></li>
                                <li><a href="#">T-Shirts & Vests</a></li>
                                <li><a href="#">Suits & Tailoring</a></li>
                                <li><a href="#">Trousers</a></li>
                                <li class="divider"></li>
                                <li><a href="#">New Arrivals</a></li>
                                <li class="divider"></li>
                                <li><a href="#">On Sale</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Women<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Dressses</a></li>
                                <li><a href="#">Nightwear</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Shoes & Boots</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Coats & Jackets</a></li>
                                <li><a href="#">Hoodies & Sweatshirts</a></li>
                                <li><a href="#">Jumpers & Cardigans</a></li>
                                <li><a href="#">Shirts & Blouses</a></li>
                                <li><a href="#">T-Shirts & Tops</a></li>
                                <li><a href="#">Trousers & Leggings</a></li>
                                <li><a href="#">Occasion & Eveningwear</a></li>
                                <li class="divider"></li>
                                <li><a href="#">New Arrivals</a></li>
                                <li class="divider"></li>
                                <li><a href="#">On Sale</a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="page-scroll" href="#style">Style</a>
                        </li>

                        <li>
                            <a class="page-scroll" href="#sale">SALE</a>
                        </li>

                    </ul>

                    <div class="sign col-lg-1 col-lg-push-1 hidden-md hidden-sm">
                        <a class="btn btn-sign" href="login.php" role="button">Sign In</a>
                    </div>

                    <div class="sign col-lg-1 col-lg-push-1 hidden-md hidden-sm">
                        <a class="btn btn-sign" href="register.php" role="button">Sign Up</a>
                    </div>

                    <!--NOTE: THIS BUTTON FOR LOGIN/SIGNUP APPEARS ONLY ON MD TO SAVE SPAV=CE BY SETTING IT TO ONLY ONE BUTTON-->
                    <div class="sign col-md-1 col-md-push-1 visible-md hidden-sm">
                        <a class="btn btn-sign" href="login.php" role="button">Sign In</a>
                    </div>

                    <!--SEARCH BAR-->
                    <form class="col-lg-2 col-lg-push-2 col-md-2 col-md-push-2 col-sm-1 navbar-form" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>

                    <!--NOTE: THE HIDDEN FEATURE. THE CART ELEMENT WOULD WRAP ON MD. USED HIDDEN TO REMOVE IT AT MD-->
                    <div class="cart col-lg-1 col-lg-push-2 hidden-md hidden-sm">
                        <a class="btn btn-cart" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"> Cart:0</span></a>
                    </div>
                </div><!-- /.navbar-collapse -->

            </div>
            <!-- /end.navbar-collapse -->
        </div>
        <!-- /end .headercontainer -->
    </nav><!--end nav class-->

    <!----------------------------------END SCROLL HEAD-------------------------------------->


    <!--CAROUSEL-JUMBOTRON-->
    <div class="container"><!--NOTE: MAKING HALF WIDTH PAGE CAROUSEL. THIS DIV IS TO CONTAIN BOTH CAROUSEL ON LEFT AND INFO PANEL ON RIGHT-->
        <!--NOTE SHOULD THE CAROUSEL BE INSIDE A ROW DIV? see comment above-->
        <div id="carousel" class="carousel slide col-lg-5 col-md-6 col-sm-7 col-xs-6 pull-left" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>

            <!--NOTE: TO CHANGE SLIDE TIMES FIND CAROUSEL-INNER IN BOOTSTRAP.CSS THEN CHANGE THE TIME-->

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="img/sale2.jpg" alt="...">
                </div>
                <div class="item">
                    <img src="img/men1.jpg" alt="...">
                </div>
                <div class="item">
                    <img src="img/jum1.jpg" alt="...">
                </div>
            </div>

            <!-- Controls -->
            <!--<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>-->
        </div> <!-- Carousel -->

        <!--NOTE: INFO PANEL GOES IN HERE-->
        <div class="info col-lg-7 col-md-6 col-sm-5 col-xs-6 pull-right">
            <h1>SALE</h1>
            <h1>Up to 25% Off*</h1>
            <div class="salead">
                <h2>Ends March 16th</h2>
            </div>
            <p>*Selected lines only</p>
            <h2>TheNewYou</h2>
        </div>

    </div><!--END CONTAINING CAR AND  INFO PANEL-->

    <!--NOTE: COL-LOGIC IS COL-MD-3 MEANS AT MEDIUM IT WILL TAKE UP 3 COLUMNS. COL-XS-6 MEANS 6 COLUMNS AT XS SCREEN SIZE-->

    <section id="sale" class="sale-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1>New Season. New You.</h1>
                    <p>25% Off selected Products across all ranges.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Sale Section  should be row of two picture/info piece take up 6 rows each.-->
    <div class="container">
        <div class="row">
            <div class="grid cs-style-4">
                <!--NOTE: THESE ITEMS DISSAPEAR AT MD AND REAPPEAR ON SM IN THE 2X 6COL ROWS BELOW-->
                <figure class="col-lg-6 hidden-md hidden-sm hidden-xs">
                    <div><img src="img/men5.jpg" alt=""></div>
                    <figcaption>
                        <h3>Dark grey 'Beef' print t-shirt</h3>
                        <p>Was €25.00</p> 
                        <p>Now €20.00</p>
                        <a class="btn btn-more" href="#" role="button">See More</a>
                    </figcaption>
                </figure>

                <figure class="col-lg-6 hidden-md hidden-sm hidden-xs">
                    <div><img src="img/wo2.jpg" alt=""></div>
                    <figcaption>
                        <h3>Designer black tie waist floral loop dress</h3>
                        <p>Was €22.50</p> 
                        <p>Now €16.25</p>
                        <a class="btn btn-more" href="#" role="button">See More</a>
                    </figcaption>
                </figure>

            </div>
        </div>
    </div>

    <!--NOTE ROW OF 3 X COL-4-->
    <!--NOTE DO NOT REMOVE THE SALE ID and section IT LINKS TO THE SCROLLING HEAD-->
    <div class="container">
        <div class="row">
            <div class="saleitemrow">

                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-6">
                    <div class="thumbnail">
                        <img src="img/dress1.jpg" alt="">
                        <div class="styleinfo">
                            <h3>Navy floral kimono dress</h3>
                            <p>Was €39.00</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €31.20</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-6">
                    <div class="thumbnail">
                        <img src="img/wo3.jpg" alt="">
                        <div class="styleinfo">
                            <h3>Black V neck cardigan</h3>
                            <p>Was €27.00</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €20.20</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-6">
                    <div class="thumbnail">
                        <img src="img/wo4.jpg" alt="">
                        <div class="styleinfo">
                            <h3>Dark red striped jewel neck top</h3>
                            <p>Was €23.00</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €16.20</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <!--NOTE THIS ITEM ONLY APPEARS ON SM. THIS IS TO HAVE AN EVEN AMOUNT OF PRODUCTS IN 2X 6COL-->
                <div class="hidden-lg hidden-md col-sm-6  col-xs-6">
                    <div class="thumbnail">
                        <img src="img/wo2.jpg" alt="">
                        <div class="styleinfo">
                            <h3>Designer black tie waist floral loop dress</h3>
                            <p>Was €22.50</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €16.25</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--NOTE ROW OF 3 X COL-4-->
    <!--NOTE DO NOT REMOVE THE SALE ID and section IT LINKS TO THE SCROLLING HEAD-->
    <div class="container">
        <div class="row">
            <div class="saleitemrow">

                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-6">
                    <div class="thumbnail">
                        <img src="img/men3.jpg" alt="">
                        <div class="styleinfo">
                            <h3>Designer grey twill mac coat</h3>
                            <p>Was €148.50</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €112.25</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-6">
                    <div class="thumbnail">
                        <img src="img/men6.jpg" alt="">
                        <div class="styleinfo">
                            <h3>Designer fawn donegal blazer</h3>
                            <p>Was €187.00</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €169.50</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-6">
                    <div class="thumbnail">
                        <img src="img/men2.jpg" alt="">
                        <div class="styleinfo">
                            <h3>Black textured jersey blazer</h3>
                            <p>Was €48.50</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €42.25</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <!--NOTE THIS ITEM ONLY APPEARS ON SM. THIS IS TO HAVE AN EVEN AMOUNT OF PRODUCTS IN 2X 6COL-->
                <div class="hidden-lg hidden-md col-sm-6  col-xs-6">
                    <div class="thumbnail">
                        <img src="img/men5.jpg" alt="">
                        <div class="styleinfo">
                            <h3>Dark grey 'Beef' print t-shirt</h3>
                            <p>Was €25.00</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €20.00</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--NOTE: THIS ITEM ROW DISSAPPEARS ON SM.--> 
    <div class="container">
        <div class="row">
            <div class="saleitemrow">
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    <div class="thumbnail">
                        <img src="img/men8.jpg" alt="" >
                        <div class="styleinfo">
                            <h3>Fur Hooded Parka</h3>
                            <p>Was €101.00</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €70.20</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    <div class="thumbnail">
                        <img src="img/wo7.jpg" alt="" >
                        <div class="styleinfo">
                            <h3>Peach floral blouse</h3>
                            <p>Was €45.00</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €39.20</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    <div class="thumbnail">
                        <img src="img/men7.jpg" alt="" >
                        <div class="styleinfo">
                            <h3>Mid blue knit jumper</h3>
                            <p>Was €65.00</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €45.20</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    <div class="thumbnail">
                        <img src="img/wo6.jpg" alt="" >
                        <div class="styleinfo">
                            <h3>Light blue print dress</h3>
                            <p>Was €70.00</p> 
                            <p><span class="glyphicon glyphicon-tag"></span> Now €56.20</p>
                            <a class="btn btn-more" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--NOTE: Style editorial SECTION-->
    <section id="style" class="style-section">
        <div class="container">
            <div class="row">
                <!--NOTE: THE COL-12 IS FOR THE BACKGROUND COLOUR AND LAYOUT-->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!--DESCRIPTION-->
                    <h1>This Season in Fashion</h1>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="thumbnail">
                            <img src="img/fashtrend2.jpg" alt="">
                            <div class="styleinfo">
                                <h4>SS15: Top Beauty Trends</h4>
                                <p>The barely-there make up trend was seen on the catwalk shows of Marc Jacobs, Thierry Mugler and Chloe, but it can be one of the hardest looks to achieve.</p>
                                <a href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="thumbnail">
                            <img src="img/fashtrend1.jpg" alt="">
                            <div class="styleinfo">
                                <h4>Swimming Style</h4>
                                <p>The rain is still pouring down but, regardless, we've already started to think about pouring ourselves into a few pieces from our new season swimwear.</p>
                                <a href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="thumbnail">
                            <img src="img/fashtrend3.jpg" alt="">
                            <div class="styleinfo">
                                <h4>Menswear SS15</h4>
                                <p>From Gandy to Beckham: Men to red carpet round-ups, there's no denying the fact that men's fashion is well and truly on the up with celebrities leading the way...</p>
                                <a href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="thumbnail">
                            <img src="img/fashtrend4.jpg" alt="">
                            <div class="styleinfo">
                                <h4>On the Catwalk</h4>
                                <p>Following last season's love for military details, designers are still marching to the beat of the sartorial army, with khaki colours establish...</p>
                                <a href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
    </section>

    <div class="jumbotron col-lg-12 col-md-12 col-sm-12 col-sm-12">
        <div class="advert col-lg-5 col-md-5 col-sm-5 col-xs-5 pull-left">
            <h1>LONDON FASHION WEEK 2015</h1>
            <p>Get all the insider news at LFW15.</p>
            <a class="btn btn-more" href="#" role="button">See More</a>
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
                <li><!--NOTE: THIS BUTTON FOR LOGIN/SIGNUP APPEARS ONLY ON MD TO SAVE SPAV=CE BY SETTING IT TO ONLY ONE BUTTON-->
                    <div class="sign hidden-lg visible-md col-md-1  visible-sm col-sm-1">
                        <a class="btn btn-sign" href="login.php" role="button">Sign In</a>
                    </div></li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <ul class="footer-menu">
                <li><a class="navbar-brand page-scroll" href="#page-top"><h4>Back to the top</h4></a></li>
                <li><p>Men</p></li>
                <li><p>Women</p></li>
                <li><p>Sale</p></li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <ul class="footer-news">
                <li><h4>Sign Up for our Newsletter</h4></li>
                <li><p>For news about the store, discounts, competitions, promotions and more, sign up today.</p></li>

                <li><div class="input-group col-lg-8 col-md-6 col-sm-6">
                        <span class="input-group-addon" id="basic-addon1">Email</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                    </div></li>
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
