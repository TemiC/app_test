
<?php


require("session.php"); 

if(isset($session)) {
			/*echo "test1";
			$user_profile = (new FacebookRequest(
			$session, 'GET', '/me'
			))->execute()->getGraphObject(GraphUser::className());*/


		
		$_SESSION['fb_token'] = (string) $session->getAccessToken();
		$user_profile = (new \Facebook\FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(Facebook\GraphUser::className());  //get user informations 
		$lname = $user_profile->getlastName();
		//echo "$name";
		//exit(0);
		$fname = $user_profile->getfirstName();
		$mail = $user_profile->getProperty('email');
		$genre = $user_profile->getProperty('gendre');
		$id_fb = $user_profile->getProperty('id');
		
		echo "test";

		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		$_SESSION['email'] = $mail;
		$_SESSION['genre'] = $genre;
		$_SESSION['id_fb'] = $id_fb;
	
		
}

?>