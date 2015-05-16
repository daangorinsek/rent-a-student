<?php

  include("fb_login.php");

  if (!empty($_POST['fb_signup'])) {
    Redirect::to('fb_login.php');
  }
?>
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

  <script type="text/javascript" src="js/instafeed.min.js"></script> 
  <script type="text/javascript">
    var feed = new Instafeed({
      get: 'tagged',
      tagName: 'weAreImd',
      clientId: 'de691c9528ec484ea7360fa73c38b189',
      template: '<figure><a href="{{link}}" target="_blank"><img src="{{image}}"/><figcaption>{{caption}}</figcaption></a></figure>',
      //blocked the user imtoofabluv that uses the same hashtag but is not relevant
      filter: function(image) {
        var blockedUsernames = ['imtoofabluv'];
          for (var i=0; i<blockedUsernames.length; i++) {
            if (image.user.username === blockedUsernames[i]) {
              return false;
            }
          }
        return true;
      }
    });
    feed.run();
  </script>

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="#">Rent a Student</a>
    </div>
  </nav>

  <div class="jumbotron">
    <div class="container">
      <h1>WeAreIMD</h1>
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
      <form id="subscribe-form" action="subscribe.php" method="post">
        <div class="input-group input-group-lg">
          <input type="text" class="form-control" name="mail" placeholder="your email address">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">Subscribe</button>
          </span>
        </div>
      </form>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Bezoekers</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <?php echo '<a href='.$helper->getLoginUrl().' class="btn btn-primary">Signup/Login with facebook</a>'; ?>
      </div>
      <div class="col-md-6">
        <h2>IMDers</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-primary" href="register.php" role="button">Sign Up</a>
        <a href="login.php" class="btn btn-success navbar-btn">Log In</a></p>
      </div>
    </div>
    <hr>
  </div> <!-- /container -->

  <div class="container">
    <div class="row">
      <div id="instafeed"></div>
    </div>
  </div> <!-- /container -->


<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>