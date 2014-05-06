<?php
    //checking if form has been filled out
    if(isset($_POST['passW'])){
        //capturing data for account creation
        $userEmail = $_POST["emailAddress"];
        $userPW    = $_POST["passW"];
        $hashedPW  = md5($userPW);
        echo '<script>alert("'.strtoupper($userEmail).' has been added!");</script>';
        //DB Connection info <Start>
        $host = "xxx";
        $userName = "xxx";
        $pw = "xxx";
        $dbName = "xxx";
        $connectionInfo = mysqli_connect($host,$userName,$pw,$dbName);

        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        //DB Connection info <Finish>

        $insertQuery = "INSERT INTO  `testdbskool`.`USER` (
            `USER_NAME` ,
            `USER_PW`
            )
            VALUES (
            '".$userEmail."',  '".$hashedPW."'
            )";

//                Inserting record
        mysqli_query($connectionInfo, $insertQuery);

        //Closes db connection
        mysqli_close($connectionInfo);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Knowledge IS Power - Signup! It's Free</title>
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
                <div class="panel-heading">
                    <h2 class="panel-title" id="panelTitle">
                        New User Creator
                    </h2>
                </div>
                <div class="panel-body" id="panelBottom">
                    Create User
                        <!--displaying form to admin for account creation-->
                        <script>
                            document.write('<form method="post" action="signup.php" id="signup">');
                                document.write('Email:<br/>');
                                document.write('<input type="email" id="cor" name="emailAddress" placeholder="name@email.com"><br/>');
                                document.write('Password:<br/>');
                                document.write('<input type="password" id="incor" name="passW" placeholder="Password"><br/>');
                                document.write('<button class="btn btn-default" onclick="putVals()">Add User</button>');
                            document.write('</form>');
                        </script>
                </div>
            </div>
        </div>
        <!--end of main body section-->
        
        <?php include 'footer.php'?>;
        
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>