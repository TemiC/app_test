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
