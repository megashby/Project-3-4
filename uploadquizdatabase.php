<?php
header('Access-Control-Allow-Origin: *');

$nameQuiz = $_GET['nameQuiz'];
$content = $_GET['content'];
// echo($content);

$host = "fall-2017.cs.utexas.edu";
$user = "megashby";
$pwd = "TAgfCdGw20";
$dbs = "cs329e_megashby";
$port = "3306";

$connect = mysqli_connect($host, $user, $pwd, $dbs, $port);
$table = "content";

if (empty($connect))
{
	die("mysqli_connect failed : " .mysqli_connect_error());
}

mysqli_query($connect, "INSERT INTO $table values (\"$nameQuiz\", \"$content\")");


// echo("hey");
echo($content);

?>