//tracks the answer of each problem
var answer        = 0;
//tracking users correct answers
var correctAnswer = 0;
//tracking users incorrect answers
var wrongAnswer   = 0;
//tracking how many problems the user has answered
var count         = 0;
//nums used for the problems
var firstNum;
var secondNum;
//used to set the buttons with possible and random answers
var ans1;
var ans2;
var ans3;
//tells if it is an addition or subtraction problem
var addSubSelector;
//used to set the level of diff. 5=hard, 10=harder, 100=hardest.
//  passed to method.
var bySelector;
//collects the value of the button the user selected.
//  used to compare against answer
var buttonVal;
//checking if game is over
var gameOver       = false;

//sets the buttons with the problems possible answers
//  unbinds the buttons for new problem
function setButtons(){
    $('#buttonGroupButton1').attr('value', ans1);
    $('#buttonGroupButton2').attr('value', ans2);
    $('#buttonGroupButton3').attr('value', ans3);
    $('#buttonGroupButton1').unbind();
    $('#buttonGroupButton2').unbind();
    $('#buttonGroupButton3').unbind();
}

function removeButtons(){
    if(correctAnswer >= 9){
        gameOver = true;
        $('#buttonGroupButton1').attr('value', "Go To");
        $('#buttonGroupButton2').attr('value', "The Next");
        $('#buttonGroupButton3').attr('value', "Level!");
        $('.problem').text("");
        $('#buttonGroupButton1').unbind();
        $('#buttonGroupButton2').unbind();
        $('#buttonGroupButton3').unbind();
    }else{
        alert("Nice work. Let try some more!");
        count = 0;
        if(addSubSelector === 'add'){
            $('.problem').text(firstNum + " + " + secondNum);
            setButtons();
        }else{
            $('.problem').text(firstNum + " - " + secondNum);
        }
    }
}

//collects the value of each of the 3 buttons and collects the value
//  of the button and compares to answer. keeping track of the game
//  totals ie right/wrong.
function checkAnswer(){
    //checking if game is over
    if(gameOver){
        alert("You're ready to go to the next level!");
    }else{
        //checking to see if button was selected
        if($('#buttonGroupButton1')){
            //gathering contents of button
            $('#buttonGroupButton1').click(function(){
                buttonVal = $('#buttonGroupButton1').val();
                //checking if button held correct answer and alerts user of 
                //  results
                if(buttonVal == answer){
                    alert("Right answer! Good Job!!!");
                    //adding to correct scores
                    correctAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    //gets new problem set
                    getProblem(addSubSelector, bySelector);
                    //displays appropriate markup of problem
                    if(gameCount() < 10){
                        if(addSubSelector === 'add'){
                            $('.problem').text(firstNum + " + " + secondNum);
                            setButtons();
                        }else{
                            $('.problem').text(firstNum + " - " + secondNum);
                            setButtons();
                        }
                    }else{
                        removeButtons();
                    }
                }else{
                    alert("Wrong answer... Try again.");
                    //adding to current score
                    wrongAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    //gets new problem set
                    getProblem(addSubSelector, bySelector);
                    //displays appropriate markup of problem
                    if(gameCount() < 10){
                        if(addSubSelector === 'add'){
                            $('.problem').text(firstNum + " + " + secondNum);
                            setButtons();
                        }else{
                            $('.problem').text(firstNum + " - " + secondNum);
                            setButtons();
                        }
                    }else{
                        removeButtons();
                    }
                }
            });
        }
        //checking to see if button was selected
        if($('#buttonGroupButton2')){
            //gathering contents of button
            $('#buttonGroupButton2').click(function(){
                buttonVal = $('#buttonGroupButton2').val();
                //checking if button held correct answer and alerts user of 
                //  results
                if(buttonVal == answer){
                    alert("Right answer! Good Job!!!");
                    //adding to correct scores
                    correctAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    //gets new problem set
                    getProblem(addSubSelector, bySelector);
                    //displays appropriate markup of problem
                    if(gameCount() < 10){
                        if(addSubSelector === 'add'){
                            $('.problem').text(firstNum + " + " + secondNum);
                            setButtons();
                        }else{
                            $('.problem').text(firstNum + " - " + secondNum);
                            setButtons();
                        }
                    }else{
                        removeButtons();
                    }
                }else{
                    alert("Wrong answer... Try again.");
                    //adding to current score
                    wrongAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    //gets new problem set
                    getProblem(addSubSelector, bySelector);
                    //displays appropriate markup of problem
                    if(gameCount() < 10){
                        if(addSubSelector === 'add'){
                            $('.problem').text(firstNum + " + " + secondNum);
                            setButtons();
                        }else{
                            $('.problem').text(firstNum + " - " + secondNum);
                            setButtons();
                        }
                    }else{
                        removeButtons();
                    }
                }
            });
        }
        //checking to see if button was selected
        if($('#buttonGroupButton3')){
            //gathering contents of button
            $('#buttonGroupButton3').click(function(){
                buttonVal = $('#buttonGroupButton3').val();
                //checking if button held correct answer and alerts user of 
                //  results
                if(buttonVal == answer){
                    alert("Right answer! Good Job!!!");
                    //adding to correct scores
                    correctAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    //gets new problem set
                    getProblem(addSubSelector, bySelector);
                    //displays appropriate markup of problem
                    if(gameCount() < 10){
                        if(addSubSelector === 'add'){
                            $('.problem').text(firstNum + " + " + secondNum);
                            setButtons();
                        }else{
                            $('.problem').text(firstNum + " - " + secondNum);
                            setButtons();
                        }
                    }else{
                        removeButtons();
                    }
                }else{
                    alert("Wrong answer... Try again.");
                    //adding to current score
                    wrongAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    //gets new problem set
                    getProblem(addSubSelector, bySelector);
                    //displays appropriate markup of problem
                    if(gameCount() < 10){
                        if(addSubSelector === 'add'){
                            $('.problem').text(firstNum + " + " + secondNum);
                            setButtons();
                        }else{
                            $('.problem').text(firstNum + " - " + secondNum);
                            setButtons();
                        }
                    }else{
                        removeButtons();
                    }
                }
            });
        }
    }
}

//creates a new problem to be solved
function getProblem(addSub, by){
    //is it addition or subtraction
    addSubSelector   = addSub;
    //degree of difficulty
    bySelector       = by;
    //assigning var to allow for randomization of possible
    //  answers displayed in the answer buttons
    var randomSelect = Math.floor(Math.random() * 4);
    //assigning actual problem nums
    firstNum         = Math.floor(Math.random() * by);
    secondNum = Math.floor(Math.random() * by);
    //elemenates negative answer possibilities
    if(firstNum < secondNum){
        var temp     = firstNum;
        firstNum     = secondNum;
        secondNum    = temp;
    }
    
    //determining addition or subtraction and creating
    //  an answer
    if(addSub === 'add'){
        answer = (firstNum + secondNum);
    }else{
        answer = (firstNum - secondNum);
    }
    
    //using randomization var to assign random nums to
    //  answer buttons
    if(randomSelect === 0){
        ans1      = answer;
        ans2      = (answer + 1);
        ans3      = (answer - 1);
    }
    if(randomSelect === 1){
        ans3      = answer;
        ans2      = (answer + 1);
        ans1      = (answer - 1);
    }
    if(randomSelect === 2){
        ans2      = answer;
        ans3      = (answer + 1);
        ans1      = (answer - 1);
    }
    if(randomSelect === 3){
        ans2      = answer;
        ans1      = (answer + 1);
        ans3      = (answer - 1);
    }
    if(randomSelect === 4){
        ans3      = answer;
        ans1      = (answer + 1);
        ans2      = (answer - 1);
    }
}

function gameCount(){
    count++;
    return count;
}