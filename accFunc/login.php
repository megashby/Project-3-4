<?php

print <<<LOGIN2
<html>
<head> 
<title> LOGIN </title>
<link rel="stylesheet" href="./createaccount.css">
</head>
<body>

<p> Welcome to the LOGIN Page </p>
<table width = "75%"">
<form action = "./login.php" method ="post">
<tr>
<td> Enter Email </td> <td> <input type = "text" name = "email" size = "30"/></td>
</tr>
<tr>
<td> Enter Password </td> <td> <input type = "text" name = "password" size = "30"/></td>
</tr>
<tr>
<td><input class = 'submit' type = "submit" value = "Submit"/></td>
</tr>

</form>
</table>
</body> 
<html>
LOGIN2;

extract ($_POST);
$email = $_POST["email"];
$pass = $_POST['password'];

// echo $email;
// echo $pass;
// echo "\n";


$matches = Array();
$emailfound = false;
$fh = fopen("./passwd.txt", 'r');
while (!feof($fh))
{
	$line = fgets($fh);
	$line = trim($line);
	$line = explode(":", $line);
	// echo($line[0]);
	// echo (";");
	// echo ($line[1]);
	// echo "\n";
	
	$matches[$line[0]] = $line[1];
}
fclose($fh);

foreach ($matches as $key => $value)
{
	if ($email == $key)
	{
		$emailfound = true;
	}
}
if ($emailfound == true && $matches[$email]== $pass && isset($_POST['email']) && isset($_POST["password"]))
{
	// echo "YAYAYAYYA";
	header("Location: ./mainpage.html");
	exit();
}
if ($emailfound == true && $matches[$email]!= $pass && isset($_POST['email']) && isset($_POST["password"]))
{
	echo 'wrong password';
}

if ($emailfound == false && $email != "" && $pass != "")
{
	echo 'there is no account with that username';
}


?>