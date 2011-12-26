<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>Connect Wall</title>
<link rel="stylesheet" href="./layout.css" type="text/css" />
<script type="text/javascript">
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
                                }
                                else { //wrong answers, switch off buttons
                                       for(var j = 0; j <=3; j += 1)
                                               document.getElementById("btn"+answers[j]).style.background = "white";
                                }
                        }
                        return;
                }
        }
</script>
</head>
<body>
<!-- <div id="wrapper"> -->
<?php
  
// open database connection
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('db/onlyConnect.db');
    }
}

// open database connection
$con = new MyDB();

//$count1 = rand(1, 4);
$count1 = 1;

  
$result = $con->query("SELECT * FROM wall WHERE id=$count1");

$pointless = array("oneOne","oneTwo","oneThree","oneFour","twoOne","twoTwo","twoThree","twoFour","threeOne","threeTwo","threeThree","threeFour","fourOne","fourTwo","fourThree","fourFour");
echo '<center>';  
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
mysql_close($con);

?>
<!-- <form class="team_button_div" action="incScore.php" method="post">
	<input class="team_button" id="team1" type="submit" name="team1" value="Team 1" />
	<input class="team_button" id="none" type="submit" name="none" value="None" />
	<input class="team_button" id="team2" type="submit" name="team2" value="Team 2" />
</form> -->

<!-- </div> -->
</body>
</html>

