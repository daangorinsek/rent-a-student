<?php
    require_once( 'lib/Facebook/FacebookSession.php');
    require_once( 'lib/Facebook/FacebookRequest.php' );
    require_once( 'lib/Facebook/FacebookResponse.php' );
    require_once( 'lib/Facebook/FacebookSDKException.php' );
    require_once( 'lib/Facebook/FacebookRequestException.php' );
    require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
    require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
    require_once( 'lib/Facebook/GraphObject.php' );
    require_once( 'lib/Facebook/GraphUser.php' );
    //require_once( 'lib/Facebook/GraphLocation.php' );
    require_once( 'lib/Facebook/GraphSessionInfo.php' );
    require_once( 'lib/Facebook/Entities/AccessToken.php');
    require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
    require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
    require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

    use Facebook\FacebookSession;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookRequest;
    use Facebook\FacebookResponse;
    use Facebook\FacebookSDKException;
    use Facebook\FacebookRequestException;
    use Facebook\FacebookAuthorizationException;
    use Facebook\GraphObject;
    use Facebook\GraphUser;
    //use Facebook\GraphLocation;
    use Facebook\GraphSessionInfo;
    use Facebook\FacebookHttpable;
    use Facebook\FacebookCurlHttpClient;
    use Facebook\FacebookCurl;

    //session_start();
    require_once 'core/init.php';

    $app_id = '1387458658249573';
    $app_secret = '961d794e2d07a36458822e5ccc3a8c47';
    $redirect_url='http://localhost/rent-a-student/fb_login.php';

    FacebookSession::setDefaultApplication($app_id,$app_secret);
    $helper = new FacebookRedirectLoginHelper($redirect_url);
    $sess = $helper->getSessionFromRedirect();

    //4. if fb sess exists echo name 
    if(isset($sess)){
            //create request object,execute and capture response
        $request = new FacebookRequest($sess, 'GET', '/me');
        // from response get graph object
        $response = $request->execute();

        $graph = $response->getGraphObject(GraphUser::className());

        // use graph object methods to get user details
        $name = $graph->getName();
        $gender = $graph->getGender();
        $uid = $graph->getId();
        $profile_pic =  "http://graph.facebook.com/".$uid."/picture?width=140&height=140";
        $visitor = Db::getInstance()->query("SELECT * FROM visitors WHERE fb_id = '$uid'");
        if (!$visitor->count()) {
            $visitor = new Visitor();
            try {
                $visitor->create(array(
                    'name' => $name,
                    'photo_url' => $profile_pic,
                    'gender' => $gender,
                    'fb_id' => $uid,
                    'group' => 2
                ));
                include("visitor_profile.php");
                $_SESSION['visitor'] = $uid;
            } catch(Exception $e) {
                $err = $e->getMessage();
            }
        } else {
            $visitor = new Visitor();
            try {
                include("visitor_profile.php");
                $_SESSION['visitor'] = $uid;
            } catch(Exception $e) {
                $err = $e->getMessage();
            }
        }

    } 
        
?>

        
