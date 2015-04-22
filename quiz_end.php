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
					<div id="replay">
					<?php echo '<a href="http://hidden-retreat-3686.herokuapp.com/quiz.php">REPLAY</a>'; ?>
					</div>
					
			<br><br><br><br><br><br><br><br><br><br>



			<?php
				echo "test1\n";
				require_once("session.php"); 

				echo "test2\n";
				
				if(isset($session)) {
					try {	
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
					}
				}
					/*try {	
						$user_profile = (new FacebookRequest(
						$session, 'GET', '/me'
						))->execute()->getGraphObject(GraphUser::className());

						$api = file_get_contents('http://graph.facebook.com/https://www.facebook.com/wefound404?fref=nf'); // On récupère la page de l'API facebook
						$likes = json_decode($api); // On décode le JSON renvoyé
						$likes = $likes->likes; // On récupère la valeur de "likes"
						$likes = (string)$likes; // On en fait une chaîne de caractères
						echo $likes; // On l'affiche
					} 
					catch(FacebookRequestException $e) {
					} 
				}

				echo "test3\n";*/
				/*if($session){
					$user_profile = (new FacebookRequest(
					$session, 'GET', '/me'
					))->execute()->getGraphObject(GraphUser::className());
					echo "certaines info de la page wefound404 peuvent vous intéressez !";
					$request_event =(new FacebookRequest($session), 'GET', '747936718583560/likes');
					$response = $request->execute();
					$graphObject = $response->getGraphObject()->asArray();

					foreach ($graphObject['data'] as $key) {
						echo "Message de " .$key->from->name."</strong> : ".$key->message. "<br>";
						echo "Le " .$key->created_time. "<br><br>";
					}
				}*/

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
