<?php
    require_once 'includes/global.inc.php';
    require_once 'classes/UserTools.class.php';

    $error = "";
    $username = "";
    $password = "";

    //check to see if they've submitted the login form
    if(isset($_POST['submit-login'])) { 

        $username = $_POST['username'];
        $password = $_POST['password'];

        $userTools = new UserTools();
        if($userTools->login($username, $password)){ 
            //successful login, redirect them to a page
//                header("Location: index.php");
            header('Location: '.$_SERVER['PHP_SELF']);
        }else{
                $error = "<h2 class=\"text-danger\" style=\"text-align: center\">Incorrect username or password. Please try again.</h2>";
        }
    }
?>