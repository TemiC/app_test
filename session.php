<?php


	require('facebook-php-sdk-v4-4.0-dev/autoload.php'); 
	session_start();
	$appId = '1560387527551071'; 
	$appSecret = 'da15602cebc359bd7b49b4ff354950f0';
	///$redirectUrl = 'http://localhost/quiz.php'; 
	$redirectUrl = 'https://hidden-retreat-3686.herokuapp.com/quiz.php';
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
	} 
	catch( FacebookRequestException $ex ) { // When Facebook returns an error
		exit("error in session 1".$ex);
	}
	catch( \Exception $ex ) { // When validation fails or other local issues
		exit("error in session 2");
	}	
?>
