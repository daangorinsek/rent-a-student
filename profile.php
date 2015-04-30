<!DOCTYPE html>
<html lang="en">
<head>

	<title>Profile</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../assets/ico/favicon.ico">

	<link href="css/bootstrap.min.css" rel="stylesheet">


<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
	<div id="logo"><img src="images/logoex.svg" alt=""></div>


	<div class="container">


		<div class="row">



			<br />
			<form action="" method="post" role="form">
				<legend>Profile</legend>
				<div class="col-md-4">
					<div class="text-center">
						<a href="#">
							<img src="http://placehold.it/360x268" class="img-responsive img-thumbnail" alt="profilepicture" >
						</a>


						<input type="file" class="form-control">
					</div>

				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="firstname"> First Name</label>
						<input class="form-control" type="text" placeholder="" value="">
						<label for="lastname"> Name</label>

						<input class="form-control" type="text" placeholder="" value="">
						<label for="lastname"> City</label>

						<input class="form-control" type="text" placeholder="" value="">


						<label for="email">Emailadress</label>
						<input class="form-control" name="email" type="text" value="extras@gmail.com">
					</div>
				</div>
				<div class="col-md-4">

					<div class="form-group">
						<label for="about"> About Me</label>
						<textarea class="form-control" name="about" rows="5" placeholder=""></textarea>

						<div class="form-group col-md-4">
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
									Design
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									Development
								</label>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
									1ste jaar
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									2de jaar
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									3de jaar
								</label>
							</div>
						</div>
						
					</div>

				</div>

				<div class="row">













					<div class="col-md-4">
						<div class="form-group">
							<label for="oldpassword"> New Password</label>
							<input class="form-control" name="oldpassword" type="password" value="11111122333">
						</div>
						<div class="form-group">
							<label for="newpassword">Reapet New Password</label>
							<input class="form-control" name="newpassword"type="password" value="11111122333">
						</div>



					</div>


				</div>
				<hr>

				<div class="row">
					<div class="form-group col-md-offset-4 col-md-2">
						<input type="button" class="btn btn-default" value="Save Changes">
					</div>
					<div class="form-group col-md-2">
						<input type="reset" class="btn btn-default" value="Cancel">
					</div>
				</div> 
			</form>

		</div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-tab.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    

</body>
</html>
