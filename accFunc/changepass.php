<?php

print <<<CHANGEPASS
<html>
<head> 
<title> LOGIN </title>
<link rel="stylesheet" href="./createaccount.css">
</head>
<body>

<p> Welcome to the CHANGE PASSWORD Page </p>
<table width = "75%"">
<form action = "./changepass.php" method ="post">
<tr>
<td> Enter Email </td> <td> <input type = "text" name = "email" size = "30"/></td>
</tr>
<tr>
<td> Enter New Password </td> <td> <input type = "text" name = "newpassword" size = "30"/></td>
</tr>
<tr>
<td><input class = 'submit' type = "submit" value = "Submit"/></td>
</tr>

</form>
</table>
</body> 
<html>
CHANGEPASS;

?>