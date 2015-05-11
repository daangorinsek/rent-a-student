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
<?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <?php echo $error; ?>                    
        </div>
    <?php endif; ?>

    <?php if(isset($succes)): ?>
        <div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            <?php echo $succes; ?>
        </div>
    <?php endif; ?>


			<form action="" method="post" role="form">
				<div class="col-md-6">
					
					<div class="input-group pull-left">
						<a href="#">
							<img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" class="img-responsive img-circle" alt="profilepicture" >
						</a>
					</div>
					<div class="input-group form-control">
						<input type="file">
					</div>



					<div class="form-group">
						<label for="about" class="sr-only"> About Me</label>
						<textarea class="form-control" name="about" rows="5" placeholder=" About me"></textarea>

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
								<label for="firstname" class="sr-only"> First Name</label>
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input class="form-control" type="text" id="edit-firstname" name="firstname" placeholder="Firstname" value="">
							</div>
							<div class="input-group">
								<label for="lastname" class="sr-only"> Name</label>
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input class="form-control" type="text" id="edit-lastname" name="lastname" placeholder="Lastname" value="">
							</div>
							<div class="input-group">
								<label for="lastname" class="sr-only"> City</label>
								<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
								<input class="form-control" type="text" id="edit-city" name="city" placeholder="City" value="">
							</div>
						<div class="input-group">
							<label for="email" class="sr-only">Emailadress</label>
	                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	                            <input type="text" class="form-control" id="edit-email" name="email" value="" placeholder="Email">                                        
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
					</div>


				</div>

				
					<div class="form-group col-md-12 text-center">
                        <button type="submit" id="btn-edit" class="btn btn-success">Save Changes</button>
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
