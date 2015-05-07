<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate -> check($_POST, array(
            'username' => array(
                'required' => TRUE,
                'min' => 30,
                'max' => 30,
                'unique' => 'users'
                ),
            'password' => array(
                'required' => TRUE,
                'min' => 6
                ),
            'password_again' => array(
                'required' => TRUE,
                'matches' => 'password'
                ),
            'name' => array(
                'required' => TRUE,
                'min' => 2,
                'max' => 50
                )
            ));

        if ($validation -> passed()) {
            $user = new User();
            $salt = Hash::salt(32);

            try {
                $user->create(array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'name' => Input::get('name'),
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1
                ));
                Session::flash('home', 'Sign up Successful, you can now log in!');
                Redirect::to('index.php');
            } catch(Exception $e) {
                $err = $e->getMessage();
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
                    <div class="panel-title">IMDer Sign Up</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="signup-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="signupform" class="form-horizontal" role="form" action="" method="post">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="signup-username" type="text" class="form-control" name="username" value="<?php echo Input::get('username'); ?>" placeholder="Your school email (r0xxxxxx@student.thomasmore.be)">                                     
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="signup-password" type="password" class="form-control" name="password" placeholder="Enter your password">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="signup-password_again" type="password" class="form-control" name="password_again" placeholder="Enter your password again">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="signup-name" type="text" class="form-control" name="name" value="<?php echo Input::get('name'); ?>" placeholder="Enter your name">
                        </div>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                        <input type="submit" id="btn-signup" class="btn btn-success" value="Sign Up"/>
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