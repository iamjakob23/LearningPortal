<!--main nav area-->
<div id="navBox">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="mainNav">
    <div class="container-fluid">
        <div class="navbar-header">
            <!--used for mobile nav bar clickable link box-->
            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" id="NavButton">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand pull-right" id="siteNameHead">Knowledge IS Power</div>
        </div>
        <!--nav bar for all applicable site links-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Math<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li id="mathLinkName"> Addition</li>
                        <li class="divider"></li>
                        <li><a href="math-hard-add.php">Hard</a></li>
                        <li><a href="math-harder-add.php">Harder</a></li>
                        <li><a href="math-hardest-add.php">Hardest</a></li>
                        <li class="divider"></li>
                        <li id="mathLinkName"> Subtraction</li>
                        <li class="divider"></li>
                        <li><a href="math-hard-sub.php">Hard</a></li>
                        <li><a href="math-harder-sub.php">Harder</a></li>
                        <li><a href="math-hardest-sub.php">Hardest</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reading<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="read-nums.php">Numbers</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">User<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                    <?php
                    //showing the login form to user if not validated, or
                    //  showing links to logout or progress page
                    error_reporting(E_ERROR | E_PARSE);
                    if($_SESSION["logged_in"] != 1){
                    echo '<form class="form-horizontal" role="form" id="loginForm" method="post" action="">';
                    echo    '<div class="form-group">';
                    echo        '<label for="inputEmail3" class="col-sm-2 control-label">Email</label>';
                    echo        '<div class="col-sm-12">';
                    echo            '<input type="email" name="username" class="form-control" id="inputEmail3" placeholder="Email">';
                    echo        '</div>';
                    echo    '</div>';
                    echo    '<div class="form-group">';
                    echo        '<label for="inputPassword3" class="col-sm-2 control-label">Password</label>';
                    echo        '<div class="col-sm-12">';
                    echo            '<input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">';
                    echo        '</div>';
                    echo    '</div>';
                    echo    '<div class="form-group">';
                    echo        '<div class="col-sm-offset-2 col-sm-10">';
                    echo            '<button type="submit" value="Register" name="submit-login" class="btn btn-info">Sign in</button>';
                    echo    '</div>';
                    echo '</form>';
                    }else{
                    echo    '<li>Logged in!</li>';
                    echo    '<li><a href="logout.php">Logout</a></li>';
                    echo    '<li><a href="progress-page.php">Progress</a></li>';
                    }
                    echo '</ul>';
                ?>
            </ul>
        </div>
    </div>
</nav>
</div>
<!--end of main nav area-->