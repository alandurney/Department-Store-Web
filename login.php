<!DOCTYPE html>
<!--LOGIN FORM FOR USERNAME AND PASSWORD-->
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
    <body>
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--page name NOTE: DONT SET THIS INTO ITS OWN COL WHERE IT IS ALREADY MEANS YOU WON'T NEED IT-->
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
                    <div class="sign col-lg-1 col-lg-push-10 col-md-1 col-md-push-8 col-sm-1 col-sm-push-8">
                        <a class="btn btn-sign" href="register.php" role="button">Sign Up</a>
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
                        <form id="loginForm" 
                              class="form-horizontal" 
                              action="checkLogin.php" 
                              method="POST">
                            
                            <h1>Welcome Back</h1>
                            
                            <div class="form-group">
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <input type="text" name="username" class="form-control"  placeholder="Username"  value="<?php echo $username; ?>" />
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
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <input type="password" name="password" class="form-control"  placeholder="Password" value="" />
                                    <span id="passwordError" class="error">
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['password'])) {
                                            echo $errorMessage['password'];
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>

                            <!--ALL BUTTONS GO HERE-->
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-md-6">
                                    <!--SIGNIN BUTTON-->
                                    <button type="submit" class="btn btn-login" value="Login" name="login">Sign In</button>

                                    <!--REGISTER LINK BUTTON-->
                                    <button class="btn btn-register"
                                            type="button"
                                            value="Register" 
                                            name="register"
                                            onclick="document.location.href = 'register.php'" 
                                            >Register</button>

                                    <!--FORGOT PASSWORD BUTTON NOTE: DOES NOT LINK ANYWHERE YET-->
                                    <button class="btn btn-register" 
                                            type="button" 
                                            value="Forgot Password" 
                                            name="forgot" />Forgot Password?</button>
                                </div>
                            </div>

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



