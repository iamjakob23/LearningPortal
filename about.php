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
        <title>Knowledge IS Power - About</title>
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
            <!--</div>-->
            <div class="panel">
                <?php
                    echo $error;
                ?>
                <div class="panel-heading">
                    <h2 class="panel-title" id="panelTitle">
                        About This Portal
                    </h2>
                </div>
                <div class="panel-body" id="panelBottom">
                    <!--displays left column information-->
                    <div class="leftContainer" style="font-size: 22px; padding: 10px;">
                        <div class="col-md-6" id='leftAboutColumn' style="text-align: justify; padding: 10px; padding-right: 20px;">
                        <div id='rightAboutTitle'>Types Of Problems<br/></div>
                            You will have the ability to work on mathematics 
                            with varying levels of difficulty, currently featuring
                            addition and subtraction, and reading, 
                            currently reading numbers up to 100.
                        </div>
                        <!--displays right column information-->
                        <div class="col-md-6" id='rightAboutColumn' style="text-align: justify; padding: 10px;">
                        <div id='rightAboutTitle'>How Scores Get Submitted<br/></div>
                            When you are logged in, you will be able to submit
                            your progress at any time. However, on math problems
                            your score will automatically be submitted after every
                            10 problems you work and when you have completed
                            the reading numbers section which goes to 100.
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