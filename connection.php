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
		
		require_once("connection_bdd.php");
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
		$check =  pg_query($connexion,"SELECT * FROM quizz.user WHERE id_fb ='$id_fb'");
		$check = pg_num_rows($check); 
		if(empty($check)){
			//$query = " INSERT INTO quizz.user( name, mail, genre, id_fb) VALUES('$name','$mail', '$genre','id_fb');"
			pg_query($connexion," INSERT INTO quizz.user( name, mail, genre, id_fb) VALUES('$name','$mail', '$genre','id_fb');");
		}
		else{
			//$query = "UPDATE quizz.user SET name='$name', mail='$mail', genre='$genre' WHERE  id_fb ='$id_fb'"
			pg_query($connexion,"UPDATE quizz.user SET name='$name', mail='$mail', genre='$genre' WHERE  id_fb ='$id_fb'");
		}
	  }
	}
	else {
		$loginUrl = $helper->getLoginUrl($permission);
		echo '<a href="'.$loginUrl.'">Click here to !!</a>';
	}
?>
