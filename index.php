<?php

	session_start();
	// Afficher les erreurs à l'écran
	ini_set('display_errors', 1);
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

					<script>
				      window.fbAsyncInit = function() {
				        FB.init({
				          appId      : 'your-app-id',
				          xfbml      : true,
				          version    : 'v2.3'
				        });
				      };

				      (function(d, s, id){
				         var js, fjs = d.getElementsByTagName(s)[0];
				         if (d.getElementById(id)) {return;}
				         js = d.createElement(s); js.id = id;
				         js.src = "//connect.facebook.net/en_US/sdk.js";
				         fjs.parentNode.insertBefore(js, fjs);
				       }(document, 'script', 'facebook-jssdk'));
				    </script>
					<div>	
						<?php require_once("connection.php"); ?> 
					</div>
			</div>
	</body>

</html>
