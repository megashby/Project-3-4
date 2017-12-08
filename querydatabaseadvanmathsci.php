<?php
// $subject = $_GET['subject'];
$username = $_GET['username'];

$host = 'fall-2017.cs.utexas.edu';
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

$math = mysqli_query($connect, "SELECT mathScore FROM $table WHERE userName = \"$username\"");

while($row1 = $math -> fetch_row()){
	$mathscore = $row1[0];
}

$science = mysqli_query($connect, "SELECT scienceScore FROM $table WHERE userName = \"$username\"");

while($row1 = $science -> fetch_row()){
	$sciencescore = $row1[0];
}

if($mathscore >= 8 && $sciencescore >=8)
{
	echo "True";
}
else{
	echo 'False';
}

// echo $score;
mysqli_close($connect);
?>