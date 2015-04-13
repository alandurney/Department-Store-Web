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

