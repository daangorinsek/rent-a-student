<?php
/*  FACEBOOK LOGIN BASIC - PHP SDK V4.0
 *  file            - index.php
 *  Developer       - Krishna Teja G S
 *  Website         - http://packetcode.com/apps/fblogin-basic/
 *  Date            - 27th Sept 2014
 *  license         - GNU General Public License version 2 or later
*/

/* INCLUSION OF LIBRARY FILEs*/
    require_once( 'lib/Facebook/FacebookSession.php');
    require_once( 'lib/Facebook/FacebookRequest.php' );
    require_once( 'lib/Facebook/FacebookResponse.php' );
    require_once( 'lib/Facebook/FacebookSDKException.php' );
    require_once( 'lib/Facebook/FacebookRequestException.php' );
    require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
    require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
    require_once( 'lib/Facebook/GraphObject.php' );
    require_once( 'lib/Facebook/GraphUser.php' );
    require_once( 'lib/Facebook/GraphSessionInfo.php' );
    require_once( 'lib/Facebook/Entities/AccessToken.php');
    require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
    require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
    require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

/* USE NAMESPACES */
    use Facebook\FacebookSession;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookRequest;
    use Facebook\FacebookResponse;
    use Facebook\FacebookSDKException;
    use Facebook\FacebookRequestException;
    use Facebook\FacebookAuthorizationException;
    use Facebook\GraphObject;
    use Facebook\GraphUser;
    use Facebook\GraphSessionInfo;
    use Facebook\FacebookHttpable;
    use Facebook\FacebookCurlHttpClient;
    use Facebook\FacebookCurl;

/*PROCESS*/ 
    //1.Stat Session
     session_start();
    //2.Use app id,secret and redirect url

     $app_id = '1387458658249573';
     $app_secret = '961d794e2d07a36458822e5ccc3a8c47';
     $redirect_url='http://localhost/rent-a-student/fb_login.php';
     

     //3.Initialize application, create helper object and get fb sess
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
        $name= $graph->getName();
        $firstname= $graph->getFirstname();
        $gender= $graph->getGender();
        $lastname= $graph->getLastname();
        $uid= $graph->getId();

        $profile_pic =  "http://graph.facebook.com/".$uid."/picture?width=140&height=140";

      include("visitor_profile.php");



    }else{
        //else echo login
        

        
    }



        
