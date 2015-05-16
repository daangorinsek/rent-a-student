<?php
require_once 'core/init.php';
// we want that our php scripts sends an http status code of 500 if an exception happened
// the frontend will then call the ajaxError function defined and display an error to the user
function handleException($ex)
{
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Internal error';
}

set_exception_handler('handleException');


// we are using PDO -  easier to use as mysqli and much better than the mysql extension (which will be removed in the next versions of PHP)
try {
    $password = null;
    $db = new PDO('mysql:host=localhost;dbname=studentapp', "root", $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // note the quote thing - this prevents your script from sql injection
    $list = $_GET['date'];
    $data = $db->query("SELECT name FROM users where date LIKE '$list'");
    $results = array();
    foreach ($data as $row) {
        $results = $row['name'];
    }
    return $results;
    Redirect::to('student_page.php');
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>