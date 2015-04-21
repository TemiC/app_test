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
		$query = 'INSERT INTO user( name, mail, genre, id_fb) VALUES('$name','$fname','$mail', '$genre','$id_fb')';
			$result = $dbhandle->exec($query);
		/*if(empty($query)){
			$query = ('INSERT INTO user( name, mail, genre, id_fb) VALUES("'.$name.'","'.$fname.'","'.$mail.'", "'.$genre.'","'.$id_fb.'")';)
			$result = $dbhandle->exec($query);
			var_dump($dbhandle);
		}*/
	}
		//$query = 'SELECT * FROM user WHERE id_fb ='$id_fb'';
	/*	$query = $dbhandle->query('SELECT * FROM user WHERE id_fb ='$id_fb'')
		//$check = pg_num_rows($check); 
		if (!$query) 
			die("Cannot execute query.");
		while ($row = $query->fetchArray()) {
			var_dump($row);
		}
		if(empty($query)){
			//$query = " INSERT INTO quizz.user( name, mail, genre, id_fb) VALUES('$name','$mail', '$genre','id_fb');"
			//pg_query($connexion," INSERT INTO quizz.user( name, mail, genre, id_fb) VALUES('$name','$mail', '$genre','id_fb');");
			$query = 'INSERT INTO user( name, mail, genre, id_fb) VALUES('$name','$mail', '$genre','$id_fb')';
			$dbhandle->exec($query);
			var_dump($dbhandle);
		}
		else{
			//$query = "UPDATE quizz.user SET name='$name', mail='$mail', genre='$genre' WHERE  id_fb ='$id_fb'"
			//pg_query($connexion,"UPDATE quizz.user SET name='$name', mail='$mail', genre='$genre' WHERE  id_fb ='$id_fb'");
			$query = 'UPDATE user SET name='$name', mail='$mail', genre='$genre' WHERE  id_fb ='$id_fb''
			$dbhandle->exec($query);
		}
	  }*/
	}
	else {
		$loginUrl = $helper->getLoginUrl($permission);
		echo '<a href="'.$loginUrl.'">Click here to !!</a>';
	}
?>
