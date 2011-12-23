<?php

require './constants.php';

// some of the code i used for badminton website. does database stuff. figure it out :P

// open database connection
$con = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
if (!$con) {
	die('Could not connect: '.mysql_error());
}

mysql_select_db(DB_NAME, $con);

$result = mysql_query("SELECT * FROM scores");
if ($row = mysql_fetch_array($result))
{
	if (isset($_POST['team1'])) {
		echo 'team 1';
	}
	else if (isset($_POST['none'])) {
		echo 'none';
	}
	else if (isset($_POST['team2'])) {
		echo 'team 2';
	}
}

// close connection
mysql_close($con);

?>