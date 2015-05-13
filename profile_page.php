<?php

require_once 'core/init.php';

if(Session::exists('home')) {
  echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if ($user->isLoggedIn()) { ?>

<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="keywords" content=""/>
  <meta name="author" content=""/>
  
  <title>Rent-a-Student</title>

  <link rel="stylesheet" type="text/css" href="css/reset.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css"/>

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <a href="logout.php">Log out</a>
  <a href="edit_profile.php">Update info</a>
  
  <p>Hello <a href=""><?php echo escape($user->data()->name); ?></a>!</p>
  <img src="<?php echo $user->data()->photo_url; ?>" />

  
<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>

<?php
} else {
	echo '<p>You need to <a href="login.php">log in</a> first</p>';
}