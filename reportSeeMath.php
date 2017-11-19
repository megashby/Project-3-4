<?php

print <<<TOP
<html>
<head>
<title> View Math Scores</title>
</head>
<body>
<h3> View Math Scores</h3>
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
     <form action = "./reportSeeMath.php" method = "post">
     </form>
     </table>
     </body>
     </html>
LOGIN;


     $result = mysqli_query($connect, "SELECT lastName, firstName, mathScore FROM $table ORDER BY mathScore");
     print "<table border = '1' width = '75%'><tr><th> Last Name </th><th> First Name </th><th> Math Score </th></tr>";
     while ($row = $result->fetch_row())
          {
          print "<tr><td> $row[0] </td><td> $row[1] </td><td> $row[2] </td></tr>";
           }
     print "</table>";
  // }


mysqli_close($connect);

print <<<BOTTOM
</body>
</html>
BOTTOM;
?>
