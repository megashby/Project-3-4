<?php 
print <<<TOP
<html>
<head>
<title> Select Report</title>
</head>
<body>
<h3>Select Report </h3>
TOP;

print <<<MIDDLE
<form method = "POST" action = 'reports.php'>
<input type = 'submit' value = 'See all Students' name = 'seeAll'/>
<input type = 'submit' value = 'See Math Scores' name = 'seeMath'/>
<input type = 'submit' value = 'See Science Scores' name = "seeScience"/>
<input type = 'submit' value = 'See English Socres' name = 'seeEnglish'/>
</form>	
</body>
</html>
MIDDLE;

if (isset($_POST['seeAll'])){
	header("location:./reportSeeAll.php");
}
elseif(isset($_POST['seeMath'])){
	header("location:./reportSeeMath.php");
}
elseif(isset($_POST['seeScience'])){
	header("location:./reportSeeScience.php");
}
elseif(isset($_POST['seeEnglish'])){
	header("location:./reportSeeEnglish.php");
}


?>