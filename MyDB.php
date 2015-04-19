<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('quizz.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } 
   else {
      echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      CREATE TABLE qcm( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id autoincrement PRIMARY KEY NOT NULL
		);
EOF;

 $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } 
   else {
      echo "Table created successfully\n";
   }
   
 $sql1 =<<<EOF
      CREATE TABLE qcm1( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id autoincrement PRIMARY KEY NOT NULL
		);
EOF;

 $ret1 = $db->exec($sql1);
   if(!$ret1){
      echo $db->lastErrorMsg();
   } 
   else {
      echo "Table created successfully\n";
   }

 $sql2 =<<<EOF
      CREATE TABLE qcm2( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id autoincrement PRIMARY KEY NOT NULL
		);
EOF;

 $ret2 = $db->exec($sql2);
   if(!$ret2){
      echo $db->lastErrorMsg();
   } 
   else {
      echo "Table created successfully\n";
   }

 $sql3 =<<<EOF
      CREATE TABLE qcm3( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id autoincrement PRIMARY KEY NOT NULL
		);
EOF;

 $ret3 = $db->exec($sql3);
   if(!$ret3){
      echo $db->lastErrorMsg();
   } 
   else {
      echo "Table created successfully\n";
   }

 $sql4 =<<<EOF
      CREATE TABLE score( 
		uid integer PRIMARY KEY NOT NULL,
		score_q1 integer,
		score_q2 integer,
		score_q3 integer,
		score_first integer,
		score_second integer,
		);
EOF;


 $ret3 = $db->exec($sql3);
   if(!$ret3){
      echo $db->lastErrorMsg();
   } 
   else {
      echo "Table created successfully\n";
   }
   
   
$sql5 =<<<EOF
      CREATE TABLE user( 
		name character(25) NOT NULL,
	    mail character(50) NOT NULL,
	    genre character(25) NOT NULL,
	    uid serial NOT NULL,
	    id_fb int PRIMARY KEY NOT NULL,
		);
EOF;

   $ret5 = $db->exec($sql5);
   if(!$ret5){
      echo $db->lastErrorMsg();
   } 
   else {
      echo "Table created successfully\n";
   }
   $db->close();
?>