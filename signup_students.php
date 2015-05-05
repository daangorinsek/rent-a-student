<?php

include_once("classes/Student.class.php");

if(!empty($_POST)) {
        try {
            $student = new Student();
            $student->Email = $_POST['email'];
            $student->Password = $_POST['password'];
            $student->Firstname = $_POST['firstname'];
            $student->Lastname = $_POST['lastname'];
            $student->City = $_POST['city'];
            $student->DesOrDev = $_POST['desordev'];
            $student->Grade = $_POST['grade'];
            $student->SignUp();
            //header('Location: login.php');
            $succes = "Thanks for signing up!";
        } catch (Exception $e) {
            $error = $e->getMessage();
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

    <title>Untitled</title>
    <link rel="shortcut icon" href=""/>

    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

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

    <div class="container">    
        <div id="box" style="margin-top:70px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >

                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="signup-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="signupform" class="form-horizontal" role="form" action="" method="post">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="signup-email" type="text" class="form-control" name="email" value="" placeholder="school email">                                        
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="signup-password" type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="signup-firstname" type="text" class="form-control" name="firstname" placeholder="firstname">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="signup-lastname" type="text" class="form-control" name="lastname" placeholder="lastname">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input id="signup-city" type="text" class="form-control" name="city" placeholder="city">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input id="signup-desordev" type="text" class="form-control" name="desordev" placeholder="design or development">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <input id="signup-grade" type="text" class="form-control" name="grade" placeholder="grade">
                        </div>
                        <button type="submit" id="btn-signup" class="btn btn-success">Sign Up</button>
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