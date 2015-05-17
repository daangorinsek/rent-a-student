<?php

require_once 'core/init.php';


$visitor = new Visitor();
	if(!isset($_SESSION['visitor'])) {
		Redirect::to('index.php');
	}

$visitorID = $_SESSION['visitor'];
	$visitor = Db::getInstance()->query("SELECT * FROM visitors WHERE fb_id = '$visitorID'");
	foreach ($visitor->results() as $visitor) {
		//
	}

$user = new User();
$userID = $_GET['profile_id'];
		$user = Db::getInstance()->query("SELECT * FROM users WHERE id = '$userID'");
	foreach ($user->results() as $user) {
		//
	}

	if (isset($_POST['add_feedback'])&&(!empty($_POST['feedback']))) {
		try {
		    	
		    	$comment = Db::getInstance()->query("SELECT * FROM comments");
		    	
		    		$comment = new Comment();
		    		$comment->create(array(
		            'student_name' => $user->name,
		           	'student_email' => $user->username,
		          	'visitor_name' => $visitor->name,
		           	'visitor_email' => $visitor->mail,
		          	'date' => date('Y-m-d H:i:s'),
		            'message' => Input::get('feedback'),
		        ));
		    	$comment = new Comment();
		    	$comment = Db::getInstance()->query("SELECT * FROM comments");
		    	foreach ($comment->results() as $comment) {
		    	}
		    		
		    	$to = $user->username;
				$subject = "U hebt een niewe bericht op uw profiel";
				$msg = "". $comment->visitor_name . " heeft net een berichtje op jouw prikbord gezet.\n\n Bericht : ". $comment->message ."\n\n Emailadres v. afzender: ". $comment->visitor_email . "";
				mail($to,$subject,$msg);
		    } catch(Exception $e) {
		        $err = $e->getMessage();
		    }
  		
    
} else{
	//
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
				<?php $user = new User(); ?>
				<?php if(isset($_SESSION['visitor'])) { ?>
				<li><a href="student_page.php">Find a student</a></li>
				<li><a href="visitor_profile.php">My Profile</a></li>
				<?php } else if($user->isLoggedIn()) { ?>
				<li><a href="student_page.php">Students</a></li>
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
	<div class="col-md-8">
		<form action="" method="post" role="form" >

			<?php
			if (isset($_GET['profile_id'])) {
				$id = $_GET['profile_id'];
				$user = Db::getInstance()->get('users', array('id', '=', $id));
				foreach ($user->results() as $user) {
				}
			}
			?>

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
		</form>
		</div>
		
		<div class="col-md-4">
		<form action="" method="post" role="form" >

		<?php if(isset($_SESSION['visitor'])) { ?>
			<div class="text-center">
			<h2>Prikbord</h2>
			<br />
			<p>Laat een berichtje achter.</p>

		<ul id="listupdates">
		<?php 
		$comment = new Comment();
		$comment = Db::getInstance()->query("SELECT * FROM comments WHERE student_name = '$user->name'");
		foreach ($comment->results() as $comment) { 
		echo '<li><div class="alert alert-info">' . $comment->message . '</div></li><hr>';

		
		 
		 } ?>
		 </ul>
			<textarea id="feedback" class="form-control" name="feedback" rows="5"></textarea>
			<br />
			<button type="submit" class='btn btn-success' id="add_feedback" name="add_feedback" value="<?php echo $user->id; ?>"/>Sturen</button>
			
			<?php } ?>
			</div>

		</form>
		</div>
		
	</div>

	<!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>
</html>