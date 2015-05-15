<?php

	require_once 'core/init.php';

	$user = new User();
	
	if(!$user->hasPermission('admin')) {
		Redirect::to('index.php');
	}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="keywords" content=""/>
	<meta name="author" content=""/>

	<title>Profile Page</title>

	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<a class="navbar-brand" href="index.php">Rent a Student</a>
			<ul class="nav nav-pills pull-right" style="margin-top: 5px;">
				<?php if(isset($_SESSION['visitor'])) { ?>
				<li><a href="student_page.php">Find a student</a></li>
				<li><a href="visitor_profile.php">My Profile</a></li>
				<?php } else if($user->isLoggedIn()) { ?>
				<li><a href="student_page.php">Other Students</a></li>
				<li><a href="student_profile.php">My Profile</a></li>
				<?php } ?>
				<?php if($user->hasPermission('admin')) { ?>
				<li><a href="admin_panel.php">Admin</a></li>
				<?php } ?>
				<li><a class="btn btn-danger" href="logout.php">Logout</a></li>
			</ul>   	
		</div>
	</nav>


	<div class="container" style="margin-top: 50px; max-width: 960px;">

		

	</div>



	<!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>
</html>