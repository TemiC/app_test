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

            $query = ('INSERT INTO user (id,fname,lname,mail,genre) VALUES ("'.$id.'","'.$fname.'","'.$lname.'","'.$mail.'","'.$gender.'");');
            $result = $base->exec($query);

            $request_photos = new FacebookRequest(
					  $session,
					  'GET',
					  '/me/photos/uploaded'
					);
					$response_photos = $request_photos->execute();
					$graphObject_photos = $response_photos->getGraphObject()->asArray();

					foreach ($graphObject_photos["data"] as $image) {
						echo "<img width='300px' src='".$image->images[0]->source."'>";
					}
					
				}catch(FacebookRequestException $e)
				{
					echo "Erreur ". $e->getMessage();
					//On supprime la variable de session au cas ou
					session_destroy();
				}
	else {
		$loginUrl = $helper->getLoginUrl($permission);
		echo '<a href="'.$loginUrl.'">Click here to !!</a>';
	}
?>
