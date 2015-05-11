<?php 

      require_once('fb_login.php');



?><!DOCTYPE html>
<html lang="en">
<head>

	<title>Edit Profile</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../assets/ico/favicon.ico">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">


<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>


	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<a class="navbar-brand" href="#">Rent a Student</a>

		</div>
	</nav>


	<div class="container">


		<br />


		<form action="" method="post" role="form">
<<<<<<< HEAD
			
			<div class="row">
			<div class="col-md-offset-3 col-md-6">
			
					
=======
			<div class="row">
			<div class="col-md-3">

				<div class="input-group">
					<a href="#">
					<?php echo "<img src=\"" . $profile_pic . "\" />"; ?>
					</a>
				</div>

				

			</div>
			</div>
			<div class="row">
			<div class="col-md-3">
				<div class="form-group">
		
>>>>>>> 6497cf28e4a4c5198e57fa7af2d80f1776753111
					<div class="panel panel-default">
					
						<div class="panel-heading"><strong class=""> Welkom <?php echo $name; ?> </strong></div>
						<ul class="list-group">
<<<<<<< HEAD
						<li class="list-group-item"><?php echo "<img class='img-circle' src=\"" . $profile_pic . "\" />"; ?></li>
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Firstname</strong></span> <?php echo $firstname; ?> </li>
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Lastname</strong></span><?php echo $lastname; ?></li>
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Gender</strong></span> <?php echo $gender; ?></li>
=======
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Firstname</strong></span> <?php echo "$firstname"; ?> </li>
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Lastname</strong></span><?php echo "$lastname"; ?></li>

							<li class="list-group-item text-right"><span class="pull-left"><strong class="">Gender</strong></span> <?php echo "$gender"; ?></li>
>>>>>>> 6497cf28e4a4c5198e57fa7af2d80f1776753111
						</ul>
					
					

				</div>

							<p><a class='btn btn-primary' href='student_page.php' role='button'>Boek een rondleiding</a>

			</div>
			</div>


			


		</form>


		


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-tab.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    

</body>
</html>
