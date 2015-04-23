
<?php


require("session.php"); 

if(isset($session)) {
		
		$_SESSION['fb_token'] = (string) $session->getAccessToken();
		$user_profile = (new \Facebook\FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(Facebook\GraphUser::className());  //get user informations 
		$lname = $user_profile->getlastName();
		$fname = $user_profile->getfirstName();
		$mail = $user_profile->getProperty('email');
		$genre = $user_profile->getProperty('genre');
		$id_fb = $user_profile->getProperty('id');
		
		echo "test";

		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		$_SESSION['email'] = $mail;
		$_SESSION['genre'] = $genre;
		$_SESSION['id_fb'] = $id_fb;
	
		
}

?>