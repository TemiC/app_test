<?php

	session_start();
	// Afficher les erreurs à l'écran
	ini_set('display_errors', 1);
	// Enregistrer les erreurs dans un fichier de log
	ini_set('log_errors', 1);
	// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
	// Afficher les erreurs et les avertissements
	error_reporting(e_all);
?>


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
					<div>	
						<?php require_once("connection.php"); ?> 
					</div>
			</div>
	</body>

</html>
