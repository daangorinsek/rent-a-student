<?php

require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()) {
	Redirect::to('login.php');
}

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate -> check($_POST, array(
            'photo' => array(
            ),
            'name' => array(
                'required' => TRUE,
                'min' => 2,
                'max' => 50
            ),
            'description' => array(
            ),
            'branch' => array(
                'required' => TRUE,
            ),
            'grade' => array(
                'required' => TRUE,
            ),
            'date' => array(
            )
        ));

        if ($validation->passed()) {
            try {
                $user->update(array(
                    'photo_url' => Input::get('photo'),
                    'name' => Input::get('name'),
                    'description' => Input::get('description'), 
                    'branch' => Input::get('branch'),
                    'grade' => Input::get('grade'),
                    'date' => Input::get('date')
                ));
                Redirect::to('student_profile.php');
            } catch(Exception $e) {
                die($e->getMessage());
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

    <title>User Settings</title>

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
                <li><a href="student_profile.php">Profile</a></li>
                <li><a class="btn btn-danger pull-right" href="logout.php">Logout</a></li>
            </ul>   
        </div>
    </nav>

    <div class="container">    
        <div id="box" style="margin-top:70px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >

                <div class="panel-heading">
                    <div class="panel-title">User Settings</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="alert" class="alert alert-danger col-sm-12"></div>

                    <form id="" class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                        
                        <img id="profile-pic" src="<?php echo $user->data()->photo_url; ?>"/>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-upload"></i></span>
                            <input id="photo" type="file" class="form-control" name="photo">
                        </div>
                        <textarea id="description" class="form-control" name="description" rows="5"><?php echo escape($user->data()->description); ?></textarea>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="username" type="text" class="form-control" name="username" value="<?php echo escape($user->data()->username); ?>" disabled>                                     
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo escape($user->data()->name); ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <select name="branch" class="form-control">
                                <option value="<?php echo escape($user->data()->branch); ?>"><?php echo escape($user->data()->branch); ?></option>
                                <?php if($user->data()->branch === "Design") { ?>
                                    <option value="Developement">Development</option>
                                <?php } else { ?>
                                    <option value="Design">Design</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <select name="grade" class="form-control">
                                <option value="<?php echo escape($user->data()->grade); ?>"><?php echo escape($user->data()->grade); ?></option>
                                <?php if($user->data()->grade ==="1ste jaar") { ?>
                                    <option value="2de jaar">2de jaar</option>
                                    <option value="3de jaar">3de jaar</option>
                                <?php } else if($user->data()->grade ==="2de jaar") { ?>
                                    <option value="1ste jaar">1ste jaar</option>
                                    <option value="3de jaar">3de jaar</option>
                                <?php } else { ?>
                                    <option value="1ste jaar">1ste jaar</option>
                                    <option value="2de jaar">2de jaar</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <select name="date" class="form-control">
                                <option value="<?php echo escape($user->data()->date); ?>"><?php echo escape($user->data()->date); ?></option>
                                <?php if($user->data()->date === "") { ?>      
                                    <option value="2015-05-15">15-05-2015</option>     
                                    <option value="2015-05-20">20-05-2015</option>      
                                    <option value="2015-05-27">27-05-2015</option>        
                                    <option value="2015-06-26">26-06-2015</option>
                                <?php } else if($user->data()->date === "2015-05-15") { ?>
                                    <option value="2015-05-20">20-05-2015</option>      
                                    <option value="2015-05-27">27-05-2015</option>        
                                    <option value="2015-06-26">26-06-2015</option>
                                <?php } else if($user->data()->date === "2015-05-20") { ?>
                                    <option value="2015-05-15">20-05-2015</option>      
                                    <option value="2015-05-27">27-05-2015</option>        
                                    <option value="2015-06-26">26-06-2015</option>
                                <?php } else if($user->data()->date === "2015-05-27") { ?>
                                    <option value="2015-05-15">20-05-2015</option>      
                                    <option value="2015-05-20">27-05-2015</option>        
                                    <option value="2015-06-26">26-06-2015</option>
                                <?php } else if($user->data()->date === "2015-06-26") { ?>
                                    <option value="2015-05-15">20-05-2015</option>      
                                    <option value="2015-05-20">27-05-2015</option>        
                                    <option value="2015-05-27">26-06-2015</option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
                        <input type="submit" id="btn-signup" class="btn btn-success" value="Update"/>

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
