<?php
$subject = $_GET['subject'];
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

$result = mysqli_query($connect, "SELECT $column FROM $table WHERE userName = \"$username\"");

while($row1 = $result -> fetch_row()){
	$score = $row1[0];
}
echo $score;
mysqli_close($connect);
?>