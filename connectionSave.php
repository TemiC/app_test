
<?php


require_once("session.php"); 

if(isset($session)) {

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
		$name = $user_profile->getProperty('lname');
		//echo "$name";
		//exit(0);
		$name = $user_profile->getProperty('fname');
		$mail = $user_profile->getProperty('mail');
		$genre = $user_profile->getProperty('gendre');
		$id_fb = $user_profile->getProperty('id');
		
		echo "test";
		exit(0);

		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		$_SESSION['mail'] = $mail;
		$_SESSION['genre'] = $genre;
		$_SESSION['id_fb'] = $id_fb;
}

?>