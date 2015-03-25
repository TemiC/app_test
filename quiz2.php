<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="fr" />

		<title>Quiz me ! </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		 </head>
			<body>
			<div id="container">
				<div id="parent">
					<img src= "images/404.jpeg" width="100" height="100" alt="quiz" title="logo" vspace="5" hspace="5"/>
				</div>
				<h1>QUIZ WE FOUND 404 FAN </h1>
						<?php include('decompte.php');?>
						
					<FORM name="quiz" method="post" action="quiz3.php" enctype="multipart/form-data">
							<P>Quel était le mot remplacé par "WE"  ?</B>
							<center></center><IMG src="images/wefound404.jpg" width="324" height="115" alt="first image" title="couleur" vspace="5" hspace="5"></center>
							<br>
							<INPUT name="question2" type="radio" value="value1">Nut<BR>
							<INPUT name="question2" type="radio" value="value1">Not<BR>
							<INPUT name="question2" type="radio" value="value2">Nit<P> 
							<INPUT name="entrer" type="submit" value="Soumettre" style="background: #E7A200; font-family: Verdana; color: #000000; font-weight: 600; font-size: 9pt;">
							<INPUT name="Annuler" type="reset" value="Annuler" style="background: #E7A200; font-family: Verdana; color: #000000; font-weight: 600; font-size: 9pt;">
					</FORM>
		</div>
			</body>
</html>
