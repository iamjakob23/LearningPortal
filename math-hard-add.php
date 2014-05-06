<?php
    error_reporting(E_ERROR | E_PARSE);
    require_once 'includes/global.inc.php';
    require_once 'includes/log.inc.php';
    require_once 'classes/UserTools.class.php';
    require_once 'classes/DB.class.php';
    
    //tracking if user is logged in
    $loggedIn = FALSE;
    if(isset($_SESSION['username'])){
        $loggedIn = TRUE;
        //checking if user/system has submitted answer count for upload
        //prepares db query for insertion of score
        if(isset($_POST["correct"])){
            $db = new DB();
            $correct   = $_POST["correct"];
            $incorrect = $_POST["incorrect"];
            $user     = "'unclewheat10@gmail.com'";
            $data = array("SCORE_CORRECT" => $correct,
                "SCORE_INCORRECT" => $incorrect,
                //skool version for date
//                "SCORE_DATE" => "'" . date_default_timezone_set('America/New_York') . "'",
//                //production version for date
                "SCORE_DATE" => "'" . date('Y/m/d') . "'",
                "USER_NAME" => "'" .$_SESSION['username'] . "'",
                "PROBLEM_LEVEL_ID" => "1",
                "PROBLEM_TYPE_ID" => "1",
                "MATH_PROBLEM_ID" => "1");
            $table = "SCORE_TOTAL";
            $db->insert($data, $table);
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Knowledge IS Power - Math | Hard Addition</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="js/jquery.js"></script>
        <script src="js/math.js"></script>
        <script>
            //sets the initial interval to allow system to 
            //  continue to check if database is ready for insertion
            //  based on the 10 problems work = auto database
            //  entry.
            loggedIn = <?php echo json_encode($loggedIn); ?>;
            if(loggedIn){
                $(document).ready(function(){
                    setInterval(function(){updateDB()}, 100);
                });

                function updateDB(){
                    if((correctAnswer + wrongAnswer) == 10){
                        autoPutVals();
                    }
                }

                //used when user submits results on less than 10
                //  answered questions
                function putVals(){
                    $('form').submit(function(){
                        $("#cor").val(correctAnswer);
                        $("#incor").val(wrongAnswer);
                        $("#scoring").submit();
                    });
                }

                //auto submits the results of 10 answered questions
                function autoPutVals(){
                    $("#cor").val(correctAnswer);
                    $("#incor").val(wrongAnswer);
                    correctAnswer = 0;
                    wrongAnswer   = 0;
                    $("#scoring").submit();
                }
            }
        </script>
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
                <!--prints error if login in fails-->
                <?php
                    echo $error;
                ?>
                <div class="panel-heading">
                    <h2 class="panel-title" id="panelTitle">
                        Hard Addition
                    </h2>
                </div>
                <div class="panel-body" id="panelBottom">
                    <div class="leftContainer">
                        <div class="col-md-6" id="leftColumn">
                            <script>
                                //getting problem to display to user
                                if(count < 10){
                                    getProblem("add", 5);
                                    document.write('<div class="problem">' + firstNum + " + " + secondNum + '</div>');
                                }else{
                                    alert("Well done! You have complete" + count + " problems... Now your progress will be saves!");
                                }
                                //displays possible answers to user
                                document.write('<div class="buttonGroup" onclick="checkAnswer()">');
                                    document.write('<input type="button" class="btn btn-info" id="buttonGroupButton1" value="'+(ans1)+'"/>');
                                    document.write('<input type="button" class="btn btn-info" id="buttonGroupButton2" value="'+(ans2)+'"/>');
                                    document.write('<input type="button" class="btn btn-info" id="buttonGroupButton3" value="'+(ans3)+'"/>');
                                document.write('</div>');
                            </script>
                        </div>
                        <script>
                            //displays current right/wrong count to user
                            document.write("<div id='rightTitle'>Current total<br/></div>");//all divs are included in this tag
                            document.write('<div class="col-md-6" id="rightcolumn">');
                                document.write("<div class='correct'>Correct: " + correctAnswer + "<br/></div>");
                                document.write("<div class='incorrect'>Incorrect: " + wrongAnswer + "</div>");
                                    if(loggedIn){
                                        //hidden form that allows user scores to be entered into database
                                        document.write('<form method="post" action="math-hard-add.php" id="scoring">');
                                            document.write('<input type="hidden" id="cor" name="correct" value="testing">');
                                            document.write('<input type="hidden" id="incor" name="incorrect" value="' + wrongAnswer + '">');
                                            document.write('<button class="btn btn-default" onclick="putVals()">Submit Score</button>');
                                        document.write('</form>');
                                    }else{
                                        document.write('<br/>Login under the User tab above to track your progress!');
                                    }
                            document.write('</div>');
                        </script>
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