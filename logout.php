<?php

require_once 'core/init.php';

$user = new User();
if($user->isLoggedIn()) {
	$user->logout();
} else if(isset($_SESSION['visitor'])) {
	session_destroy();
}


Redirect::to('index.php');