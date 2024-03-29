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
	$user = Db::getInstance()->query("SELECT * FROM users");
	foreach ($user->results() as $user) {
		//
	}

	$booking = new Booking();
	$booking = Db::getInstance()->query("SELECT * FROM bookings");
	foreach ($booking->results() as $booking) {
		//
	}

	$to = $visitor->mail;
	$subject = "Booking";
	$msg = 'Jou rondleiding zal plaatsvinden op '. $user->date . ' om ' . $booking->time . ' met ' . $user->name . ' als jou begeleider.';
	mail($to,$subject,$msg);

	$tostudent = $user->username;
	$subjectstudent = "Booking";
	$msgstudent = 'Je heb een rondleiding op '. $user->date . ' om ' . $booking->time . ' met ' . $visitor->name . '.';
	mail($tostudent,$subject,$msgstudent);

	
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="keywords" content=""/>
	<meta name="author" content=""/>

	<title>Booking</title>

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
				<li><a href="student_page.php">Students</a></li>
				<li><a href="visitor_profile.php">My Profile</a></li>
				<li><a class="btn btn-danger" href="student_page.php">Back</a></li>
			</ul>   	
		</div>
	</nav>

	<div class="container">    
        <div id="box" style="margin-top:70px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading"><div class="panel-title">Booking Date</div></div>     
                <div style="padding-top:30px" class="panel-body" >
       				<p>Naam: <?php echo $visitor->name; ?></p>
       				<p>Jou rondleiding zal plaatsvinden op <?php echo $user->date; ?> op <?php echo $booking->time; ?> met <?php echo $user->name; ?> als begeleider.</p>
                </div>                     
            </div>  
        </div>
    </div>


	<!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>
</html>