<?php

print <<<TOP
<html>
<head>
<title> View Students </title>
</head>
<body>
<h3> View Students </h3>
TOP;

// Connect to the MySQL database
$host = "fall-2017.cs.utexas.edu";
$user = "megashby";
$pwd = "TAgfCdGw20";
$dbs = "cs329e_megashby";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
$table = "students";
if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}


	print<<<LOGIN
     <html>
     <head>
     <title> See Info</title>
     </head>
     <body>
     <table width = "75%">
     <form action = "./querydatabase.php" method = "post">
     <tr>
     <td> Username </td>
     <td><input name = 'username' type = 'text' size = '30'/></td>
     <tr>
     <td><input type = "submit" value = "Submit"/></td>
     </tr>
     </form>
     </table>
     </body>
     </html>
LOGIN;

extract ($_POST);
 $username = $_POST['username'];


     $result = mysqli_query($connect, "SELECT * FROM $table WHERE username=\"$username\"");
     print "<table border = '1' width = '75%'><tr><th> Username </th><th> Last Name </th><th> First Name </th><th> Math Score </th><th> Science Score </th><th> English Score </th><th> Guilds </th></tr>";
     while ($row = $result->fetch_row())
          {
          print "<tr><td> $row[0] </td><td> $row[1] </td><td> $row[2] </td><td> $row[3] </td><td> $row[4] </td><td> $row[5] </td><td> $row[6] </td></tr>";
           }
     print "</table>";
  // }


mysqli_close($connect);

print <<<BOTTOM
</body>
</html>
BOTTOM;
?>

