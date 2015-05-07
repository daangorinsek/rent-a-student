<?php

	require_once 'core/init.php';

	//$user = new User();

	$user = Db::getInstance()->query("SELECT * FROM users");

	if(!$user->count()) {
		echo 'nothing';
	} else {
		foreach ($user->results() as $user) {
			echo $user->name;
		}
	}


?>