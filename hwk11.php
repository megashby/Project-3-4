<?php
session_start();
echo '<h2> Astronomy Quiz</h2>';
$_SESSION["usersanswers"] = array();

// // session currentquestion/array is set
if (isset($_SESSION['currentquestion']) && isset($_SESSION["questions_array"]) &&isset($_SESSION["answer_choices_array"])){
    $time1 = time();
    $timediff1 = $time1-$_SESSION['start_time'];
//  previous question add CHECK FOR TIME
    // echo $timediff1;
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer'])){
    // process previous quesiton

    $correctanswers = array(
    0 => 'false',
    1 => 'true',
    2 => 'b',
    3 => 'd',
    4 => 'galaxy',
    5 => 'age');

    // CHECK FOR TIME
    if ($_POST['answer'] == $correctanswers[$_SESSION['currentquestion']-1] && $timediff1<=900) {
        $_SESSION['correct']++;

    }
    $score = ($_SESSION['correct']*10);

  }

  if ($_SESSION['currentquestion']<$_SESSION['total_question'] && $timediff1<=900) {
        $q = $_SESSION['currentquestion'];
//      // hold the question in a variable
        $question = $_SESSION['questions_array'][$q];
        $answerchoices = $_SESSION['answer_choices_array'][$q];
//      // unset question from the array
        unset($_SESSION['questions_array'][$q]);
        unset($_SESSION['answer_choices_array'][$q]);

//      // print the question
        echo '<form method = "POST" action = "">
            <h3>'.$question.'</h3>';
//      //print the answer choice/input field
        echo $answerchoices;
        echo '<p><input type = "submit" value = "Submit"></p> </form>';
  }
  else{
//      // quiz is complete NEED TO CALCULATE SCORES
        echo "Quiz is complete <br>";
        echo "Your score is : ".$score;

        $file = fopen("./results.txt", "r");
        while (!feof($file))
        {
            $line1 = fgets($file);
            $line1 = trim($line1);
            $line1 = explode(":", $line1);

            if ($_SESSION['name'] == $line1[0])
            {
              $found = true;
            }
        }
        fclose ($file);
        if (!$found)
        {
           $name1 = $_SESSION['name'];  
           $file = fopen ("./results.txt", "a");
           fwrite ($file, "$name1:$score\n");
           fclose ($file);
        }

        unset($_SESSION["usersanswers"]);
        unset($_SESSION["currentquestion"]);
        session_destroy();      
   }

    $_SESSION['currentquestion']++;
    $_SESSION['currentanswers']++;
}
else{
// Pages first to load so show beginning
    get_questions();
    ob_clean();
    print<<<LOGIN
     <html>
     <head>
     <title> Login</title>
     </head>
     <body>
     <h1> Login</h1>
     <table width = "75%">
     <form action = "./hwk11practice.php" method = "post">
     <tr>
     <td> Enter username </td>
     <td> <input type = "text" name = "username" size = "30"/></td>
     </tr>
     <tr>
     <td> Enter password </td>
     <td> <input type = "text" name = "password" size = "30"/></td>
     </tr>
     <tr>
     <td> &nbsp; </td><td> &nbsp; </td>
     </tr>
     <tr>
     <td><input type = "submit" value = "Submit"/></td>
     <td><input type = "reset" value = "Reset"/></td>    
     </tr>
     </form>
     </table>
     </body>
     </html>
LOGIN;
    extract ($_POST);
    $matches = array();
    $_SESSION['name'] = $_POST["username"];
    $pass = $_POST["password"];

    $fh = fopen("./passwd11.txt", "r");
    while (!feof($fh))
    {
      $line = fgets($fh);
      $line = trim($line);
      $line = explode(":", $line);
      $matches[$line[0]] =$line[1];
    }
    fclose ($fh);

    foreach ($matches as $key => $value){
      if ($_SESSION['name'] == $key)
      {
        $usernamefound = true;
      }
    }
    if ($usernamefound == true && $matches[$_SESSION['name']]==$pass && isset($_POST["username"]) && isset($_POST["password"])){
        //login
        $_SESSION['currentquestion'] = 0;
        $_SESSION['currentanswers'] = 0;
        $_SESSION["correct"] = 0;
        $_SESSION['start_time']= time();
        header('Location: ./hwk11practice.php');
    }
}

 function get_questions(){
 $questionsarray = array(
    0 => ' According to Kepler the orbit of the earth is a circle with the sun at the center',
    1 => ' Ancient astronomers did consider the heliocentric model of the solar system but rejected it because they could not detect parallax ',
    2 => ' The total amount of energy that a star emits is directly related to its ',
    3 => ' Stars that live the longest have ',
    4 => ' A collection of a hundred billion stars, gas, and dust is called a:________ .',
    5=> " The inverse of the Hubble's constant is a measure of the ______ of the universe.");
$answerchoicesarray = array(
    0 => '<p><input type = "radio" value = "true" name = "answer">True</p>
        <p><input type = "radio" value = "false" name = "answer">False</p>',
    1 => '<p><input type = "radio" value = "true" name = "answer">True</p>
          <p><input type = "radio" value = "false" name = "answer">False</p>', 
    2 =>'<p><input type = "radio" value = "a" name = "answer">A. surface gravity and magnetic field</p>
        <p><input type = "radio" value = "b" name = "answer">B. radius and temperature</p>
        <p><input type = "radio" value = "c" name = "answer">C. pressure and volume</p>
        <p><input type = "radio" value = "d" name = "answer">D. location and velocity</p>',
    3 =>'<p><input type = "radio" value = "a" name = "answer">A. high mass</p>
        <p><input type = "radio" value = "b" name = "answer">B. high temperature</p>
        <p><input type = "radio" value = "c" name = "answer">C. lots of hydrogen</p>
        <p><input type = "radio" value = "d" name = "answer">D. small mass</p>',    
    4=> '<p><input type ="text" name = "answer"</p>',
    5=> '<p><input type ="text" name = "answer"</p>');
$correctanswers = array(
    0 => 'false',
    1 => 'true',
    2 => 'b',
    3 => 'd',
    4 => 'galaxy',
    5 => 'age');

    $_SESSION['questions_array']=$questionsarray;
    $_SESSION['total_question']=count($questionsarray);
    $_SESSION['answer_choices_array'] = $answerchoicesarray;
    $_SESSION['correct_answers'] = $correctanswers;
    return;
}
?>