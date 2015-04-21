<?php

$dbname = 'quizz.db';
				
//var_dump(class_exists('SQLite3'));
if(!class_exists('SQLite3'))
	die('connection failed');

$base = new SQLite3($dbname);
if(!$base){
	echo $base->LastErrorMsg();
}
else{
	//echo 'connect database ok';
	//require_once("MyDB");
	
	$base->exec('DROP TABLE IF EXISTS qcm');
	$base->exec('DROP TABLE IF EXISTS user');
	
	$sql =<<<EOF
      CREATE TABLE qcm( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id INTEGER PRIMARY KEY AUTOINCREMENT
		);
		
	  CREATE TABLE user( 
		name char(5O) NOT NULL,
		mail char(100) NOT NULL,
		genre char(25) NOT NULL,
		id_fb char(100) NOT NULL,
		id INTEGER PRIMARY KEY AUTOINCREMENT
		);
		
	  CREATE TABLE qcm1( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id autoincrement PRIMARY KEY NOT NULL
		);
		
	   CREATE TABLE qcm2( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id autoincrement PRIMARY KEY NOT NULL
		);
		
	  CREATE TABLE qcm3( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id autoincrement PRIMARY KEY NOT NULL
		);
		
	  CREATE TABLE score( 
		uid integer PRIMARY KEY NOT NULL,
		score_q1 integer,
		score_q2 integer,
		score_q3 integer,
		score_first integer,
		score_second integer,
		);
EOF;

 $ret = $base->exec($sql);
   if(!$ret){
      echo $base->lastErrorMsg();
   } 
   else {
      echo "All table created successfully\n";
   }
   
   $query = 'INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quel était le mot remplacé par WE ?", "Nut", "Not", "Nit", "Not""images/404.jpeg");
			 INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quest-ce que freepik ?", "Un site web super genial pour tous les webdesigners", "Un site de rencontre pour les hommes tous désespérés","Un site créé par des étudiants de la promo de Janvier de lESGI","Un site web super génial pour tous les web designers","images/freepik.jpg")';
   $base->exec($query);
   var_dump($base);
   
   $base->close();
	
}
  
?>
