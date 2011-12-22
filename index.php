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

$result = mysql_query("SELECT * FROM contacts ORDER BY contact_id");
$count = 0;
while($row = mysql_fetch_array($result))
{
	$result2 = mysql_query("SELECT * FROM contacts WHERE contact_id=".$count);
	$num = mysql_num_rows ($result2);
	echo '<div class="content"><p><strong>'.$row['title'].'</strong><br/>';
	echo $row['name'].'<br/>';
	echo '<em><a href="mailto: '.$row['email'].'">'.$row['email'].'</a></em>';
	while ($num > 1) {
		$row = mysql_fetch_array($result);
		echo $row['name'].'<br/>';
		echo '<em><a href="mailto: '.$row['email'].'">'.$row['email'].'</a></em>';
		$num--;
	}
	echo "</p>\n</div>";
	$count++;
}

// close connection
mysql_close($con);
include('temp.php');
?>


</body>
</html>

