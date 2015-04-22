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
				
				<h1>YOUR SCORE </h1>
					<div id="score">
						<br>
						500/500	
					</div>
					<br><br>
					<div id="replay">
					<?php echo '<a href="http://hidden-retreat-3686.herokuapp.com/quiz.php">REPLAY</a>'; ?>
					</div>
					<div id="save">
						SAVE ME 
					</div>
			<br><br><br><br><br><br><br><br><br><br>



			<?php 
				function getCountLikeFacebook($page){
					$page = "https://www.facebook.com/wefound404?fref=nf";
				    $url = "https://api.facebook.com/method/links.getStats?urls=".urlencode($page)."&format=json";
				    $data = json_decode(file_get_contents($url));
				 
				    if(!isset($data[0]->like_count)){ return 'erreur'; }
				 
				    return $data[0]->like_count;
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


		 // recupération des commentaires d'un article 




		</div>
			</body>
</html>
