<?php

print <<<STUDENTLOGIN
<html>
<head>
<title> Student Login </title>
<link rel = 'stylesheet' href = "./style.css">
</head>
<body>

<p> Student Login </p>
<table width = '75%'>
<form action = "./studentlogin.php" method = "post">
<tr>
<td> Enter Username </td><td> <input type = 'text' name = "username" size = "30"/></td>
</tr>
<tr>
<td> Enter Password </td><td><input type = "text" name = "password" size = "30"/></td>
</tr>
<tr>
<td><input class = 'submit btn-gradient green' type = 'submit' value = "Submit"/></td>
</tr>

</form>
</table>
</body>
</html>

STUDENTLOGIN;

extract($_POST);
$username = $_POST['username'];
$password = $_POST['password'];

$matches = Array();
$usernamefound = false;
$fh = fopen("./studentpasswd.txt", "r");
while (!feof($fh))
{
	$line = fgets($fh);
	$line = trim($line);
	$line = explode(":", $line);
	$matches[$line[0]] =$line[1];	
}
fclose($fh);

foreach ($matches as $key => $value)
{
	if ($username == $key)
	{
		$usernamefound = true;
	}
}

if ($usernamefound == true && $matches[$username] == $password && isset($_POST['username']))
{
	header("Location: ./studenthomepage.html");
}

if ($usernamefound == true && $matches[$username] != $password && isset($_POST['username']) && isset($_POST["password"]))
{
	echo 'wrong password';
}

if ($usernamefound == false && $username != '' && $password !="")
{
	echo 'there is no account with that username';
}
?>
