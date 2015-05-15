<?php

	require_once 'core/init.php';

	$user = new User();
	
	if(!$user->hasPermission('admin')) {
		Redirect::to('index.php');
	}

	if (!empty($_POST['add_admin'])) {
		$id = $_POST['add_admin'];
        try {
        	$user = Db::getInstance()->query("UPDATE `studentapp`.`users` SET `group` = '2' WHERE `users`.`id` = $id;");
            Redirect::to('admin_panel.php');
        } catch(Exception $e) {
            $err = $e->getMessage();
           // echo 'err';
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
				<li><a href="student_page.php">Students</a></li>
				<li><a href="student_profile.php">My Profile</a></li>
				<?php if($user->hasPermission('admin')) { ?>
				<li><a href="admin_panel.php">Admin</a></li>
				<?php } ?>
				<li><a class="btn btn-danger" href="admin_panel.php">Back</a></li>
			</ul>   	
		</div>
	</nav>

	<div class="container">    
        <div id="box" style="margin-top:70px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading"><div class="panel-title">Admin Panel</div></div>     
                <div style="padding-top:30px" class="panel-body" >

                	<?php $user = Db::getInstance()->query("SELECT * FROM `users` WHERE `group` = '1'"); ?>

					<?php foreach ($user->results() as $user) { ?>
						<div class='col-lg-3 col-md-4 col-xs-6 text-center thumbnail'>
							<h4 ><?php echo $user->name; ?></h4>
							<img class='img-responsive' src="<?php echo $user->photo_url; ?>" style="margin-bottom: 10px;">
							<form action="" method="post">
								<button type="submit" class='btn btn-success' name="add_admin" value="<?php echo $user->id; ?>"/>Add admin</button>
							</form>
						</div>
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