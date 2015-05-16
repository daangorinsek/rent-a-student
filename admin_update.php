<?php

	require_once 'core/init.php';

	$user = new User();	
	if(!$user->hasPermission('admin')) {
		Redirect::to('index.php');
	}
	

	if (!empty($_POST)) {
		$id = $_GET['user_id'];
		$username = Input::get('username');
		$name = Input::get('name');
		$branch = Input::get('branch');
		$grade = Input::get('grade');
		$date = Input::get('date');
		$group = Input::get('group');

		//echo $id,$username, $name, $branch, $grade, $date, $group;
		$user = Db::getInstance()->query("UPDATE users SET `username` = '$username', `name` = '$name', `branch` = '$branch', `grade` = '$grade', `date` = '$date', `group` = '$group' WHERE `users`.`id` = '$id';");
		Redirect::to('admin_control.php');
		//foreach ($user->results() as $user) {}
	}
/*
	if (Input::exists()) {
        try {
        	$id = $_GET['user_id'];
        	$user = Db::getInstance()->get('users', array('id', '=', $id));
            $user->update(array(
                'username' => Input::get('username'),
                'name' => Input::get('name'),
                'branch' => Input::get('branch'),
                'grade' => Input::get('grade'),
                'date' => Input::get('date'),
                'group' => Input::get('group')
            ));
            echo 'ok';
            //Redirect::to('admin_control.php');
        } catch(Exception $e) {
            die($e->getMessage());
        }
}
*/
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
				<li><a href="student_page.php">Students</a></li>
				<li><a href="student_profile.php">My Profile</a></li>
				<li><a href="admin_panel.php">Admin</a></li>
				<li><a class="btn btn-danger" href="admin_control.php">Back</a></li>
			</ul>   	
		</div>
	</nav>

	<div class="container">    
        <div class="container" style="margin-top: 50px; max-width: 960px;">                
            <div class="panel panel-info" >
                <div class="panel-heading"><div class="panel-title">Admin control</div></div>    
                <form action="" method="post" style="padding-top:30px" class="panel-body" >
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
				    	<?php
						if (isset($_GET['user_id'])) {
							$id = $_GET['user_id'];
							$user = Db::getInstance()->get('users', array('id', '=', $id));
							foreach ($user->results() as $user) {
							}
							
						}
						?>
	                	<tr>                	
							<td style="font-weight: bold;"><?php echo $user->id; ?></td>
							<td><input name="username" value="<?php echo $user->username; ?>"></td>
							<td><input name="name" value="<?php echo $user->name; ?>"></td>
							<td><input name="branch" value="<?php echo $user->branch; ?>"></td>
							<td><input name="grade" value="<?php echo $user->grade; ?>"></td>
							<td><input name="date" value="<?php echo $user->date; ?>"></td>
							<td><input name="group" value="<?php echo $user->group; ?>"></td>
						</tr>
						</tbody>
				    </table>
                    <input type="submit" id="btn-signup" class="btn btn-success" value="Update"/>
                </form>                     
            </div>  
        </div>
    </div>


	<!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>
</html>