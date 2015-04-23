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
		$name = $user_profile->getlastName();
		//echo "$name";
		//exit(0);
		$name = $user_profile->getfirstName();
		$mail = $user_profile->getProperty('email');
		$genre = $user_profile->getProperty('gendre');
		$id_fb = $user_profile->getProperty('id');
		
		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		$_SESSION['email'] = $mail;
		$_SESSION['genre'] = $genre;
		$_SESSION['id_fb'] = $id_fb;
		
		
	
	/*function ckeckUser($id_fb, $genre, $mail, $name){
		$dbhandle = new SQLite3('quizz.db');
		if (!$dbhandle){
			die ('error came');
		}
		$query = $dbhandle->query('SELECT * FROM user WHERE id_fb ="$id_fb"');
		if (!$query) 
			die("Cannot execute this query.");
		while ($row = $query->fetchArray()) {
			if(empty($query)){
				$query = 'INSERT INTO user(name, mail, genre, id_fb) VALUES("$name","$mail", "$genre", "$id_fb")';
				$dbhandle->exec($query);
				var_dump($dbhandle);
			}
			else{
				$query = 'UPDATE user SET name ="$name", mail = "$mail", genre = "$genre", WHERE id_fb = "$id_fb"';
				$dbhandle->exec($query);
			}
		}
		sqlite_close($dbhandle);
	}*/
	}
	else {
		$loginUrl = $helper->getLoginUrl($permission);
		echo '<a href="'.$loginUrl.'">Commencez!!</a>';
	}
?>
