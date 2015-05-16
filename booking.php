<?php
	require_once 'core/init.php';

	$visitor = new Visitor();
	if(!isset($_SESSION['visitor'])) {
		Redirect::to('index.php');
	}


	if (Input::exists()) {
		$visitorID = $_SESSION['visitor'];
		$visitor = Db::getInstance()->query("SELECT * FROM visitors WHERE fb_id = '$visitorID'");
		foreach ($visitor->results() as $visitor) {
			//
		}


	    $user = new User();
	    $userID = $_POST['user_id'];
		$user = Db::getInstance()->query("SELECT * FROM users WHERE id = '$userID'");
		foreach ($user->results() as $user) {
					//
		}
		if(empty($visitor->mail)) {
		    // Do nothing
		} else {
			try {
		    	$booking = new Booking();
		    	$booking = Db::getInstance()->query("SELECT * FROM bookings WHERE visitor_name = '$visitor->name'");
		    	if (!$booking->count()) {
		    		$booking = new Booking();
		    		$booking->create(array(
		            'student_name' => $user->name,
		            'student_mail' =>$user->username,
		            'visitor_name' => $visitor->name,
		            'visitor_mail' => $visitor->mail,
		            'date' => $user->date,
		        ));

		     

	        $to = $user->username; 
			$email_subject = "Nieuwe boeking rent-a-student door ".$visitor->name;
			$email_body = "Hey, je bent net geboekt voor een rondleiding.\n\n". $visitor->name ." heeft je net geboekt voor een rondleiding op $datum\n\n";
			$headers = "From: noreply@rent-a-student.be\n";
			$reply = "Reply to : ". $visitor->mail;
		
			$mail = mail($to,$email_subject,$email_body,$headers);
			





		    	} else {
		    		$userAlreadyBooked = "U heeft al reeds een booking gemaakt.";
		    		return $userAlreadyBooked;
		    	}
		    } catch(Exception $e) {
		        $err = $e->getMessage();
		    }
		}
	} else {
		Redirect::to('student_page.php');
	}
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
                <div class="panel-heading"><div class="panel-title">Booking</div></div>     
                <div style="padding-top:30px" class="panel-body" >
                	<?php if(empty($visitor->mail)) { ?>
                	<?php echo '<p>Registreer eerst uw email <a href="visitor_profile.php">hier</a> aub.</p>'; ?>
                	<?php } else { ?>
       				<span class="label label-success">Success</span>
       				<p>Alvast bedankt voor jou interesse, <?php echo $visitor->name; ?>!</p>
       				<p>Kies hier nog even het uur waarop je wil komen. (10:00 - 14:00)</p>
       				<form action="set_time.php" method="post">
					  Select a time:
					  <input type="time" name="time">
					  <input type="submit"class="btn btn-primary">
					</form>
       				<?php } ?>
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