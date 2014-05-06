<?php
    error_reporting(E_ERROR | E_PARSE);
    require_once 'includes/global.inc.php';
    require_once 'includes/log.inc.php';
    require_once 'classes/UserTools.class.php';
    require_once 'classes/DB.class.php';
    
    //pulls results for validated user and prepares for display
    $results = array();
    $db    = new DB();
    $userName = $_SESSION['username'];
    $col   = "s.SCORE_CORRECT, 
        s.SCORE_INCORRECT, 
        s.SCORE_DATE, 
        pl.PROBLEM_LEVEL_NAME, 
        pm.PROBLEM_MATH_NAME, 
        pt.PROBLEM_TYPE_NAME";
    $where = "USER_NAME = '" . $userName . "' 
        AND (s.PROBLEM_TYPE_ID = pt.PROBLEM_TYPE_ID) 
        AND (s.PROBLEM_LEVEL_ID = pl.PROBLEM_LEVEL_ID) 
        AND (pm.PROBLEM_MATH_ID = s.MATH_PROBLEM_ID)";
    $order = "";
    $table = "SCORE_TOTAL s, 
        PROBLEM_TYPE pt, 
        PROBLEM_LEVEL pl, 
        PROBLEM_MATH pm";
    $result = $db->select2($col, $table, $where, $order);
        
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Knowledge IS Power - Progress Page</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="js/jquery.js"></script>
        <script src="js/reading_nums.js"></script>
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
                        Progress
                        
                    </h2>
                </div>
                <div class="panel-body" id="panelBottom">
                    <div class="leftContainer">
                        <div class="col-md-6" id="leftColumn">
                            <div style="font-size: 17px; font-weight: bold;">
                                <?php echo $userName; ?> 
                            </div>
                            <?php
                                //displays query results in table
                                echo "<div class='table-responsive' style='font-size: 14px;'>";
                                    echo "<table class='table'>";
                                    echo "<tr>";
    //                                    echo "<td>Username: </td>";
                                        echo "<td>Date: </td>";
                                        echo "<td>Correct: </td>";
                                        echo "<td>Incorrect: </td>";
                                        echo "<td>Type: </td>";
                                    echo "</tr>";
                                    //checks if more than 1 record and displays
                                    //  accordingly
                                    for($i = 0; $i < sizeof($result); $i++){
//                                        $correctTotal = 0;
                                        $correctTotal += $result[$i]["SCORE_CORRECT"];
//                                        $incorrectTotal = 0;
                                        $incorrectTotal += $result[$i]["SCORE_INCORRECT"];
                                        if($result[$i]["PROBLEM_TYPE_NAME"] == "Reading"){
                                            echo "<tr>";
                                                echo '<td>' . $result[$i]["SCORE_DATE"] . '<br/></td>';
                                                echo '<td>' . $result[$i]["SCORE_CORRECT"] . '<br/></td>';
                                                echo '<td>' . $result[$i]["SCORE_INCORRECT"] . '<br/></td>';
                                                echo '<td>' . $result[$i]["PROBLEM_MATH_NAME"] .
                                                        " " . $result[$i]["PROBLEM_LEVEL_NAME"] .
                                                        '<br/></td>';
                                            echo "</tr>";
                                        }else{
                                            echo "<tr>";
                                                echo '<td>' . $result[$i]["SCORE_DATE"] . '<br/></td>';
                                                echo '<td>' . $result[$i]["SCORE_CORRECT"] . '<br/></td>';
                                                echo '<td>' . $result[$i]["SCORE_INCORRECT"] . '<br/></td>';
                                                echo '<td>' . $result[$i]["PROBLEM_TYPE_NAME"] .  
                                                        " " . $result[$i]["PROBLEM_MATH_NAME"] . 
                                                        " " . $result[$i]["PROBLEM_LEVEL_NAME"] .
                                                        '<br/></td>';
                                            echo "</tr>";
                                        }
                                    }
                                    echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                            <div id='rightTitle' style="font-size: 30px;">
                                Overall<br/>
                            </div>
                            <div class="col-md-6" id="rightcolumn" style="font-size: 24px;">
                                <?php
                                    $totalQuestions = $correctTotal + $incorrectTotal;
                                    echo "Total problems: " . $totalQuestions;
                                    echo "<br/>Total correct: " . $correctTotal;
                                    echo "<br/>Total incorrect: " . $incorrectTotal;
                                    echo "<br/><br/>";
                                    echo "Percentage of correct answers: <br/>";
                                    $temp = $correctTotal / $totalQuestions;
                                    $percent = round((float)$temp * 100 ) . '%';
                                    echo $percent;
                                ?>
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