<?php
$username = $_GET['username'];
$subject = $_GET['subject'];
$addpts = $_GET['subjectscore'];
// echo $username;
// echo $subject;
// echo $addpts;

$host = "fall-2017.cs.utexas.edu";
$user = "megashby";
$pwd = "TAgfCdGw20";
$dbs = "cs329e_megashby";
$port = "3306";

$connect = mysqli_connect($host, $user, $pwd, $dbs, $port);
$table = "students";
$column = '';
$column .= $subject . 'Score';


if (empty($connect))
{
 die("mysqli_connect failed: ".mysqli_connect_error());
}


$result = mysqli_query($connect, "SELECT $column FROM $table WHERE userName = \"$username\"");

while($row1 = $result -> fetch_row()){
	$score = $row1[0];
}

$incremented = $addpts + $score;
$guilds = 'jkfdsjkldfsj';

if ($score < 20 && $incremented >=20)
{
	
	$result3 = mysqli_query($connect, "SELECT guilds FROM $table WHERE userName = \"$username\"");

	while($row3 = $result3 -> fetch_row()){
	$guilds = $row3[0];
	}

	if ($guilds == 'none'){
		$guilds = $subject ."wizards";
	}
	else{

		$guilds.= ", ". $subject ."wizards";
	}
	mysqli_query($connect, "UPDATE $table SET guilds = \"$guilds\" WHERE username = '$username'");
}

if ($score < 50 && $incremented >=50)
{
	
	$result3 = mysqli_query($connect, "SELECT guilds FROM $table WHERE userName = \"$username\"");

	while($row3 = $result3 -> fetch_row()){
	$guilds = $row3[0];
	}

	if ($guilds == 'none'){
		$guilds = $subject ."sorcerers";
	}
	else{

		$guilds.= ", ". $subject ."sorcerers";
	}
	mysqli_query($connect, "UPDATE $table SET guilds = \"$guilds\" WHERE username = '$username'");
}

mysqli_query($connect, "UPDATE $table SET $column = \"$incremented\" WHERE username = '$username'");

$result2 = mysqli_query($connect, "SELECT $column FROM $table WHERE userName = \"$username\""); 

while($row2 = $result2 -> fetch_row()){
	$score2 = $row2[0];
}
// echo('this is your new score:');
// echo $score2;
// echo 'hello';
// $response = '';
// $response .= 'Your score was $score in $subject and is now $score2';

// echo 'Your score was ', $score, ' in ', $subject, ' and it is now ', $score2;
echo $score2;
// echo $repsonse;
mysqli_close($connect);



?>