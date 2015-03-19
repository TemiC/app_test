<?php

	include('session.php'); 
	
	if(isset($session)) {
		try {	
			$user_profile = (new FacebookRequest(
			$session, 'GET', '/me'
			))->execute()->getGraphObject(GraphUser::className());
		} 
		catch(FacebookRequestException $e) {
		} 
	}
	else {
		$loginUrl = $helper->getLoginUrl($permission);
		echo '<a href="'.$loginUrl.'">Click here to !!</a>';
	}
?>
