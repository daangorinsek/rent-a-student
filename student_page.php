<?php 

require_once 'core/init.php';

$user = new User();
$user = Db::getInstance()->query("SELECT * FROM users");





?><!DOCTYPE html>
<html lang="en">
<head>

	<title>Student Page</title>
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

<div class="modal" id="myInfo" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $name; ?></h4>
      </div>
      <div class="modal-body">
      
      <ul class="list-group text-center">
      <li class="list-group-item"><?php echo "<img  class='img-circle' src=\"" . $profile_pic . "\" />"; ?></li>
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Firstname</strong></span> <?php echo $firstname; ?> </li>
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Lastname</strong></span><?php echo $lastname; ?></li>
						<li class="list-group-item text-right"><span class="pull-left"><strong class="">Gender</strong></span> <?php echo $gender; ?></li>
						</ul>
      </div>
      
    </div>
  </div>
</div                
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<a class="navbar-brand" href="#">Rent a Student</a>



			 <ul class=" nav navbar-right">

                  
                  
                 <li><a href="#" data-target="#myInfo" data-toggle="modal" ><?php echo $name; ?></a></li>
                 </ul>
            
                       
                   
               

		</div>
	</nav>

	<div class="jumbotron_booking text-center">
		<div class="container">
			<h1>WeAreIMD</h1>
			<p>Selecteer hier een student</p>

		</div>
	</div>

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
					<div class='caption'>
					<p><a class='btn btn-primary' href='#' role='button'>Boek een rondleiding</a>



					</div>
				</div>";

			}
		} 
		?>

		
			
				


			



		

		
		


	</div>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    

</body>
</html>
