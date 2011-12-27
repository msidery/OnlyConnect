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

sqlite3 only_connect.db "INSERT INTO categories VALUES (2, 'arbitrary choices', 'Primary colours of light', 'units of measurement', '0.5 \u2248 1', 'heads or tails');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (4, 'Tracys (Thunderbirds)', 'John', 'Gordon', 'Scott', 'Virgil');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (5, 'both square and cube', '4096', '729', '1', '64');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (3, 'Broom cupboard presenters', 'Simon Parkin', 'Andy Crane', 'Andi Peters', 'Philip Schofield');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (1, 'Deaths in Harry Potter', 'Frank Bryce','Amilia Bones','Sirius Black','Albus Dumbledore');"
sqlite3 only_connect.db "INSERT INTO categories VALUES (6, 'music by John Williams', 'Hook', 'Home alone', 'Indiana Jones', 'Star Wars');"

# SEQUENCES GAME ##############################################################
sqlite3 only_connect.db "CREATE TABLE sequences (
	id_sequences INTEGER NOT NULL PRIMARY KEY,
	word1 VARCHAR(256) NOT NULL,
	word2 VARCHAR(256) NOT NULL,
	word3 VARCHAR(256) NOT NULL,
	word4 VARCHAR(256) NOT NULL
);"

sqlite3 only_connect.db "INSERT INTO sequences VALUES (5, 'Potassium', 'Rubidium', 'Caesium', 'Francium');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (1, 'Lancester', 'York', 'Tudor', 'Stuart');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (3, 'Hydrogen', 'Helium', 'Oxygen', 'Carbon');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (2, '13', '21', '34', '55');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (6, 'Baroness','Earl Marshal','Archbishop','Dalmuti');"
sqlite3 only_connect.db "INSERT INTO sequences VALUES (4, 'Swim','Milk','Dance','Leap');"

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
        'captains of starship enterprise','types of fish','mythical creatures','star constellations',
	'Pike','Kirk','Picard','Archer',
        'Bass','Trout','Chimaera','Cod',
	'Sphinx','Basalisk','Mandrake','Monopod',
	'Caseopea','Pegasus','Scorpius','Centaurus'
);"
sqlite3 only_connect.db "INSERT INTO wall VALUES(
	2,
        'elements','weaknesses','colours','van gogh paintings',
	'fire','quintessence','hydrogen','neon',
	'gold','black','sea green','amethyst',
	'iron','silver','self portrait','kryptonite',
	'sunflowers','wheat fields','white orchard','almond blossoms'
);"

# VOWEL GAME ##################################################################
sqlite3 only_connect.db "CREATE TABLE vowels (
	id_vowel INTEGER NOT NULL PRIMARY KEY,
	clue VARCHAR(256) NOT NULL,
	word VARCHAR(256) NOT NULL
);"

sqlite3 only_connect.db "INSERT INTO vowels VALUES(14, 'Christmas', 'roast turkey');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(3, 'Christmas', 'pigs in blankets');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(9, 'Christmas', 'presents under the tree');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(18, 'Christmas', 'jesus in a manger');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(19, 'Christmas', 'star over bethlehem');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(4, 'Carol', 'once in royal davids city');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(15, 'Carol', 'hark the herald angels sing');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(2, 'Carol', 'away in a manger');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(8, 'Film', 'amile');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(16, 'Film', 'nightmare before christmas');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(17, 'Film', 'count of monte cristo');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(6, 'Film', 'dances with wolves');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(20, 'Film', 'indiana jones and the last crusade');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(13, 'Charactor', 'popeye');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(10, 'Charactor', 'robin hood');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(7, 'Charactor', 'aladin');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(12, 'Charactor', 'child catcher');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(5, 'Element', 'earth');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(1, 'Element', 'fluorine');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(11, 'Element', 'heating');"

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




