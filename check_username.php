<?php

	require_once 'core/init.php';


if(isset($_POST["username"]))
{
	//check if its ajax request, exit script if its not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	}
	
	//try connect to db
	$connecDB = Db::getInstance2();
	
	//trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 
	
	//sanitize username
	$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

	//check username in db
	$results = $connecDB->prepare("SELECT * FROM users WHERE username='$username'");

	$results->execute();
	//$results = mysqli_query($connecDB,"SELECT user_id FROM tbl_users WHERE username='$username'");
	
	//return total count
	$results = $connecDB->prepare("SELECT FOUND_ROWS()"); 
	$results->execute();
	$row_count =$results->fetchColumn();
	//$username_exist = mysqli_num_rows($results); //total records
	//if value is more than 0, username is not available
	if($row_count) {
		die('<img src="images/not-available.png" />');
	}else{
		die('<img src="images/available.png" />');
	}
	
	//close db connection
	mysqli_close($connecDB);
}
?>

