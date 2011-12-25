<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>CATEGORIES</title>
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

$count = rand(1, 4);

$result = $con->query("SELECT * FROM vowels WHERE id_vowel=$count");

if ($row = $result->fetchArray()):
?>
	var t;
	var userRevealed = true;
	var time = 46;
	function timer() {
		t=setTimeout("endWord('<?php echo $row['word']; ?>')", 1000);
	}
	function timedCount()
	{
		if (time == 1) {
			endWord('<?php echo $row['word']; ?>');
			document.getElementById("timertext").value = "time up";
			document.getElementById("timertext").style.width = "190px";
			return;
		}
		time = time - 1;
		document.getElementById('timertext').value = time;
		clearTimeout(t);
		t = setTimeout("timedCount()", 100);
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
	function toggle(word) {
		revealWord(word);
		if (document.getElementById("word").style.background == "red")
			document.getElementById("word").style.background = "white";
		else
			document.getElementById("word").style.background = "red";
	}
</script>
</head>
<body>
<!-- <div id="wrapper"> -->
<center><input id="timertext" type="text" value="10" /></center>
<div id="">
<center>
<?php

$result = $con->query("SELECT * FROM level");
if ($row = $result->fetchArray()) {
	$result2 = $con->query("SELECT * FROM categories WHERE id_categories=".$row['roundNum']);
	if ($row2 = $result2->fetchArray()) {
		for ($i=1; $i < 5; $i++) { 
			echo '<button id="button'.$i.'">'.$row2['word'.$i].'</button>';
		}
	}
}
	echo '</center>';
endif;

// close connection
$con->close();

?>
<form class="team_button_div" action="incScore.php" method="post">
	<input type="text" name="amount" value="1" style="display: none;" />
	<input class="team_button" id="team1" type="submit" name="team1" value="Team 1" />
	<input class="team_button" id="none" type="submit" name="none" value="None" />
	<input class="team_button" id="team2" type="submit" name="team2" value="Team 2" />
</form>
</div>
<!-- </div> -->
</body>
</html>

