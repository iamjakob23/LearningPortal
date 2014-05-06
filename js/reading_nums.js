//var array that holds actual numbers
var varNums;
//var array that hold the words for actual numbers
var varNames;
//used as place markers for varNames to display
//  on buttons
var ans1;
var ans2;
var ans3;
//control var to display varNames accordingly on
//  buttons
var count         = 0;
//control var used to keep track of number of 
//  answered questions.
var gameCount     = 0;
//number of right and wrong answers
var correctAnswer = 0;
var wrongAnswer   = 0;
//collects the value of the button the user selected.
//  used to compare against answer
var buttonVal;
//obvious
var gameOver      = false;

//sets up the initial session
function startSession(){
    getNumArray();
    getNamesArray();
    ans1 = varNames[1];
    ans2 = varNames[2];
    ans3 = varNames[0];
}

//sets the buttons with the problems possible answers
//  unbinds the buttons for new problem
function setButtons(){
    $('#buttonGroupButton1').attr('value', ans1);
    $('#buttonGroupButton2').attr('value', ans2);
    $('#buttonGroupButton3').attr('value', ans3);
    $('.problem').text(varNums[count]);
    $('#buttonGroupButton1').unbind();
    $('#buttonGroupButton2').unbind();
    $('#buttonGroupButton3').unbind();
}

//only if there are missed opportunities does the displayed
//  score get reset
function resetScore(){
    //displays current score count
    $('.correct').text("Correct: " + correctAnswer + "\n");
    $('.incorrect').text("Incorrect: " + wrongAnswer);
}

//checks if user was prefect in their answers and
//  either displays no more numbers, or invites user
//  to continue working and resets all
function removeButtons(){
    if(gameCount === 100){
        if(correctAnswer === 100){
            gameOver = true;
            $('#buttonGroupButton1').attr('value', "You Know");
            $('#buttonGroupButton2').attr('value', "Your");
            $('#buttonGroupButton3').attr('value', "Numbers!");
            $('.problem').text("");
            $('#buttonGroupButton1').unbind();
            $('#buttonGroupButton2').unbind();
            $('#buttonGroupButton3').unbind();
        }else{
            alert("Nice work. You can try again!");
            count         = 0;
            correctAnswer = 0;
            wrongAnswer   = 0;
            $('.problem').text(varNums[count]);
            startSession();
            resetScore();
            setButtons();
        }
    }else{
        nextNumber();
        setButtons();
    }
}

//gets the next number for user to identify
function nextNumber(){
    //assigning var to allow for randomization of possible
    //  answers displayed in the answer buttons
    var randomSelect = Math.floor(Math.random() * 4);
    
    //using randomization var to assign random nums to
    //  answer buttons
    if(randomSelect === 0){
        ans1      = varNames[count];
        ans2      = (varNames[count + 1]);
        ans3      = (varNames[count - 1]);
    }
    if(randomSelect === 1){
        ans3      = varNames[count];
        ans2      = (varNames[count + 1]);
        ans1      = (varNames[count - 1]);
    }
    if(randomSelect === 2){
        ans2      = varNames[count];
        ans3      = (varNames[count + 1]);
        ans1      = (varNames[count - 1]);
    }
    if(randomSelect === 3){
        ans2      = varNames[count];
        ans1      = (varNames[count + 1]);
        ans3      = (varNames[count - 1]);
    }
    if(randomSelect === 4){
        ans3      = varNames[count];
        ans1      = (varNames[count + 1]);
        ans2      = (varNames[count - 1]);
    }
}

//checking to see if user made the right selection
//  for the num on screen
//references each button to confirm their response
function checkAnswer(){
    //checking if game is over
    if(gameOver){
        alert("You've mastered your reading numbers!");
    }else{
        if($('#buttonGroupButton1')){
            //gathering contents of button
            $('#buttonGroupButton1').click(function(){
                buttonVal = $('#buttonGroupButton1').val();
                //checking if button held correct answer and alerts user of 
                //  results
                if(buttonVal == varNames[count]){
                    alert("Right answer! Good Job!!!");
                    //adding to correct scores
                    correctAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    count++;
                    //checks game status and gets new number
                    //  when applicable
                    removeButtons();
                }else{
                    alert("Wrong answer... Try again.");
                    //adding to current score
                    wrongAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    count++;
                    //checks game status and gets new number
                    //  when applicable
                    removeButtons();
                }
            });
        }
        if($('#buttonGroupButton2')){
            //gathering contents of button
            $('#buttonGroupButton2').click(function(){
                buttonVal = $('#buttonGroupButton2').val();
                //checking if button held correct answer and alerts user of 
                //  results
                if(buttonVal == varNames[count]){
                    alert("Right answer! Good Job!!!");
                    //adding to correct scores
                    correctAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    count++;
                    //checks game status and gets new number
                    //  when applicable
                    removeButtons();
                }else{
                    alert("Wrong answer... Try again.");
                    //adding to current score
                    wrongAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    count++;
                    //checks game status and gets new number
                    //  when applicable
                    removeButtons();
                }
            });
        }
        if($('#buttonGroupButton3')){
            //gathering contents of button
            $('#buttonGroupButton3').click(function(){
                buttonVal = $('#buttonGroupButton3').val();
                //checking if button held correct answer and alerts user of 
                //  results
                if(buttonVal == varNames[count]){
                    alert("Right answer! Good Job!!!");
                    //adding to correct scores
                    correctAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    count++;
                    //checks game status and gets new number
                    //  when applicable
                    removeButtons();
                }else{
                    alert("Wrong answer... Try again.");
                    //adding to current score
                    wrongAnswer++;
                    //displays current score count
                    $('.correct').text("Correct: " + correctAnswer + "\n");
                    $('.incorrect').text("Incorrect: " + wrongAnswer);
                    count++;
                    //checks game status and gets new number
                    //  when applicable
                    removeButtons();
                }
            });
        }
    }
    gameCount++;
}

//used only to make for cleaner code
function getNumArray(){
    varNums = new Array(
        "1", "2", "3", "4", "5",
        "6", "7", "8", "9", "10",
        "11", "12", "13", "14", "15",
        "16", "17", "18", "19", "20",
        "21", "22", "23", "24", "25",
        "26", "27", "28", "29", "30",
        "31", "32", "33", "34", "35",
        "36", "37", "38", "39", "40",
        "41", "42", "43", "44", "45",
        "46", "47", "48", "49", "50",
        "51", "52", "53", "54", "55",
        "56", "57", "58", "59", "60",
        "61", "62", "63", "64", "65",
        "66", "67", "68", "69", "70",
        "71", "72", "73", "74", "75",
        "76", "77", "78", "79", "80",
        "81", "82", "83", "84", "85",
        "86", "87", "88", "89", "90",
        "91", "92", "93", "94", "95",
        "96", "97", "98", "99", "100"
    );
}

//used only to make for cleaner code
function getNamesArray(){
    varNames = new Array(
        "One", "Two", "Three", "Four", "Five",
        "Six", "Seven", "Eight", "Nine", "Ten", 
        "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen",
        "Sixteen", "Seventeen", "Eighteen", "Nineteen", "Twenty",
        "Twenty One", "Twenty Two", "Twenty Three", "Twenty Four", "Twenty Five",
        "Twenty Six", "Twenty Seven", "Twenty Eight", "Twenty Nine", "Thirty",
        "Thirty One", "Thirty Two", "Thirty Three", "Thirty Four", "Thirty Five",
        "Thirty Six", "Thiry Seven", "Thirty Eight", "Thirty Nine", "Fourty",
        "Fourty One", "Fourty Two", "Fourty Three", "Fourty Four","Fourty Five",
        "Fourty Six", "Fourty Seven", "Foury Eight", "Fourty Nine", "Fifty",
        "Fifty One", "Fifty Two", "Fifty Three", "Fifty Four", "Fifty Five",
        "Fifty Six", "Fifty Seven", "Fifty Eight", "Fifty Nine", "Sixty",
        "Sixty One", "Sixty Two", "Sixty Three", "Sixty Four", "Sixty Five",
        "Sixty Six", "Sixty Seven", "Sixty Eight", "Sixty Nine", "Seventy",
        "Seventy One", "Seventy Two", "Seventy Three", "Seventy Four", "Seventy Five",
        "Seventy Six", "Seventy Seven", "Seventy Eight", "Seventy Nine", "Eighty",
        "Eighty One", "Eighty Two", "Eighty Three", "Eighty Four", "Eighty Five",
        "Eighty Six", "Eighty Seven", "Eighty Eight", "Eighty Nine", "Ninety",
        "Ninety One", "Ninety Two", "Ninety Three", "Ninety Four", "Ninety Five",
        "Ninety Six", "Ninety Seven", "Ninety Eight", "Ninety Nine", "One Hundred"
    )
}