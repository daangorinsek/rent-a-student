<?php 




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
		
					<div class="panel panel-default">
					
						<div class="panel-heading"><strong class=""><?php echo "$name"; ?></strong></div>
						<ul class="list-group">
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Firstname</strong></span> <?php echo "$firstname"; ?> </li>
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Lastname</strong></span><?php echo "$lastname"; ?></li>

							<li class="list-group-item text-right"><span class="pull-left"><strong class="">Gender</strong></span> <?php echo "$gender"; ?></li>
						</ul>
					</div>
					

				</div>


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
