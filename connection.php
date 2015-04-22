<?php

	require_once("session.php"); 
	
	if($session){
		try{
			$_SESSION['fb_token'] =(string) $session->getAccessToken();
			$request = new FacebookRequest($session, 'GET', '/me');
			$response = $request->execute();
			$user_profile = $response->getGraphObject("Facebook\GraphUser");

			$request = new FacebookRequest(
			  $session,
			  'GET',
			  '/me'
			);
			$response = $request->execute();
			$graphObject = $response->getGraphObject()->asArray();

            $id = $user_profile->getId();
            $fname = $user_profile->getfirstName();
            $lname = $user_profile->getlastName();
            $email = $user_profile->getProperty('mail');
            $gender = $user_profile->getProperty('gender'); 

            
		}
		catch(FacebookRequestException $e){
			echo "Erreur ". $e->getMessage();
			//On supprime la variable de session au cas ou
			session_destroy();
		}
		
	else {
		$url = $helper->getLoginUrl(['email','user_photos']);
		echo "Veuillez vous connecter en <a href='".$url."'>cliquant ici</a>";
	}
?>
