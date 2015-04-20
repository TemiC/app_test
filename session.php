<?php


	require('facebook-php-sdk-v4-4.0-dev/autoload.php'); 
	session_start();
	$appId = '1560387527551071'; 
	$appSecret = 'da15602cebc359bd7b49b4ff354950f0';
	///$redirectUrl = 'http://localhost/quiz.php'; 
	$redirectUrl = 'http://hidden-retreat-3686.herokuapp.com/quiz.php';
	$permission = array('email');
	
	
	use Facebook\FacebookSession; 
	use Facebook\FacebookRequest; 
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequestException;
	use Facebook\GraphUser;


	FacebookSession::setDefaultApplication($appId, $appSecret); 
	$helper = new FacebookRedirectLoginHelper($redirectUrl); 
	
	try {
		$session = $helper->getSessionFromRedirect();
		$_SESSION["session"] = $session;
		
		require_once("MyDB.php");
		$_SESSION['fb_token'] = (string) $session->getAccessToken();
		$user_profile = (new \Facebook\FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(Facebook\GraphUser::className());  //get user informations 
		$name = $user_profile->getProperty('name');
		$fname = $user_profile->getProperty('fname');
		$mail = $user_profile->getProperty('email');
		$genre = $user_profile->getProperty('gender');
		$id_fb = $user_profile->getProperty('id');
		
		$_SESSION['name'] = $name;
		$_SESSION['fname'] = $fname;
		$_SESSION['mail'] = $mail;
		$_SESSION['genre'] = $genre;
		$_SESSION['id_fb'] = $id_fb;
		
		
	
	function ckeckUser($id_fb, $genre, $mail, $name, $fname){
		$dbhandle = new SQLite3('quizz.db');
		if (!$dbhandle){
			die ('error came');
		}
		$query = $dbhandle->query('SELECT * FROM user WHERE id_fb ="$id_fb"');
		if (!$query) 
			die("Cannot execute query.");
		while ($row = $query->fetchArray()) {
			var_dump($row);
		}
		if(empty($query)){
			$query = ('INSERT INTO user( name, mail, genre, id_fb) VALUES("'.$name.'","'.$fname.'","'.$mail.'", "'.$genre.'","'.$id_fb.'")';)
			$result = $dbhandle->exec($query);
			var_dump($dbhandle);
		}
	}
		
	} 
	catch( FacebookRequestException $ex ) { // When Facebook returns an error
	}
	catch( \Exception $ex ) { // When validation fails or other local issues
	}	
?>
