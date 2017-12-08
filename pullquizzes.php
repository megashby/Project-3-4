<?php

// print <<<TOP
// <html>
// <head>
// <title> View Students </title>
// </head>
// <body>
// <h3> View Students </h3>
// TOP;

// Connect to the MySQL database
$host = "fall-2017.cs.utexas.edu";
$user = "megashby";
$pwd = "TAgfCdGw20";
$dbs = "cs329e_megashby";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
$table = "content";
if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}

// 	print<<<LOGIN
//      <html>
//      <head>
//      <title> Login</title>
//      </head>
//      <body>
//      <table width = "75%">
//      <form action = "./pullquizzes.php" method = "post">
//      </form>
//      </table>
//      </body>
//      </html>
// LOGIN;


     $result = mysqli_query($connect, "SELECT * FROM $table");
     // print "<table border = '1' width = '75%'><tr><th> Name </th><th> Content </th></tr>";
     mysqli_close($connect);
     while ($row = $result->fetch_row())
          {
          // print "<tr><td> $row[0] </td><td> $row[1] </td></tr>";
          $content = $row[1];
          }

          // echo($content);
          print ('\n');
          print ("<p> blahh '\n' blahh</p>");
          print("<p>ggg</p>");

          $lines = explode("*", $content);
          print($lines);
          $line = implode('\n', $lines);
          // print ("<p> $line </p>");
          
          // foreach($lines as $val){
          //   echo $val . "\n";
          // // print "$content";
          //  }
     // print "</table>";
  // }


print <<<BOTTOM
</body>
</html>
BOTTOM;
?>
