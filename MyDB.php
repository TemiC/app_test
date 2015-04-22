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
	
		
		
		
EOF;

 $ret = $base->exec($sql);
   if(!$ret){
      echo $base->lastErrorMsg();
   } 
   else {
      echo "All table created successfully\n";
   }
   
  // $query = 'INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quel était le mot remplacé par WE ?", "Nut", "Not", "Nit", "Not ,"images/404.jpeg")';
			
   //$base->exec($query);
   //var_dump($base);
   
   //$base->close();
	
}
  
?>
