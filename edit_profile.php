<?php
require_once 'core/init.php';

$user = new User();
if ($user->isLoggedIn()) { 
if (Input::exists()) {
    
			try {
                $user->edit(array(
                    'name' => Input::get('name')

                ));
                
            } catch(Exception $e) {
                $err = $e->getMessage();
            }
        } else {
        	echo "nothing";
            
        }
    
}

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
			<a href="#" class="pull-right"><?php echo escape($user->data()->name); ?></a>
			<br />
			  <a href="logout.php" class="pull-right">Log out</a>


		</div>
	</nav>


	<div class="container">


			<form action="" method="post" role="form" enctype="multipart/form-data">
				<div class="col-md-6">
					
					<div class="input-group pull-left">
						<a href="#">
  <img src="<?php echo $user->data()->photo_url; ?>" />
						</a>

					</div>
					<div class="input-group pull-left">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-upload"></i></span>
                            <input id="photo" type="file" class="form-control" name="photo">
                    </div>



					<div class="form-group">
						

						<div class="form-group col-md-4">
							<div class="radio text-left">
								<label>
									<input type="radio" id="edit-desordev" name="desordev" id="optionsRadios4" value="Design" checked>Design
								</label>
							</div>
							<div class="radio text-left">
								<label>
									<input type="radio" id="edit-desordev" name="desordev" id="optionsRadios5" value="Development">Development
								</label>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="radio">
								<label>
									<input type="radio" id="edit-grade" name="grade" id="optionsRadios1" value="1" checked>
									1ste jaar
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" id="edit-grade" name="grade" id="optionsRadios2" value="2">
									2de jaar
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" id="edit-grade" name="grade" id="optionsRadios3" value="3">
									3de jaar
								</label>
							</div>
						</div>
						
					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group">
							
							<div class="input-group">
								<label for="name" class="sr-only"> Name</label>
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input class="form-control" type="text" id="name" name="name" placeholder="Full name" value="<?php echo Input::get('name'); ?>">
							</div>
							<div class="input-group">
								<label for="lastname" class="sr-only"> City</label>
								<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
								<input class="form-control" type="text" id="edit-city" name="city" placeholder="City" value="">
							</div>
						
						<div class="input-group">
							<label for="oldpassword" class="sr-only"> New Password</label>
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" id="edit-password" name="password" type="password" placeholder="new password" value="">
						</div>
						<div class="input-group">
							<label for="newpassword" class="sr-only">Repeat New Password</label>
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" id="edit_password" name="password" type="password" placeholder="repeat password" value="">
						</div>
						<label for="about" class="sr-only"> About Me</label>
						<textarea class="form-control" name="about" rows="5" placeholder=" About me"></textarea>
					</div>


				</div>

				
					<div class="form-group col-md-12 text-center">
                        <input type="submit" id="btn-edit" class="btn btn-success" value="edit"/>
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
