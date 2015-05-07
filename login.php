<?php

require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate -> check($_POST, array(
            'username' => array('required' => TRUE),
            'password' => array('required' => TRUE,)
        ));

        if ($validation -> passed()) {
            $user = new User();
            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if($login) {
                Redirect::to('profile_page.php');
            } else {
                echo 'Login failed';
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error . '<br />';
            }
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

    <title>Untitled</title>

    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

       <div class="container">    
        <div id="box" style="margin-top:70px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >

                <div class="panel-heading">
                    <div class="panel-title">Log In</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="signin-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="signinform" class="form-horizontal" role="form" action="" method="post">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="signin-username" type="text" class="form-control" name="username" value="" placeholder="school email">                                        
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="signin-password" type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div class="input-group">
                            <div class="checkbox">
                                <label for="remember">
                                    <input id="remember" type="checkbox" name="remember"> Remember me
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
                        <input type="submit" id="btn-signin" class="btn btn-success pull-left loginform" value="Log In"/>
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