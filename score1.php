<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>index</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		</head>
			<body>
			<div id="container">
				<div id="parent">
					<img src= "images/404.jpeg" width="100" height="100" alt="quiz" title="logo" vspace="5" hspace="5"/>
				</div>
					<h1> WE FOUND 404 QUIZ FAN </h1>
					<br>
					<img src="images/quizzi.jpg" width="430" height="250" alt="quiz" title="quiz" vspace="5" hspace="5"/>	
					<FORM name="quiz" method="post" action="quiz2.php" enctype="multipart/form-data">
			
					<?php

						require_once("MyDB.php");
				
						$dbhandle = new SQLite3('quizz.db');
						if (!$dbhandle){
							die ('error came');
						}
						else {
							$nbPoint = 0;
							function checkAnswer($player, $correct){
								if($player == $correct){
									$nbPoint ++;
								}
							}
							
							/*for ($j=1; $j<= 2; $j++){
								if (isset($_POST['reponse'.$j]))
									${"reponse"."$j"} = $_POST['reponse'.$j];
							}

							while($i <= 2){
								checkAnswer(${"reponse"."$i"},$_POST['juste', $i]);
								i++;
							}
							
							if($nbPoint == 0){
								echo 'Vous avez obtenu 0/2 à la partie I';
								 $query = ' INSERT INTO score (score_q1, score_q2, score_q3, score_first, score_second, uid)VALUES(0, NULL, NULL, NULL, NULL, NULL)';
								 $result = $base->exec($query);
							}
							else if ($nbPoint == 1){
								echo 'Vous avez obtenu 1/2 à la partie II';
								 $query = ' INSERT INTO score (score_q1, score_q2, score_q3, score_first, score_second, uid)VALUES(1, NULL, NULL, NULL, NULL, NULL)';
								 $result = $base->exec($query);
							}
							else{
								echo 'Vous avez obtenu 2/2 à la partie II';
								 $query = ' INSERT INTO score (score_q1, score_q2, score_q3, score_first, score_second, uid)VALUES(2, NULL, NULL, NULL, NULL, NULL)';
								 $result = $base->exec($query);
							}*/
						}
					?>
			
					<INPUT name="entrer" type="submit" value="Continuer le quiz" style="background: #E7A200; font-family: Verdana; color: #000000; font-weight: 600; font-size: 9pt;">
							
				</FORM>
				<?php
					sqlite_close($dbhandle);
				?>
			</div>
	</body>

</html>
