<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>Connect Wall</title>
<link rel="stylesheet" href="./layout.css" type="text/css" />
<script type="text/javascript">
window.onload = function() { timedCount(); }    
    var t;
	var userRevealed = true;
	var time = 180;
	var lives = 3;
        var a = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        var answers = [0,0,0,0];
        var correct = 0;
        var colours = ["red","blue","green","yellow"];
        var words = [<?php
                $setOrder = range(0,15);
                shuffle($setOrder);
                for ($k =0;$k<=15;$k +=1){
                        echo $setOrder[$k];
                        if ($k != 15) echo ',';
                } ?>];

        function checkSelection() {
                var group = Math.floor(words[answers[0]]/4);
                for (var k = 1; k <=3; k++)
                         if (Math.floor(words[answers[k]]/4) != group)
                                 return false;
                return true;
        }

        function fillAnswers(){
                var index = 0;
                for (var k = 0; k <= 15; k += 1)
                        if (a[k] == 1)
                                answers[index++]=k;
        }

        function toggle(i) {
                //Checking if select field is enabled
                if (document.getElementById("btn"+i).style.background == "gray") {
                        //deselected colour of button
                        document.getElementById("btn"+i).style.background = "white";
                        a[i] = 0;
                        return;
                }
                //Checking if select field is disabled
                else {
                        //selected colour of button
                        document.getElementById("btn"+i).style.background = "gray";
                        a[i] = 1;
                        var tempCount = 0;
                        for(var j = 0; j < 16; j +=1){
                                tempCount += a[j];
                        }
                        if ( tempCount == 4){ //if there are enough buttons selected.
                                fillAnswers();
                                a = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
                                if(checkSelection()){ //correct answers, disable buttons
                                       for(var j = 0; j <=3; j += 1){
                                               document.getElementById("btn"+answers[j]).disabled = true;
                                               document.getElementById("btn"+answers[j]).style.background = colours[correct];
                                       }
                                       correct++;
		document.getElementById("score").value += 1;
                                }
                                else { //wrong answers, switch off buttons
                                       for(var j = 0; j <=3; j += 1)
                                               document.getElementById("btn"+answers[j]).style.background = "white";
                                       if (correct >= 2) {
                                       		lives--;
                                       		if (lives == 0) {
                                       			endGuesses();
                                       		}
                                      }
                                }
                        }
                		if (correct == 4) {
                			endGuesses();
                		}
                        return;
                }
        }
    
	function timedCount()
	{
		if (time == 1) {
			endGuesses();
			document.getElementById("timertext").value = "time up";
			document.getElementById("timertext").style.width = "190px";
			return;
		}
		time = time - 1;
		document.getElementById('timertext').value = time;
		clearTimeout(t);
		t = setTimeout("timedCount()", 1000);
	}
	function assignColours() {
		for (i = 0; i < 16; i++)
			document.getElementById("btn"+i).style.background = colours[Math.floor(words[i]/4)];
	}
	function endGuesses() {
		assignColours();
		clearTimeout(t);
		for (var i = 0; i < 16; i++)
			document.getElementById("btn"+i).disabled = true;
		document.getElementById("revealdiv").style.display = "inline";
		/////////////////////////////////////////////////////////////////////////////////
		//document.getElementById("none").style.display = "inline";
		//document.getElementById("none").style.float = "none";
		//document.getElementById("none").value = "next";
		//document.getElementById("none").style.margin = "0px 150px";
		userRevealed = false;
	}
	function pauseButton() {
		clearTimeout(t);
		if (userRevealed) {
			document.getElementById("word").innerHTML = "reveal";
			document.getElementById("word").onclick = "revealAll()";
		}
	}
	function revealScores() {
		document.getElementById("pointsdiv").style.display = "inline";
	}
	function revealAll() {
		document.getElementById("phrases").style.display = "inline";
		document.getElementById("pointsdiv").style.display = "inline";
		//if (userRevealed) {
			//document.getElementById("word").innerHTML = "reveal";
			//document.getElementById("team1").style.display = "inline";
			//document.getElementById("team2").style.display = "inline";
			//document.getElementById("none").style.display = "inline";
			//document.getElementById("team1").style.background = "#f00";
			//document.getElementById("team2").style.background = "#00f";
			clearTimeout(t);
			
		//}
	}
	function addScore(scored) {
		document.getElementById("score").value = (document.getElementById("score").value).length + scored;
		document.getElementById("phrases").style.display = "none";
		document.getElementById("pointsdiv").style.display = "none";
			//document.getElementById("word").innerHTML = "reveal";
			document.getElementById("team1").style.display = "inline";
			document.getElementById("team2").style.display = "inline";
			document.getElementById("none").style.display = "inline";
			document.getElementById("team1").style.background = "#f00";
			document.getElementById("team2").style.background = "#00f";
	}
</script>
</head>
<body>
<!-- <div id="wrapper"> -->
<?php

require('constants.php');

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

//$count1 = rand(1, 4);
$result0 = $con->query("SELECT * FROM level");
$count1 = 0;
if ($row0 = $result0->fetchArray())
	$count1 = $row0['roundNum'];

$result = $con->query("SELECT * FROM wall WHERE id=$count1");

$pointless = array("oneOne","oneTwo","oneThree","oneFour","twoOne","twoTwo","twoThree","twoFour","threeOne","threeTwo","threeThree","threeFour","fourOne","fourTwo","fourThree","fourFour");
echo '<center>';
$row = null;  
if ($row = $result->fetchArray())
{
        for ($i = 0; $i <= 3; $i += 1){
                echo '<div>';
                for ($j = 0; $j <= 3; $j +=1) {
                        $k = 4*$i + $j;
	                echo '<input id="btn'.$k.'" onclick="toggle('.$k.')" type="button" value="'.$row[$pointless[$setOrder[$k]]].'" style="background: white;width: 200px; height: 100px; font-size: 300%;">';
                         echo '</input>';
                }
		echo '</div>';
        }
}  
echo '</center>';
// close connection
$con->close();

?>
<div id="revealdiv" style="width: 100px;margin:10px auto; display: none;">
	<center><button id="reveal" onclick="revealAll()" style="font-size: 300%;">reveal</button></center>
</div>
<div><center>
	<?php
		
	?>
</center></div>

<div id="phrases" style="display: none;"><center><?php
	for ($i = 1; $i < 5; $i++)
		echo '<button style="font-size: 300%;">'.$row['answer'.$i].'</button>';
?></center></div>

<div id="pointsdiv" style="display: none;"><center>
	<?php
		for ($i = 0; $i < 5; $i++) {
			echo '<button style="font-size: 300%;" onclick="addScore('.$i.')"">'.$i.'</button>';
		}
	?>
</center></div>

<form class="team_button_div" action="incScore.php" method="post">
	<input id="score" type="text" name="amount" value="" style="display: none;" />
	<input class="team_button" id="team1" type="submit" name="team1" value="Team 1" />
	<input class="team_button" id="none" type="submit" name="none" value="None" />
	<input class="team_button" id="team2" type="submit" name="team2" value="Team 2" />
</form>

<center><input id="timertext" type="text" value="45" style="width: 140px;" /></center>

<!-- </div> -->
</body>
</html>
