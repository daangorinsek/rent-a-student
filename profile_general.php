<?php

require_once 'core/init.php';
/*
if(!$user->isLoggedIn()) {
	Redirect::to('login.php');
}
*/

if (isset($_GET['profile_id'])) {
	$id = $_GET['profile_id'];
	$user = Db::getInstance()->get('users', array('id', '=', $id));
	foreach ($user->results() as $user) {
	}
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
	            <li><a href="student_page.php">Find a student</a></li>
	            <li><a href="profile.php">Profile</a></li>
	            <li><a class="btn btn-danger pull-right" href="student_page.php">Back</a></li>
          	</ul>	
		</div>
	</nav>

	<div class="container" style="margin-top: 50px; max-width: 960px;">

		<form action="" method="post" role="form" >

			<img id="profile-pic" class="pull-left" src="<?php echo $user->photo_url; ?>" />

			<textarea id="aboutme" class="form-control" name="about" rows="5" disabled><?php echo $user->description; ?></textarea>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input class="form-control" id="name" type="text" name="name" value="<?php echo $user->name; ?>" disabled>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="text" class="form-control" name="email" value="<?php echo $user->username; ?>" disabled>                                        
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input class="form-control" name="branch" type="text"  value="<?php echo $user->branch; ?>" disabled>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
				<input class="form-control" name="grade" type="text"  value="<?php echo $user->grade; ?>" disabled>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				<input class="form-control" name="date" type="text"  value="<?php echo $user->date; ?>" disabled>
			</div>
			<?php
				$user = new User();
				if($user->hasPermission('admin')) { 
			?>
			<form action="admin_update.php" method="post">
					<button type="submit" class='btn btn-success' name="user_id" value="<?php echo $_GET['profile_id']; ?>"/>Update informatie</button>
			</form>
			<?php } ?>

					
				<?php $feedback = new Feedback();
				$feedback = Db::getInstance()->query("SELECT * FROM feedbacks");

				foreach ($feedback->results() as $feedback) { ?>

			
				<li><?php echo $feedback->message; ?></li>
				<?php } ?>


			<?php if(isset($_SESSION['visitor'])) { ?>
				<form action="" method="post">

					<textarea id="message" class="form-control" name="message" rows="5"></textarea>
					<button type="submit" class='btn btn-success' name="user_id" value="<?php echo $user->id; ?>"/>Post</button>
				</form>
			<?php } ?>

		</form>

	</div>

	<!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>
</html>