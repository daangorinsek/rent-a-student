<?php

require_once 'core/init.php';

$visitor = new Visitor();
if(!isset($_SESSION['visitor'])) {
    Redirect::to('index.php');
}

$id = $_SESSION['visitor'];
$visitor = Db::getInstance()->query("SELECT * FROM visitors WHERE fb_id = '$id'");
if (!$visitor->count()) {
    echo 'n';
} else {
    foreach ($visitor->results() as $visitor) {
        //
    }
}


if (!empty($_POST['mail'])) {
    $validate = new Validate();
    $validation = $validate -> check($_POST, array(
        'mail' => array(
            'unique' => 'visitors'
        )
    ));
    if ($validation->passed()) {
        try {
            $email = Input::get('mail');
            $visitor = Db::getInstance()->query("UPDATE visitors SET mail = '$email' WHERE fb_id = '$id';");
            Redirect::to('visitor_profile.php');
        } catch(Exception $e) {
            $err = $e->getMessage();
        }
    } else {
        foreach ($validation->errors() as $error) {
            echo $error . '<br />';
        }
    }
}

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>

    <title>Change password</title>

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
                <li><a href="student_page.php">Find a student</a></li>
                <li><a href="visitor_profile.php">My Profile</a></li>
                <li><a class="btn btn-danger pull-right" href="logout.php">Logout</a></li>
            </ul>   
        </div>
    </nav>

    <div class="container">    
        <div id="box" style="margin-top:70px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >

                <div class="panel-heading">
                    <div class="panel-title">Change password</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="alert" class="alert alert-danger col-sm-12"></div>

                    <form class="form-horizontal" role="form" action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="text" class="form-control" name="mail" value="">                                        
                        </div>
                        <input type="submit" id="btn-signup" class="btn btn-success" value="Change"/>

                    </form>     

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
