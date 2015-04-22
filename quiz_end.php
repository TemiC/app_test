<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="fr" />

		<title>quiz me !!</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		 </head>
			<body>
			<div id="container">
				
				<h1> THE END </h1>
					<br><br>
					<div>
					<a href = 'http://hidden-retreat-3686.herokuapp.com/quiz.php' ><img src="images/replay.jpg" width="200" height="200" alt="quiz" title="quiz" vspace="5" hspace="5"/></a>
					</div>
					
			<br><br><br><br><br><br><br><br><br><br>



			<?php
				require_once("session.php");
				
				if(isset($session)) {
					/*try {	
						$user_profile = (new FacebookRequest(
						$session, 'GET', '/me'
						))->execute()->getGraphObject(GraphUser::className());
					} 
					catch(FacebookRequestException $e) {
					} 
					echo "certaines info de la page wefound404 peuvent vous intéressez !";
					$request_event =(new FacebookRequest($session), 'GET', '747936718583560/likes');
					$response = $request->execute();
					$graphObject = $response->getGraphObject()->asArray();

					foreach ($graphObject['data'] as $key) {
						echo "Message de " .$key->from->name."</strong> : ".$key->message. "<br>";
						echo "Le " .$key->created_time. "<br><br>";
					}*/
				}
			?>

		
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
