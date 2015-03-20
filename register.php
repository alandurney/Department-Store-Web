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

                </div><!-- /.navbar-collapse -->

            </div>
            <!-- /end.navbar-collapse -->
        </div>
        <!-- /end .headercontainer -->
    </nav><!--end nav class-->

    <!----------------------------------END SCROLL HEAD-------------------------------------->
    
    <form id="registerForm" 
          class="form-horizontal"
          action="checkRegister.php" 
          method="POST" 
          onsubmit="return validateRegistration(this);">
   
        <div class="form-group">
            <div class="col-lg-2">
                <input type="text" name="username" class="form-control"  placeholder="username" value="<?php
                        if (isset($_POST) && isset($_POST['username'])) {
                            echo $_POST['username'];
                        }
                        ?>" />
                        <!--error message appears next to message as a span element-->
                        <span id="usernameError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['username'])) {
                                echo $errorMessage['username'];
                            }
                            ?>
                        </span>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-2">
                <input type="password" class="form-control" name="password" placeholder="Password" value="" />
                        <span id="passwordError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['password'])) {
                                echo $errorMessage['password'];
                            }
                            ?>
                        </span>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-2">
                <input type="password" class="form-control" name="password2" placeholder="Confirm Password" value="" />
                        <span id="password2Error" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                echo $errorMessage['password2'];
                            }
                            ?>
                        </span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-2">
                <button type="submit" class="btn btn-primary" value="Register" name="register">Register</button>
            </div>
        </div>
    </form>


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





        <!-- javascript -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Scrolling Nav JavaScript -->
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrolling-nav.js"></script>
        <!--NOTE:TOUCHEFFECTS IS FOR THE HOVER IMAGE EFFECT IN SALE-->
        <script src="js/toucheffects.js"></script>

        <script type="text/javascript" src="js/register.js"></script>
</body>
</html>
