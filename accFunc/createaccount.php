<?php
print<<<CREATE
<html>
<head>
<title> CREATE AN ACCOUNT </title>
<link rel="stylesheet" href="./createaccount.css">
<body>
<p> This is the page to create an account </p>
<table width = "75%">
<form id = "myForm" action = "./createaccount.php" method = "post" onsubmit = "return validateEmail();">
<tr>
<td> Enter Email </td>
<td> <input type = "text" name = "email" size = "30"/></td>
</tr>
<tr>
<td> Enter Password </td> 
<td> <input type = "text" name = "password" size = "30"/></td>
</tr>
<tr>
<td> <input type = "submit" value = "Submit"/></td>
</tr>
</form>
</table>

<script type = "text/javascript">
//function to determine whether email is valid. duplicate in validateEmail.js
function validateEmail()   
{  
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value))  
  {  
    return (true)  
  }  
    window.alert("You have entered an invalid email address!")  
    return (false)  
}
</script>
</html> 
CREATE;



extract ($_POST);
$email = $_POST["email"];
$pass = $_POST["password"];

$matches = Array();
$emailfound = false;
$fh = fopen("./passwd.txt", "r");
while (!feof($fh))
{
	$line = fgets($fh);
	$line = trim($line);
	$line = explode(":", $line);
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
// echo $emailfound;

if ($emailfound == true && $matches[$email]!= $pass && isset($_POST['email']) && isset($_POST["password"]))
{
	echo 'email already claimed';
}

if($emailfound == false && $_POST['email'] != "" && $_POST['password'] != '')
{
	$fh = fopen("./passwd.txt", 'a');
	fwrite ($fh, "$email:$pass \n");
	fclose($fh);
	header("Location: ./logout.html");
	exit();
}

?>
