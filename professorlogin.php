<?php

print <<<PROFESSORLOGIN
<html>
<head>
<title> Professor Login </title>
<link rel = 'stylesheet' href = "./style.css">
<script>
	function showPass()
	{
		var pass = document.getElementById('pass');
		if (document.getElementById('check').checked)
		{
			pass.setAttribute('type', 'text');
		}
		else
		{
			pass.setAttribute('type', 'password')
		}
	}
</script>
</head>
<body onload = "showPass()">

<p> Professor Login </p>
<table width = "75%">
<form action = "./professorlogin.php" method = "post">
<tr>
<td> Enter Username </td><td><input type = "text" name = 'username' size = "30"/></td>
</tr>
<tr>
<td> Enter Password </td><td><input type = "text"  id = 'pass' name = "password" size = "30"/>Show password <input type = 'checkbox' id = 'check' onclick = 'showPass();'/></td>
</tr>
<tr>
<td><input class = 'submit btn-gradient green' type = 'submit' value = "Submit"/></td>
</tr>

</form>
</table>
</body>
</html>

PROFESSORLOGIN;

extract($_POST);
$username = $_POST['username'];
$password = $_POST['password'];

$matches = Array();
$usernamefound = false;
$fh = fopen("./professorpasswd.txt", "r");
while (!feof($fh))
{
	$line = fgets($fh);
	$line = trim($line);
	$line = explode(":", $line);
	$matches[$line[0]] = $line[1];
}
fclose($fh);

foreach($matches as $key => $value)
{
	if($username == $key)
	{
		$usernamefound = true;
	}
}

if ($usernamefound == true && $matches[$username] == $password && isset($_POST['username']))
{
	header("Location:./professorhomepage.html");
}

if ($usernamefound == true && $matches[$username] != $password && isset($_POST['username']) && isset($_POST['password']))
{
	echo 'wrong password';
}

if ($usernamefound == false && $username != '' and $password != '')
{
	echo 'there is no account with that username';
}

?>