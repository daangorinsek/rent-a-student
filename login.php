<?php

include_once("classes/User.class.php");

$user = new User();

if(!empty($_POST)) {
    try {
/*$user->Username = $_POST['username'];
$user->Password = $_POST['password'];
$user->Email = $_POST['email'];
$user->Save();
header('Location: login.php');
$succes = "Thanks for posting!";*/
} catch (Exception $e) {
    /* $error = $e->getMessage();*/
}
}



?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Log In</title>

</head>
<body>

                    <div class="container">    
                        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="panel-title">Employee Log In</div>
                                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                                </div>     

                                <div style="padding-top:30px" class="panel-body">

                                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                                    <form id="loginform" class="form-horizontal" role="form">

                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                        </div>

                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                        </div>



                                        <div class="input-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                                </label>
                                            </div>
                                        </div>


                                        <div style="margin-top:10px" class="form-group">
                                            <!-- Button -->

                                            <div class="col-sm-12 controls">
                                                <input value="Login" id="btn-login" class="btn btn-success" type="submit"/>
                                                <input value="Login with Facebook" id="btn-fblogin" href="#" class="btn btn-primary"/>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-12 control">
                                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                                    Don't have an account? 
                                                    <a href="singup.php">Sign Up Here</a>
                                                </div>
                                            </div>
                                        </div>    
                                    </form>     



                                </div>                     
                            </div>  
                        </div>
                    </div>

-
                    <div class="container">    
                        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="panel-title">Employer Log In</div>
                                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                                </div>     

                                <div style="padding-top:30px" class="panel-body">

                                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                                    <form id="loginform" class="form-horizontal" role="form">

                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                            <input id="login-btw" type="text" class="form-control" name="btw" placeholder="BTW nummer">
                                        </div>

                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                        </div>

                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                        </div>

                                        <div class="input-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                                </label>
                                            </div>
                                        </div>


                                        <div style="margin-top:10px" class="form-group">
                                            <!-- Button -->

                                            <div class="col-sm-12 controls">
                                                <input value="Login" id="btn-login" class="btn btn-success" type="submit"/>
                                                <input value="Login with Facebook" id="btn-fblogin" href="#" class="btn btn-primary"/>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-12 control">
                                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                                    Don't have an account? 
                                                    <a href="signup.php">Sign Up Here</a>
                                                </div>
                                            </div>
                                        </div>    
                                    </form>     



                                </div>                     
                            </div>  
                        </div>
                    </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-tab.js"></script>
    </body>
    </html>