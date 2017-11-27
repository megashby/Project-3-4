<?php
$host = "cs.utexas.edu";
$user = "megashby";
$pwd = "oMkC_GE5N";
$port = "3306";

$connect = mysqli_connect($host, $user, $pwd, $dbs, $port);
$table = "students";
if (empty($connect))
{
 #die("mysqli_connect failed: ".mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"> </script>
	<!-- <script type="text/javascript" src="./protofunctions.js"></script> -->
	<!-- <script src = "readFile3.js"></script> -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> -->
	<link rel="stylesheet" type="text/css" href="style.css"/>


</head>
<body>

	 	<h1 ><span> The Hardest Science Quiz</span> </h1>


<!-- <p> My quiz </p> -->

<script type="text/javascript">
<!--
  var useranswers = Array();
  var correct = 0;
  var questions = new Array();
  var choices = new Array();
  var answers = Array();
  readFile('./sciencequiz.txt');

  function readFile(file){
 
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    // makes sure the connection is good
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
                {
                var allText = rawFile.responseText;
                // fills lines array with lines of txt file
                var lines = allText.split('\n');

                for (var i = 0; i < lines.length; i++){
                    // alert(lines[i])
                }
                // alert(lines)
            }
        }
        // for each question, fills the question in the array
    for (var questionNum = 0; questionNum <6; questionNum++){
        questions[questionNum] = lines[5*questionNum];
        // alert(questions[questionNum])

        // fills the answer choices array
        choices[questionNum] = new Array();
        choices[questionNum][0] = lines[5*questionNum+1];
        choices[questionNum][1] = lines[5*questionNum+2];
        choices[questionNum][2] = lines[5*questionNum+3];

        // fills the array with the correct answer choices
        answers[questionNum] = lines[5*questionNum+4]
        // alert(answers[questionNum])
    }

    }    
        

   rawFile.send(null);
   createQuiz()

}

  function createQuiz() {
	// writes in the questions one at a time
    for(q=0;q<questions.length;q++) {
    document.writeln('<p  class="question "blink"><span>'+questions[q]+' <p id="result_'+q+'"</span></p></p>');
    // writes in the three answer choices per questions
    for(a=0;a<3;a++) {
      document.writeln('<p><span><input type="radio" name="answer_ '+q+'" value="'+choices[q][a]+'" id="answer_'+q +'_'+a+'" class="question_'+q+'" onclick="submitQuestion('+q+', this, \'question_'+q+'\')" /><label id="label_'+q+'_'+a+'" for="answer_'+q+'_'+a+'"> '+choices[q][a]+'</label><br /></span></p>');
    }
  }

  document.writeln('<p><input type = "text" value = "Enter Username" name = "username" id = "username" /></p>');
  // writes the submit button at the end of the quiz
  document.writeln('<p><input type="submit" value="Show Score" class = "btn btn-info" id= "ad_button" onclick="showTotalScore()" /></p><p style="display:none"></p>');

}
function submitQuestion(questionNum, input, classNum) {
  useranswers[questionNum] = input.value;
  disableQuestion(classNum);
  showResult(questionNum);

}
// increments score if user answered correctly and alerts them of their total score
function showResult(questionNum) {
  // alert('the answer was '+answers[questionNum].toString())
  // alert('you answered '+useranswers[questionNum].toString())
  userAns = String(useranswers[questionNum]).trim(' ')
  sysAns = String(answers[questionNum]).trim(' ')

  // alert(userAns === sysAns)

  // alert('did you answer correctly? '+(userAns ===sysAns))
  if(userAns === sysAns) {
    // alert('you got it correct')
  correct++;
  } else {
    //alert('you got it incorrect')
  }
alert('your total number of correct questions: '+correct)
}
// creates the alert at the end that gives the total score and disables all the questions
function showTotalScore() {
  totalQuestions = answers.length;
  message = "You scored " + correct + " out of " + totalQuestions + "\n";
  alert(message)
  $username = document.getElementById('username').value;
  alert($username)
  $result = mysqli_query($connect, "SELECT scienceScore FROM $table WHERE userName = $username");
  $totalscience = correct + result;
  mysqli_query($connect, "UPDATE $table SET scienceScore = '$totalmath' WHERE username = '$username'");

  correct = 0;
  var alltags=document.all? document.all : document.getElementsByTagName("*")
  for (i=0; i<alltags.length; i++) {
      alltags[i].disabled = false;
  }
    }
// after a user selects an answer choice and they are told if it's right or not the question is disabled so it cannot be answered twice.
function disableQuestion(classNum) {
  var alltags=document.all? document.all:document.getElementsByTagName("*")
  for (i=0; i<alltags.length; i++) {
    if (alltags[i].className == classNum) {
      alltags[i].disabled = true;
    }
  }
}

</script>

</body>


</html>
