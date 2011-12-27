<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>TREV SMELLS :)</title>
<link rel="stylesheet" href="./layout.css" type="text/css" />
<script type="text/javascript">
window.onload = function() { timedCount(); }
<?php

include './constants.php';

// some of the code i used for badminton website. does database stuff. figure it out :P

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open(DATABASE);
    }
}

// open database connection
$con = new MyDB();

$result0 = $con->query("SELECT * FROM level");
$count = 0;
if ($row0 = $result0->fetchArray()) {
	$count = $row0['roundNum'];
}

$result = $con->query("SELECT * FROM vowels WHERE id_vowel=$count");

if ($row = $result->fetchArray()):
?>
	var t;
	var userRevealed = true;
	var time = 11;
	function timer() {
		t=setTimeout("endWord('<?php echo $row['word']; ?>')", 1000);
	}
	function timedCount()
	{
		if (time == 1) {
			endWord('<?php echo $row['word']; ?>');
			//document.getElementById("timertext").value = "time up";
			//document.getElementById("timertext").style.width = "190px";
			return;
		}
		time = time - 1;
		//document.getElementById('timertext').value = time;
		clearTimeout(t);
		t = setTimeout("timedCount()", 1000);
	}
	function endWord(wordtext) {
		document.getElementById("word").innerHTML = wordtext;
		document.getElementById("none").style.display = "inline";
		document.getElementById("none").style.float = "none";
		document.getElementById("none").value = "next";
		document.getElementById("none").style.margin = "0px 150px";
		userRevealed = false;
	}
	function pauseButton() {
		clearTimeout(t);
		if (userRevealed) {
			document.getElementById("word").innerHTML = "reveal";
			document.getElementById("word").onclick = "revealWord('<?php echo $row['word']; ?>')";
		}
	}
	function revealWord(wordtext) {
		if (userRevealed) {
			document.getElementById("word").innerHTML = wordtext;
			document.getElementById("team1").style.display = "inline";
			document.getElementById("team2").style.display = "inline";
			document.getElementById("none").style.display = "inline";
			document.getElementById("team1").style.background = "#f00";
			document.getElementById("team2").style.background = "#00f";
			clearTimeout(t);
		}
	}
</script>
</head>
<body>
<!-- <div id="wrapper">
<center><input id="timertext" type="text" value="10" /></center> -->
<?php
	$test = str_replace(
		array('a', 'e', 'i', 'o', 'u', ' ')
		, '', $row['word']);

	echo '<center><h1 id="clue">'.$row['clue'].'</h1>';

	echo '<button id="word" type="button" onclick="pauseButton()">';
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
endif;

// close connection
$con->close();

?>
<form class="team_button_div" action="next.php" method="post">
	<input type="text" name="amount" value="1" style="display: none;" />
	<input class="team_button" id="team1" type="submit" name="team1" value="Team 1" />
	<input class="team_button" id="none" type="submit" name="none" value="None" />
	<input class="team_button" id="team2" type="submit" name="team2" value="Team 2" />
</form>

<!-- </div> -->
</body>
</html>

