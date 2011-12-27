#!/bin/bash

rm only_connect.db

# CATEGORIES GAME #############################################################
sqlite3 only_connect.db "CREATE TABLE categories (
	id_categories INTEGER NOT NULL PRIMARY KEY,
	connection VARCHAR(256) NOT NULL,
	word1 VARCHAR(256) NOT NULL,
	word2 VARCHAR(256) NOT NULL,
	word3 VARCHAR(256) NOT NULL,
	word4 VARCHAR(256) NOT NULL
);"

sqlite3 only_connect.db "INSERT INTO categories VALUES (1, 'colours', 'red', 'blue', 'green', 'yellow');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (2, 'numbers', '112345678654', 'vhgscdfjbsdfhbsdfsdf2', 'fwefhgwejfgwejhfgw3', 'sfhsg fsehjfbshf4');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (3, 'numbers3', '13', '23', '33', '43');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (4, 'numbers4', '14', '24', '34', '44');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (5, 'numbers5', '15', '25', '35', '45');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (6, 'numbers6', '16', '26', '36', '46');"

# SEQUENCES GAME ##############################################################
sqlite3 only_connect.db "CREATE TABLE sequences (
	id_sequences INTEGER NOT NULL PRIMARY KEY,
	word1 VARCHAR(256) NOT NULL,
	word2 VARCHAR(256) NOT NULL,
	word3 VARCHAR(256) NOT NULL,
	word4 VARCHAR(256) NOT NULL
);"

sqlite3 only_connect.db "INSERT INTO sequences VALUES (1, 'red', 'blue', 'green', 'yellow');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (2, '1', '2', '3', '4');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (3, '1323456t7', '5623', '4533', '43');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (4, '14', '24', '34', '44');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (5, '15', '25', '35', '45');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (6, '16', '26', '36', '46');"

# WALL GAME ###################################################################
sqlite3 only_connect.db "CREATE TABLE wall(
	id INTEGER,
	answer1 VARCHAR(200),answer2 VARCHAR(200),answer3 VARCHAR(200),answer4 VARCHAR(200),
	oneOne VARCHAR(20),oneTwo VARCHAR(20),oneThree VARCHAR(20),oneFour VARCHAR(20),
	twoOne VARCHAR(20),twoTwo VARCHAR(20),twoThree VARCHAR(20),twoFour VARCHAR(20),
	threeOne VARCHAR(20),threeTwo VARCHAR(20),threeThree VARCHAR(20),threeFour VARCHAR(20),
	fourOne VARCHAR(20),fourTwo VARCHAR(20),fourThree VARCHAR(20),fourFour VARCHAR(20)
);"

sqlite3 only_connect.db "INSERT INTO wall VALUES(
	1,
	'numberserhdfkg','parents','brothers','pets',
	'one','two','threedfgjdfgkjdf','four',
	'Colin','Helen','Gerald','Lin',
	'Trev','Rich','Stu','Nitdfgdfg',
	'Nixon','Oscardfghdfg','Gilbert','Matilda'
);"
sqlite3 only_connect.db "INSERT INTO wall VALUES(
	2,
	'numbers','animals','planets','letters',
	'1','2','3','4',
	'cat','dog','mouse','sheep',
	'mars','saturn','jupiter','earth',
	'a','b','c','d'
);"

# VOWEL GAME ##################################################################
sqlite3 only_connect.db "CREATE TABLE vowels (
	id_vowel INTEGER NOT NULL PRIMARY KEY,
	clue VARCHAR(256) NOT NULL,
	word VARCHAR(256) NOT NULL
);"

sqlite3 only_connect.db "INSERT INTO vowels VALUES(1, 'Santa', 'Reindeer');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(2, 'Film', 'X-men');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(3, 'Furniture', 'Sofa');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(4, 'kitchenware', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(5, 'kitchenware5', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(6, 'kitchenware6', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(7, 'kitchenware7', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(8, 'kitchenware8', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(9, 'kitchenware9', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(10, 'kitchenware10', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(11, 'kitchenware11', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(12, 'kitchenware12', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(13, 'kitchenware13', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(14, 'kitchenware14', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(15, 'kitchenware15', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(16, 'kitchenware16', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(17, 'kitchenware17', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(18, 'kitchenware18', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(19, 'kitchenware19', 'oven');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(20, 'kitchenware20', 'oven');"

# TEAM SCORES #################################################################
sqlite3 only_connect.db "CREATE TABLE scores (
	team1 INTEGER NOT NULL,
	team2 INTEGER NOT NULL
);"

sqlite3 only_connect.db "INSERT INTO scores VALUES(0, 0);"

## GAME PROGRESSION ############################################################
sqlite3 only_connect.db "CREATE TABLE level (
	playingTeam INTEGER NOT NULL,
	currentLevel INTEGER NOT NULL,
	roundNum INTEGER NOT NULL
);"

sqlite3 only_connect.db "INSERT INTO level VALUES (1, 1, 1);"

# ROUNDS PER LEVEL ############################################################
sqlite3 only_connect.db "CREATE TABLE rounds (
	levelNum INTEGER NOT NULL,
	numRounds INTEGER NOT NULL
);"

sqlite3 only_connect.db "INSERT INTO rounds VALUES (1, 6);"
sqlite3 only_connect.db "INSERT INTO rounds VALUES (2, 6);"
sqlite3 only_connect.db "INSERT INTO rounds VALUES (3, 2);"
sqlite3 only_connect.db "INSERT INTO rounds VALUES (4, 20);"




