<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="fr" />

		<title>question 1</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		 </head>
			<body>
			<div id="container">
				
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
			

			<script>
			  window.fbAsyncInit = function() {
				FB.init({
				  appId      : '656253677833609',
				  xfbml      : true,
				  version    : 'v2.2'
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

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>

		</div>
			</body>
</html>
