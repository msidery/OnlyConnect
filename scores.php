<center><h1>SCORES</h1>
<h2>Team 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Team 2</h2>

<?php

require './constants.php';

// some of the code i used for badminton website. does database stuff. figure it out :P

// open database connection
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open(DATABASE);
    }
}

// open database connection
$con = new MyDB();
$text = '';
if (isset($_POST['team1'])) {
	$con->query('UPDATE scores SET team1=team1+'.$_POST['amount']);
}
else if (isset($_POST['none'])) {
}
else if (isset($_POST['team2'])) {
	$con->query('UPDATE scores SET team2=team2+'.$_POST['amount']);
}

$result = $con->query("SELECT * FROM scores");

if ($row = $result->fetchArray())
{
	echo '<h2>'.$row['team1'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['team2'].'</h2>';
}

// close connection
$con->close();

?>

</center>