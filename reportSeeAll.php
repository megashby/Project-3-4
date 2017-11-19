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
$host = "cs.utexas.edu";
$user = "megashby";
$pwd = "oMkC6_GE5N";
$dbs = "cs329e_mitra_megashby";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
$table = "students";
if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}

// print "Connected to ". mysqli_get_host_info($connect) . "<br /><br />\n";

// print "View student records <br/>";

	print<<<LOGIN
     <html>
     <head>
     <title> Login</title>
     </head>
     <body>
     <table width = "75%">
     <form action = "./reportSeeAll.php" method = "post">
     </form>
     </table>
     </body>
     </html>
LOGIN;

// extract ($_POST);
// $idnum = $_POST['id'];
// $lastname = $_POST['lastname'];
// $firstname = $_POST['firstname'];
// $seeall = $_POST['seeAll'];
// print ($idnum);
// print($lastname);
// print($firstname);


//  if (isset($idnum) && $idnum !=''){
//  	$result = mysqli_query($connect, "SELECT * FROM $table WHERE id=\"$idnum\"");
//      print "<table border = '1'width = '75%'><tr><th> ID </th><th> LAST </th><th> FIRST </th><th> MAJOR </th><th> GPA </th></tr>";
//  	while ($row = $result->fetch_row())
//       	{
//           print "<tr><td> $row[0] </td><td> $row[1] </td><td> $row[2] </td><td> $row[3] </td><td> $row[4] </td></tr>";
//            }
//      print "</table>";
//  }
// elseif (isset($lastname) && isset($firstname) && $lastname !='' && $firstname != ''){
//   $result = mysqli_query($connect, "SELECT * FROM $table WHERE lastName =\"$lastname\" OR firstName = \"$firstname\"");
// 	print "<table border = '1' width = '75%'><tr><th> ID </th><th> LAST </th><th> FIRST </th><th> MAJOR </th><th> GPA </th></tr>";
//      while ($row = $result->fetch_row())
//           {
//           print "<tr><td> $row[0] </td><td> $row[1] </td><td> $row[2] </td><td> $row[3] </td><td> $row[4] </td></tr>";
//            }
//      print "</table>";
//  }
// elseif (isset($lastname)&& $lastname !=''){
//   $result = mysqli_query($connect, "SELECT * FROM $table WHERE lastName = \"$lastname\"");
//      print "<table border = '1' width = '75%'><tr><th> ID </th><th> LAST </th><th> FIRST </th><th> MAJOR </th><th> GPA </th></tr>";
//      while ($row = $result->fetch_row())
//           {
//           print "<tr><td> $row[0] </td><td> $row[1] </td><td> $row[2] </td><td> $row[3] </td><td> $row[4] </td></tr>";
//            }
//      print "</table>";
//  }
//  elseif (isset($firstname)&& $firstname !=''){
//   $result = mysqli_query($connect, "SELECT * FROM $table WHERE firstName = \"$firstname\"");
//      print "<table border = '1' width = '75%'><tr><th> ID </th><th> LAST </th><th> FIRST </th><th> MAJOR </th><th> GPA </th></tr>";
//      while ($row = $result->fetch_row())
//           {
//           print "<tr><td> $row[0] </td><td> $row[1] </td><td> $row[2] </td><td> $row[3] </td><td> $row[4] </td></tr>";
//            }
//      print "</table>";
//  }
  // elseif (isset($seeall)){
     $result = mysqli_query($connect, "SELECT * FROM $table ORDER BY lastName, firstName");
     print "<table border = '1' width = '75%'><tr><th> Last Name </th><th> First Name </th><th> Math Score </th><th> Science Score </th><th> English Score </th><th> Guilds </th></tr>";
     while ($row = $result->fetch_row())
          {
          print "<tr><td> $row[0] </td><td> $row[1] </td><td> $row[2] </td><td> $row[3] </td><td> $row[4] </td><td> $row[5] </td></tr>";
           }
     print "</table>";
  // }


mysqli_close($connect);

print <<<BOTTOM
</body>
</html>
BOTTOM;
?>
