#!/bin/bash

rm only_connect.db

sqlite3 only_connect.db "CREATE TABLE vowels (
	id_vowel INTEGER NOT NULL PRIMARY KEY,
	clue VARCHAR(256) NOT NULL,
	word VARCHAR(256) NOT NULL
)"


sqlite3 only_connect.db "INSERT INTO vowels VALUES(1, 'Santa', 'Reindeer');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(2, 'Film', 'X-men');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(3, 'Furniture', 'Sofa');"
sqlite3 only_connect.db "INSERT INTO vowels VALUES(4, 'kitchenware', 'oven');"
