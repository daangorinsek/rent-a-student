<?php

require_once 'core/init.php';


$user = new User();
/*
if(!$user->isLoggedIn()) {
	Redirect::to('login.php');
}*/
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

		<form action="" method="post" role="form" >

			<img id="profile-pic" class="pull-left" src="<?php echo $user->data()->photo_url; ?>" />

			<?php if($user->hasPermission('admin')) { ?>
			<div id="admin-tag">Admin</div>
			<?php } ?>

			<textarea id="aboutme" class="form-control" name="about" rows="5" disabled><?php echo escape($user->data()->description); ?></textarea>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input class="form-control" id="name" type="text" name="name" value="<?php echo escape($user->data()->name); ?>" disabled>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="text" class="form-control" name="email" value="<?php echo escape($user->data()->username); ?>" disabled>                                        
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input class="form-control" name="branch" type="text"  value="<?php echo escape($user->data()->branch); ?>" disabled>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
				<input class="form-control" name="grade" type="text"  value="<?php echo escape($user->data()->grade); ?>" disabled>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				<input class="form-control" name="date" type="text"  value="<?php echo escape($user->data()->date); ?>" disabled>
			</div>
			<a class="btn btn-success" href="update.php">Edit information</a>
			<a class="btn btn-primary" href="change_password.php">Change password</a>

		</form>

	</div>



	<!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>
</html>