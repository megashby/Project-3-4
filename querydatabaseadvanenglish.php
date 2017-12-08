<?php
header('Access-Control-Allow-Origin: *');
// $subject = $_GET['subject'];
$username = $_GET['username'];

$host = 'fall-2017.cs.utexas.edu';
$user = "megashby";
$pwd = "TAgfCdGw20";
$dbs = "cs329e_megashby";
$port = "3306";


$connect = mysqli_connect($host, $user, $pwd, $dbs, $port);
$table = "students";


if (empty($connect))
{
 die("mysqli_connect failed: ".mysqli_connect_error());
}

$english = mysqli_query($connect, "SELECT englishScore FROM $table WHERE userName = \"$username\"");

while($row1 = $english -> fetch_row()){
	$englishscore = $row1[0];
}


if($englishscore >= 8)
{
	echo "True";
}
else{
	echo 'False';
}

// echo $score;
mysqli_close($connect);
?>