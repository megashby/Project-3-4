<!DOCTYPE html>
<html>
<head>
	<title></title>
	   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<p><input type = "text" value = "Enter Username" name = "username" id = "username" /></p>
<p><input type="submit" value="Submit" class = "btn-gradient blue" onclick="submitUsername()" /></p>

<?php
$host = "fall-2017.cs.utexas.edu";
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
?>

<script>

function submitUsername() {
  $username = document.getElementById('username').value;
  alert($username)
  <?php
  $math = mysqli_query($connect, "SELECT mathScore FROM $table WHERE userName = $username");
  $science = mysqli_query($connect, "SELECT mathScore FROM $table WHERE userName = $username");
  ?>
  alert($math);
  alert($science);
  if ($math >= 8 && $science >= 8){
  	<?php
 # 	header('location:./advanmathscience.php');
  	?>
  }
  else{
  	// header('location:./notqualified.html');
  }
    }
</script>
</body>

</html>