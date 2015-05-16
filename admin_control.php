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

	<title>Admin control</title>

	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
		input {
			width: 100%;
		}
	</style>
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
				<li><a href="student_page.php">Students</a></li>
				<li><a href="student_profile.php">My Profile</a></li>
				<?php } ?>
				<?php if($user->hasPermission('admin')) { ?>
				<li><a href="admin_panel.php">Admin</a></li>
				<?php } ?>
				<li><a class="btn btn-danger" href="admin_panel.php">Back</a></li>
			</ul>   	
		</div>
	</nav>

	<div class="container">    
        <div class="container" style="margin-top: 50px; max-width: 960px;">                
            <div class="panel panel-info" >
                <div class="panel-heading"><div class="panel-title">Admin control</div></div>    
                <div action="" method="post" style="padding-top:30px" class="panel-body" >
 					<table class="table table-condensed" style="text-align: left;">
				    	<thead style="font-weight: bold;">
				    		<colgroup>
					    		<col width="25">
					    		<col width="270">
					    		<col width="120">
					    		<col width="110">
					    		<col width="69">
					    		<col width="69">
					    		<col width="25">
					    	</colgroup>
					        <tr>
					          <th>#</th>
					          <th>Gebruikersnaam/Email</th>
					          <th>Naam</th>
					          <th>Richting</th>
					          <th>Jaar</th>
					          <th>Beschikbaar</th>
					          <th>Groep<th>
					        </tr>
				   		</thead>
				    	<tbody>
	                	<?php $user = Db::getInstance()->query("SELECT * FROM `users`"); ?>
	                	<?php foreach ($user->results() as $user) { ?>
	                	<tr>                	
							<td>
								<form action="admin_update.php" method="get">
									<button type="submit" class='btn-success' name="user_id" value="<?php echo $user->id; ?>"/>
										<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
									</button>
								</form>
							</td>
							<td><input value="<?php echo $user->username; ?>" disabled></td>
							<td><input value="<?php echo $user->name; ?>" disabled></td>
							<td><input value="<?php echo $user->branch; ?>" disabled></td>
							<td><input value="<?php echo $user->grade; ?>" disabled></td>
							<td><input value="<?php echo $user->date; ?>" disabled></td>
							<td><input value="<?php echo $user->group; ?>" disabled></td>
						<?php } ?>
						</tr>
						</tbody>
				    </table>
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