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


                </div><!-- /.navbar-collapse -->

            </div>
            <!-- /end.navbar-collapse -->
        </div>
        <!-- /end .headercontainer -->
    </nav><!--end nav class-->

    <!----------------------------------END SCROLL HEAD-------------------------------------->
    <div class="container">
        <div class="row">

            <!--SETS IT TO THE CENTRE AND SETS THE RESPONSIVE ACTION-->
            <div class="Absolute-Center is-Responsive">
                <div id="logo"></div>
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <!---------------------------------------------------------------------->
                    <form action="checkLogin.php" method="POST">
                        <div>
                            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                            <input type="text" name="username" value="<?php echo $username; ?>" />
                            <span id="usernameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?>
                            </span>
                        </div>

                        <table border="0">
                            <tbody>
                                <tr>
                                    <td>Password</td>
                                    <td>
                                        <input type="password" name="password" value="" />
                                        <span id="passwordError" class="error">
                                            <?php
                                            if (isset($errorMessage) && isset($errorMessage['password'])) {
                                                echo $errorMessage['password'];
                                            }
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" value="Login" name="login" />
                                        <input type="button"
                                               value="Register"
                                               name="register"
                                               onclick="document.location.href = 'register.php'"
                                               />
                                        <input type="button" value="Forgot Password" name="forgot" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </form>
                    <!---------------------------------------------------------------------->


                    <form action="" id="loginForm">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" type="text" name='username' placeholder="username" value="<?php echo $username; ?>"/>          
                        </div>




                        <div>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>" />
                            <span id="usernameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?>
                            </span>
                        </div>




                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" type="password" name='password' placeholder="password"/>     
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-def btn-block">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="#">Forgot Password</a>&nbsp;|&nbsp;<a href="#">Support</a>
                        </div>
                    </form>        






                </div>
            </div>
        </div>

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



