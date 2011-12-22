<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>TREV SMELLS :)</title>
<link rel="stylesheet" href="./layout.css" type="text/css" />
</head>
<body>
<div id="wrapper">
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

$count = 1;

$result = mysql_query("SELECT * FROM vowels WHERE id_vowel=$count");
while($row = mysql_fetch_array($result))
{
	$test = str_replace(
		array('a', 'e', 'i', 'o', 'u', ' ')
		, '', $row['word']);

	echo '<center><h1 id="clue">'.$row['clue'].'</h1>';
	echo '<button id="word">';

	$pos = 0;
	$space = 0;
	while ($pos < strlen($test)) {
		$random = (integer)log(rand(0,15)) + 1;
		for ($i = 0; $i < $random; $i++) {
			if ($pos + $i < strlen($test)) {
				echo $test[$pos + $i];
			}
		}
		echo '&nbsp;';
		$pos = $pos + $random;
	}


	echo '</button></center>';
}

// close connection
mysql_close($con);

?>

</div>
</body>
</html>

