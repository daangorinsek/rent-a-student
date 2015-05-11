<?php

require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()) {
	Redirect::to('profile_page.php');
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>

<<<<<<< HEAD
<form action="" method="post">
	<input name="name" type="text" value="<?php echo escape($user->data()->name); ?>">
	<input type="submit" value="Update">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>

  <p>Hello <a href=""><?php echo escape($user->data()->name); ?></a>!</p>

  <a href="logout.php">Log out</a>
  <a href="update.php">Update info</a>
=======
    <title>Untitled</title>

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
		 <div class="container-fluid">
		 	<a class="navbar-brand" href="#">Rent a Student</a>
		 	<ul class="">  
				<li><a class="btn btn-success pull-right" href="update.php">Update info</a></li>
				<li><a class="btn btn-danger pull-right" href="logout.php">Log out</a></li>
          </ul>
		</div>
	</nav>
>>>>>>> 6497cf28e4a4c5198e57fa7af2d80f1776753111
  
  <div class="container">    
        <div id="box" style="margin-top:70px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >

                <div class="panel-heading">
                    <div class="panel-title">User Settings</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="alert" class="alert alert-danger col-sm-12"></div>

                    <form id="signupform" class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                        <img src="<?php echo $user->data()->photo_url; ?>" />
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-upload"></i></span>
                            <input id="photo" type="file" class="form-control" name="photo">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="username" type="text" class="form-control" name="username" value="<?php echo escape($user->data()->username); ?>">                                     
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo escape($user->data()->name); ?>">
                        </div>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                        <input type="submit" id="btn-signup" class="btn btn-success" value="Update"/>
                    </form>     

                </div>                     
            </div>  
<<<<<<< HEAD
        </div>
=======
        </div>

    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</body>
</html>
>>>>>>> 6497cf28e4a4c5198e57fa7af2d80f1776753111
