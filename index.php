<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>TREV SMELLS :)</title>
<link rel="stylesheet" href="./layout.css" type="text/css" />
<script type="text/javascript">
	function revealWord(wordtext) {
		document.getElementById("word").innerHTML = wordtext;
		document.getElementById("team1").style.display = "inline";
		document.getElementById("team2").style.display = "inline";
		document.getElementById("none").style.display = "inline";
	}
	
	function next(teamnum) {
		// addScore.php
		// actually i think this all goes in the button element
	}
</script>
</head>
<body>
<!-- <div id="wrapper"> -->
<?php

require './constants.php';

// some of the code i used for badminton website. does database stuff. figure it out :P


// open database connection
$con = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
if (!$con) {
	die('Could not connect: '.mysql_error());
}

mysql_select_db(DB_NAME, $con);

$count = rand(1, 4);

$result = mysql_query("SELECT * FROM vowels WHERE id_vowel=$count");
if ($row = mysql_fetch_array($result))
{
	$test = str_replace(
		array('a', 'e', 'i', 'o', 'u', ' ')
		, '', $row['word']);

	echo '<center><h1 id="clue">'.$row['clue'].'</h1>';
	echo '<button id="word" type="button" onclick="revealWord(\''.$row['word'].'\')">';

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
<form class="team_button_div" action="incScore.php" method="post">
	<input class="team_button" id="team1" type="submit" name="team1" value="Team 1" />
	<input class="team_button" id="none" type="submit" name="none" value="None" />
	<input class="team_button" id="team2" type="submit" name="team2" value="Team 2" />
</form>

<!-- </div> -->
</body>
</html>

