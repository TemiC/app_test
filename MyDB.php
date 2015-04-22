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
		
		
		
		
EOF;

 $ret = $base->exec($sql);
   if(!$ret){
      echo $base->lastErrorMsg();
   } 
   else {
      //echo "All table created successfully\n";
      $query = ' INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quel était le mot remplacé par WE ?", "Nut", "Not", "Nit", "Not", "images/404.jpeg");
   				 INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quest-ce que freepik ?", "Un site web super genial pour tous les webdesigners", "Un site de rencontre pour les hommes tous désespérés","Un site créé par des étudiants de la promo de Janvier de lESGI","Un site web super génial pour tous les web designers","images/freepik.jpg");
   				 INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Vers quel outils peut-on exporter nos projets Google Code", "Vers Githoub", "Vers Gitub", "Vers Github", "Vers Github","images/github.jpg");
   				 INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quest-ce-quest Netflix ?", "Netflix est mon voisin du dessous à droite", "Netflix est une plateforme de streaming", "Netflix est un super virus provenant de la Russie", "Netflix est une plateforme de streaming","images/netflix-logo.png");
   				 INSERT INTO qcm (question, rep1, rep2, rep3, rep_juste, images)VALUES("Comment sappelle le clone libre de Siri ?", "Ciri", "Sirius", "Siriri","Sirius","images/apple.jpg");

   				 INSERT INTO qcm1 (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quel grand studio nous offre la possibilité de créer son propre film ?", "Pixar", "DreamWorks", "Walt Disney","Pixar","images/wall-e.jpg");
   				 INSERT INTO qcm1 (question, rep1, rep2, rep3, rep_juste, images)VALUES("Comment sappelle le calligraphe anglais qui redessine les logos célèbres avec sa plume ?", "Bastian Colt", "Bastian Lester", "Kevin Lester","Bastien Lester","images/calligraphie.jpg");
   				 INSERT INTO qcm1 (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quel sera la nouvelle version de PHP", "PHP 12", "PHP 6", "PHP 7","PHP 7","images/php.jpg");
   				 INSERT INTO qcm1 (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quel sera le nouvel OS de Microsoft ?", "Microsoft 20", "Microsoft 9", "Microsoft 10","Microsoft 10","images/microsoft.png");
   				 INSERT INTO qcm1 (question, rep1, rep2, rep3, rep_juste, images)VALUES("On peu désormais retrouver son smartphone avec une montre sous Android Wear grâce à qui ?", "A moi", "A Facebook", "A Google","A Google","images/android-wear.jpg");
   				 INSERT INTO qcm1 (question, rep1, rep2, rep3, rep_juste, images)VALUES("Entre autre Facetime et Facebook Messager quel autre logiciels de VoiIP pourra être sur écoute ?", "Skype", "MSN", "SnapChat","Skype","images/sur-ecoute.jpg");
   				 
   				 INSERT INTO qcm2 (question, rep1, rep2, rep3, rep_juste, images)VALUES("Quest-ce quest BuzzFil ?", "Un site de rencontre pour personne âgés", "Un jeune média indépendant", "Une nouvelle téléréalité","Un jeune média indépendant","images/buzz-fil.png");
   				 INSERT INTO qcm2 (question, rep1, rep2, rep3, rep_juste, images)VALUES("Comment sappelle le fast food consacré entierement à Nutella", "Nutella world", "Nutelleria", "Nutell","Nutelleria","images/nutella");
   				 INSERT INTO qcm2 (question, rep1, rep2, rep3, rep_juste, images)VALUES("La série Vickings recherche 8000 figurants pour sa prochaine saison ou ce situe t-elle ?", "En Suède", "Au Pays-Bas", "En Irland","En Irland","images/vickings.jpg");
   				 INSERT INTO qcm2 (question, rep1, rep2, rep3, rep_juste, images)VALUES("Pixar est une industrie spécialisé dans ... ?", "Dans les composants informatique", "Dans les films danimations", "Dans la construction de robot","Dans les films danimations","images/wall-e.jpg");
   				 INSERT INTO qcm2 (question, rep1, rep2, rep3, rep_juste, images)VALUES("ai2html est un script pour Adobe Illustrator qui permet de convertir un fichier Adobe Illustrator en ... ?", "Un fichier java", "Un fichier html", "Un fichier binaire","Un fichier html","images/illustrator.jpg");
   				 INSERT INTO qcm2 (question, rep1, rep2, rep3, rep_juste, images)VALUES("Qui travail sur l élaboration drone camera ?", "Une grande entreprise de la Sillicone Vallée", "Une petite startup à Bordeaux", "Google","Une petite startup à Bordeaux","images/drone.jpg");';
      //$result = $dbhandle->query('SELECT * FROM qcm');
	  $result = $base->exec($query);
	  //var_dump($base);
   }
   
   $base->close();
	
}
  
?>
