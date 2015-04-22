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
	
	$base->exec('DROP TABLE IF EXISTS qcm');
	$base->exec('DROP TABLE IF EXISTS qcm1');
	$base->exec('DROP TABLE IF EXISTS qcm2');
	$base->exec('DROP TABLE IF EXISTS qcm3');
	$base->exec('DROP TABLE IF EXISTS user');
	$base->exec('DROP TABLE IF EXISTS score');
	
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
		name char(50) NOT NULL,
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
		id INTEGER PRIMARY KEY AUTOINCREMENT
		);
		
	   CREATE TABLE qcm2( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id INTEGER PRIMARY KEY AUTOINCREMENT
		);
		
	  CREATE TABLE qcm3( 
		question text NOT NULL,
		rep1 char(100) NOT NULL,
		rep2 char(100) NOT NULL,
		rep3 char(100) NOT NULL,
		rep_juste char(100) NOT NULL,
		images character(60) NOT NULL,
		id INTEGER PRIMARY KEY AUTOINCREMENT
		);
		
	  CREATE TABLE score( 
		score_q1 integer,
		score_q2 integer,
		score_q3 integer,
		score_first integer,
		score_second integer,
		uid INTEGER PRIMARY KEY AUTOINCREMENT
		);
		
		INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quel était le mot remplacé par WE ?", "Nut", "Not", "Nit", "Not", "images/404.jpeg");
   		INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quel était le mot remplacé par WE ?", "Nut", "Not", "Nit", "Not", "images/404.jpeg");
			
		
		
EOF;

 $ret = $base->exec($sql);
   if(!$ret){
      echo $base->lastErrorMsg();
   } 
   else {
      echo "All table created successfully\n";
      $result = $dbhandle->query('SELECT * FROM qcm');
	  //$result = $base->exec($query);
	  while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
		echo 'test in';
		var_dump($row);
	  }
	  var_dump($base);
	  echo "test out \n";
   }
   
  //$query = 'SELECT * FROM qcm';
 


 

   
   $base->close();
	
}
  
?>
