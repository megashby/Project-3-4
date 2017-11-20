<?php

print <<<MYTOP
<html>
<head>
<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<style>
body {
	color:red;
}
</style>
<h1> <center> Pho-toh </h1>
</html>
MYTOP;

include 'http://www.cs.utexas.edu/~megashby/Software_Engineering/Project0/fetch_image.php';

print <<<MYBOTTOM
<form action = "getdata.php" method = "POST" enctype = "multipart/form-data">
<input type = "file" name = "myimage">
<input type = "submit" value = "Upload" name = "submit_image">
</form>

<a href = "index.html">
<button type = "button"> Logout </button>
</a>
</body>
</html>

MYBOTTOM;

?>