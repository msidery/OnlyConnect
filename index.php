<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>TREV SMELLS :)</title>
</head>
<body>

<?php

define('DB_SERVER', 'localhost');
define('DB_NAME', 'only_connect');
define('DB_USER', 'root');
define('DB_PASS', 's3cur3');

// some of the code i used for badminton website. does database stuff. figure it out :P


// open database connection
$con = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
if (!$con) {
	die('Could not connect: '.mysql_error());
}

mysql_select_db(DB_NAME, $con);

$result = mysql_query("SELECT * FROM vowels");
while($row = mysql_fetch_array($result))
{
	$test = str_replace(
		array('a', 'e', 'i', 'o', 'u', ' ')
		, '', $row['word']);
	echo '<h1>'.$row['clue'].'</h1>';
	echo '<h2>'.$test.'</h2>';
}

// close connection
mysql_close($con);

?>

</body>
</html>

