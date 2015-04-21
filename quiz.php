<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="fr" />
		<title> Quiz me ! </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
		<body>
		<div id="container">
			<div id="parent">
				<img src= "images/404.jpeg" width="100" height="100" alt="quiz" title="logo" vspace="5" hspace="5"/>
			</div>
			<h1> QUIZ WE FOUND 404 FAN </h1>
			
			<?php 
				
				$nbQuestions = 2;
				require_once("MyDB.php");
				
				$dbhandle = new SQLite3('quizz.db');
				if (!$dbhandle){
					die ('error came');
				}
				else{
					$result = $dbhandle->query('SELECT * FROM qcm');
					if (!$result) 
						die("Cannot execute query.");
						
					$i= 0;
					$request =  $dbhandle->query('SELECT id, question, rep1, rep2, rep3, rep_juste, images FROM qcm ORDER BY RANDOM() LIMIT $nbQuestions' );
					while ($row = $request->fetchArray(SQLITE3_ASSOC)) {
						var_dump($row);
					}
					/*$row = sqlite_fetch_array($result, SQLITE_ASSOC); 
					print_r($row);
					echo "<br>";

					sqlite_rewind($result);
					$row = sqlite_fetch_array($result, SQLITE_NUM); 
					print_r($row);
					echo "<br>";

					sqlite_rewind($result);
					$row = sqlite_fetch_array($result, SQLITE_BOTH); 
					print_r($row);
					echo "<br>";*/
				}
				sqlite_close($dbhandle);
				
				$nbRecord = pg_query($connexion,"SELECT * FROM quizz.qcm");  //select all the datas comming from the DB
				$nbRecord = pg_num_rows($nbRecord);  //nb insertions in the DB
				$request = pg_query($connexion,"SELECT id, question, rep1, rep2, rep3, rep_juste, images FROM quizz.qcm ORDER BY RANDOM() LIMIT $nbQuestions");
				$i = 0; 
				while($data = pg_fetch_array($request)){
			?>
			
			<FORM name="quiz" method="post" action="score1.php" enctype="multipart/form-data">
							<h2> <?php 
								$i++;
								echo $i.')'.$data['question']; 
								?>
							</h2>	
							<center>
							<IMG src="<?php 
										echo $data['images'] 
									  ?>" width="70" height="70" alt="first image" title="couleur" vspace="5" hspace="5">
							</center>
							<br>
							<input type="radio"name="<?php 
										echo 'reponse'.$i; 
									 ?>"value="<?php 
													echo $data['rep1'];
												?> "/>
									<?php
										echo $data['rep1'];
									?>
							<br>
							<input type="radio"name="<?php 
										echo 'reponse'.$i; 
									 ?>"value="<?php 
													echo $data['rep2'];
												?> "/>
									<?php
										echo $data['rep2'];
									?>
							<br>
							<input type="radio"name="<?php 
										echo 'reponse'.$i; 
									 ?>"value="<?php 
													echo $data['rep3'];
												?> "/>
									<?php
										echo $data['rep3'];
									?>
							<br>
							<input type="hidden"name="<?php 
										echo 'juste'.$i; 
									 ?>"value="<?php 
													echo $data['rep_juste'];
												?> "/>
			
			<?php
				}
			?>
			<br>
							<INPUT name="entrer" type="submit" value="Soumettre" style="background: #E7A200; font-family: Verdana; color: #000000; font-weight: 600; font-size: 9pt;">
							<INPUT name="Annuler" type="reset" value="Annuler" style="background: #E7A200; font-family: Verdana; color: #000000; font-weight: 600; font-size: 9pt;">
		</FORM>
		</div>
	</body>
</html>
