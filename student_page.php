<?php 

require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()) {
	Redirect::to('login.php');
}

$user = Db::getInstance()->query("SELECT * FROM users");

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>

    <title>Rent a student</title>

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
				<li><a class="btn btn-danger pull-right" href="logout.php">Logout</a></li>
			</ul>   
		</div>
	</nav>            

	<div class="jumbotron_booking text-center">
		<div class="container">
			<h1>WeAreIMD</h1>
			<p>Selecteer hier een student</p>
		</div>
	</div>

	<form class="navbar-form">
		<div class="form-group" action="" method="get">
			<select name="date" class="form-control">
				<option value="">-- Kies datum --</option>     
				<option value="2015-05-15">15-05-2015</option>     
				<option value="2015-05-20">20-05-2015</option>      
				<option value="2015-05-27">27-05-2015</option>        
				<option value="2015-06-26">26-06-2015</option>
			</select>
		</div>
		<input type="submit" id="btn-signup" class="btn btn-success" value="Search"/>
	</form>

	<div class="container">
		<?php if(!$user->count()) {
			echo 'nothing';
		} else {
			foreach ($user->results() as $user) {
				$user->name;
				$user->photo_url;

				echo
				"<div class='col-lg-3 col-md-4 col-xs-6 text-center'>
				<a class='thumbnail' href='#''>
				<h4 >" .$user->name. "</h4>
				<img class='img-responsive' src=" .$user->photo_url." alt='profilepicture'>
				</a>
				<a class='btn btn-primary' href='#' role='button'>Boek een rondleiding</a>
				</div>";

			}
		} 
		?>

	</div>

    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</body>
</html>
