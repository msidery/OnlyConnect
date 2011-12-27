<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>CATEGORIES</title>
<link rel="stylesheet" href="./layout.css" type="text/css" />
<script type="text/javascript">
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

$result = $con->query("SELECT * FROM level");
if ($row = $result->fetchArray()):
	$result2 = $con->query("SELECT * FROM categories WHERE id_categories=".$row['roundNum']);
	if ($row2 = $result2->fetchArray()):

?>
window.onload = function() { timedCount(); }
	var t;
	var userRevealed = true;
	var time = 46;
	function timedCount()
	{
		if (time == 1) {
			document.getElementById("timertext").value = "time up";
			document.getElementById("timertext").style.width = "190px";
			otherteam();
			//endWord('<?php //echo $row2['connection']; ?>//');
			return;
		}
		time = time - 1;
		document.getElementById('timertext').value = time;
		clearTimeout(t);
		t = setTimeout("timedCount()", 1000);
	}
	function otherteam() {
		for (var i = 1; i < 5; i++)
			document.getElementById("button"+i).disabled = true;
		//document.getElementById("category").style.display = "inline";
		//document.getElementById("category").innerHTML = wordtext;
		document.getElementById("category").innerHTML = "other team guess";
		document.getElementById("button2").style.display = "inline";
		document.getElementById("button3").style.display = "inline";
		document.getElementById("button4").style.display = "inline";
		document.getElementById("score").value = "1";
		document.getElementById("category").onclick = "revealWord('<?php echo $row2['connection']; ?>')";
		userRevealed = false;
	}
	function endWord(wordtext) {
		for (var i = 1; i < 5; i++)
			document.getElementById("button"+i).disabled = true;
		document.getElementById("category").style.display = "inline";
		document.getElementById("category").innerHTML = wordtext;
		document.getElementById("button2").style.display = "inline";
		document.getElementById("button3").style.display = "inline";
		document.getElementById("button4").style.display = "inline";
		document.getElementById("score").value = "1";
		document.getElementById("none").style.display = "inline";
		document.getElementById("none").style.float = "none";
		document.getElementById("none").value = "next";
		document.getElementById("none").style.margin = "0px 150px";
	}
	function pauseButton() {
		for (var i = 1; i < 5; i++)
			document.getElementById("button"+i).disabled = true;
		clearTimeout(t);
		if (userRevealed) {
			document.getElementById("category").innerHTML = "reveal";
			document.getElementById("category").onclick = "revealWord('<?php echo $row2['connection']; ?>')";
		}
	}
	function reveal2() {
		document.getElementById("button2").style.display = "inline";
		document.getElementById("score").value = "3";
	}
	function reveal3() {
		document.getElementById("button3").style.display = "inline";
		document.getElementById("score").value = "2";
	}
	function reveal4() {
		document.getElementById("button4").style.display = "inline";
		document.getElementById("score").value = "1";
	}
	function otherTeam() {
		document.getElementById("button4").style.display = "inline";
		document.getElementById("score").value = "1";
	}
	function revealWord(wordtext) {
		//if (userRevealed) {
			document.getElementById("category").innerHTML = wordtext;
			document.getElementById("team1").style.display = "inline";
			document.getElementById("team2").style.display = "inline";
			document.getElementById("none").style.display = "inline";
			document.getElementById("team1").style.background = "#f00";
			document.getElementById("team2").style.background = "#00f";
			clearTimeout(t);
		//}
	}
</script>
</head>
<body>
<!-- <div id="wrapper"> -->
<center><input id="timertext" type="text" value="45" /></center>
<div style="height: 60px; margin: 10px auto;">
<center>
<?php
		for ($i=1; $i < 5; $i++) { 
			echo '<button id="button'.$i.'" style="font-size: 300%;';
			if ($i != 1)
				echo ' display: none;';
			echo '" onclick="reveal'.($i+1).'()">'.$row2['word'.$i].'</button>';
		}
	endif;
endif;
echo '</center>';

// close connection
$con->close();

?>
<div style="width: 100px;margin:10px auto"><center><button id="category" onclick="pauseButton()" style="font-size: 300%;">Stop</button></center></div>
<form class="team_button_div" action="incScore.php" method="post">
	<input id="score" type="text" name="amount" value="5" style="display: none;" />
	<input class="team_button" id="team1" type="submit" name="team1" value="Team 1" />
	<input class="team_button" id="none" type="submit" name="none" value="None" />
	<input class="team_button" id="team2" type="submit" name="team2" value="Team 2" />
</form>
</div>
<!-- </div> -->
</body>
</html>

