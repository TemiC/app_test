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
   
   $query = 'INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quel était le mot remplacé par WE ?", "Nut", "Not", "Nit", "Not ,"images/404.jpeg »)’;
			 
			 /*INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)
			 VALUES("Quest-ce que freepik ?", "Un site web super genial pour tous les webdesigners", "Un site de rencontre pour les hommes tous désespérés","Un site créé par des étudiants de la promo de Janvier de lESGI","Un site web super génial pour tous les web designers","images/freepik.jpg")';
  */
   $base->exec($query);
   var_dump($base);
   
   $base->close();
	
}
  
?>
