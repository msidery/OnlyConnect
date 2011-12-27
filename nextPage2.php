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
			echo $row['currentLevel'].', '.$row['roundNum'];
			//$next = levelName($row['currentLevel']);
			$con->query('UPDATE level SET roundNum=roundNum+1');
			$con->query('UPDATE level SET playingTeam=1-playingTeam');
		}
		else {
			if ($row['currentLevel'] == 4) {
				$next = 'scores';
			}
			else {
				//$next = levelName($row['currentLevel']+1);
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