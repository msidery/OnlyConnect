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

sqlite3 only_connect.db "INSERT INTO categories VALUES (2, 'numbers', '1', '2', '3', '4');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (3, 'numbers3', '13', '23', '33', '43');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (4, 'numbers4', '14', '24', '34', '44');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (5, 'numbers5', '15', '25', '35', '45');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (6, 'numbers6', '16', '26', '36', '46');"
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





