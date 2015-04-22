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
		$url = $helper->getLoginUrl($permission);
		echo "Veuillez vous connecter en <a href='".$url."'>cliquant ici</a>";
	}


	
	/*if(isset($session)) {
		try {	
			$user_profile = (new FacebookRequest(
			$session, 'GET', '/me'
			))->execute()->getGraphObject(GraphUser::className());
		} 
		catch(FacebookRequestException $e) {
		} 
		
		require_once("MyDB.php");
		$_SESSION['fb_token'] = (string) $session->getAccessToken();
		$user_profile = (new \Facebook\FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(Facebook\GraphUser::className());  //get user informations 
		$name = $user_profile->getProperty('name');
		$mail = $user_profile->getProperty('email');
		$genre = $user_profile->getProperty('gender');
		$id_fb = $user_profile->getProperty('id');
		
		$_SESSION['name'] = $name;
		$_SESSION['mail'] = $mail;
		$_SESSION['genre'] = $genre;
		$_SESSION['id_fb'] = $id_fb;
		
		
	
	function ckeckUser($id_fb, $genre, $mail, $name){
		$dbhandle = new SQLite3('quizz.db');
		if (!$dbhandle){
			die ('error came');
		}
		$query = $dbhandle->query('SELECT * FROM user WHERE id_fb ="$id_fb"');
		if (!$query) 
			die("Cannot execute query.");
		while ($row = $query->fetchArray()) {
			if(empty($query)){
			$query = 'INSERT INTO user( name, mail, genre, id_fb) VALUES("$name","$mail", "$genre","$id_fb")';
			$dbhandle->exec($query);
			var_dump($dbhandle);
			}
			else{
				$query = 'UPDATE user SET name ="$name", mail = "$mail", genre = "$genre", WHERE id_fb = "$id_fb"';
				$dbhandle->exec($query);
			}
		}
		
	}
	}
	else {
		$loginUrl = $helper->getLoginUrl($permission);
		echo '<a href="'.$loginUrl.'">Click here to !!</a>';
	}*/
?>
