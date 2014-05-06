<?php
    require_once 'includes/global.inc.php';
    require_once 'includes/log.inc.php';
    require_once 'classes/UserTools.class.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Knowledge IS Power - Home</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="js/jquery.js"></script>
    </head>
    <body>
        
        <?php include 'navigation.php'?>;
        
        <!--jumbotron header-->
        <div class="jumbotron alert-info" id="topJumbo">
            <div class="page-header" id="headerTitle">
                <h1>Learn <small id="headerTitleSmall">it's easy!</small></h1>
            </div>
        </div>
        <!--end of jumbo header-->
        
        <!--main body section-->
        <div class="container-fluid" id="mainBody">
            <div class="panel">
                <?php
                    echo $error;
                ?>
                <div class="panel-body" id="panelBottom">
                    <h3>To our son</h3>
                    <div class="leftContainer">
                    <!--displays left column information-->
                        <div class="col-md-6" id="leftColumn">
                            <blockquote class="text-justify">
                                <p>I love you more than words can express. I want to help you 
                            in every step of your life, but I know I can't do everything
                            for you. My job as your father is to provide you with
                            all of the tools you need to be successful in life. 
                            This is a continuation of these efforts me and your mom! 
                            This site is for you to help you as you're 
                            learning Math and Reading. I give to you a commitment 
                            that this "Education Portal" will be updated to better
                            assist you in your educational journey. 
                            <br/><b>We love you!</b></p>
                            <footer>Mom & Dad</footer>
                          </blockquote>
                        </div>
                        <!--displays the image in the right column-->
                        <div id='rightTitle'>Work hard and distinguish yourself<br/></div>
                        <div class="col-md-6" id="rightcolumn">
                            <img src="img/ro2.png" id="headShot" class="img-responsive img-circle">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end of main body section-->
        
        <?php include 'footer.php'?>;
        
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>