<center>
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

// close connection
$con->close();

?>


<?php

function levelName($levelNum) {
	switch ($levelNum) {
		case 1: {
			return 'categories';
		}
		case 2: {
			return 'sequences';
		}
		case 3: {
			return 'wall';
		}
		case 4: {
			return 'vowels';
		}
		default: {
			return 'scores';
		}
	}
}

// open database connection
$con = new MyDB();

$result = $con->query("SELECT * FROM level");
$next = 'scores';
if ($row = $result->fetchArray()) {
	$result2 = $con->query("SELECT * FROM rounds where levelNum=".$row['currentLevel']);
	if ($row2 = $result2->fetchArray()) {
		if ($row['roundNum'] < $row2['numRounds']) {
			//echo $row['currentLevel'].', '.$row['roundNum'];
			$next = levelName($row['currentLevel']);
			$con->query('UPDATE level SET roundNum=roundNum+1');
			$con->query('UPDATE level SET playingTeam=1-playingTeam');
		}
		else {
			if ($row['currentLevel'] == 4) {
				$next = 'scores';
			}
			else {
				$next = levelName($row['currentLevel']+1);
				$con->query('UPDATE level SET currentLevel=currentLevel+1');
				$con->query('UPDATE level SET roundNum=1');
				$con->query('UPDATE level SET playingTeam=1-playingTeam');
			}
		}
		//$con->query('UPDATE level');
	}
	else {
		echo "failed2";
	}
}
else {
	echo "failed";
}

// close connection
$con->close();

?>

<form class="team_button_div" action="<?php echo $next; ?>.php" method="post">
	<input class="team_button" type="submit" name="next" value="Next"  style="font-size: 300%;"/>
</form>
</center>