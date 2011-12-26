<?php

require './constants.php';

// some of the code i used for badminton website. does database stuff. figure it out :P

// open database connection
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('db/only_connect.db');
    }
}

// open database connection
$con = new MyDB();

$result = $con->query("SELECT * FROM scores");

if ($row = $result->fetchArray())

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
$con->close();

?>
