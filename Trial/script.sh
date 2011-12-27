sqlite3 $1 "create table wall(
	id smallint,
	oneOne varchar(20),oneTwo varchar(20),oneThree varchar(20),oneFour varchar(20),
	twoOne varchar(20),twoTwo varchar(20),twoThree varchar(20),twoFour varchar(20),
	threeOne varchar(20),threeTwo varchar(20),threeThree varchar(20),threeFour varchar(20),
	fourOne varchar(20),fourTwo varchar(20),fourThree varchar(20),fourFour varchar(20)
);"
a=0;
while read w1 w2 w3 w4 w5 w6 w7 w8 w9 w10 w11 w12 w13 w14 w15 w16
do 
 sqlite3 $1 "insert into wall values($a,$w1, $w2, $w3, $w4, $w5, $w6, $w7, $w8, $w9, $w10, $w11, $w12, $w13, $w14, $w15, $w16);"
 a = `expr $value + 1`;
done < $2

#sqlite3 $1 "create table wall(id smallint, oneOne varchar(20),oneTwo varchar(20),oneThree varchar(20),oneFour varchar(20), twoOne varchar(20),twoTwo varchar(20),twoThree varchar(20),twoFour varchar(20), threeOne varchar(20),threeTwo varchar(20),threeThree varchar(20),threeFour varchar(20), fourOne varchar(20),fourTwo varchar(20),fourThree varchar(20),fourFour varchar(20));"
#sqlite3 $1 "insert into wall values(1,'one','two','three','four','Colin','Helen','Gerald','Lin','Trev','Rich','Stu','Nit','Nixon','Oscar','Gilbert','Matilda');"
