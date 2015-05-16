<?php 
	require_once 'core/init.php';
	require_once('fb_login.php');

	$visitor = new Visitor();
	if(!isset($_SESSION['visitor'])) {
		Redirect::to('index.php');
	}

	$id = $_SESSION['visitor'];
	$visitor = Db::getInstance()->query("SELECT * FROM visitors WHERE fb_id = '$id'");
	if (!$visitor->count()) {
		echo 'n';
	} else {
		foreach ($visitor->results() as $visitor) {
			//
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

    <title>Your Profile</title>

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
				<?php if(isset($_SESSION['visitor'])) { ?>
				<li><a href="visitor_profile.php">My Profile</a></li>
				<?php } else if($user->isLoggedIn()) { ?>
				<li><a href="student_profile.php">My Profile</a></li>
				<?php } ?>
				<li><a class="btn btn-danger pull-right" href="logout.php">Logout</a></li>
			</ul>   
		</div>
	</nav>


	<div class="container" style="margin-top: 50px; max-width: 960px;">

		<form action="set_email.php" method="post" role="form" >

			<img id="profile-pic" class="" src="<?php echo $visitor->photo_url; ?>"/>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input class="form-control" id="name" type="text" name="name" value="<?php echo $visitor->name; ?>" disabled>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
				<input type="text" class="form-control" name="gender" value="<?php echo $visitor->gender; ?>" disabled>                                    
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="text" class="form-control" name="mail" value="<?php echo $visitor->mail; ?>" disabled>                                        
			</div>
			<input type="submit" id="btn-signup" class="btn btn-success" value="Set email"/>
		</form>

	</div>
	


	<!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    

</body>
</html>
