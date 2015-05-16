<?php
require_once 'core/init.php';

$subscriber = new Subscriber();
if (!empty($_POST['mail'])) {
    $validate = new Validate();
    $validation = $validate -> check($_POST, array(
        'mail' => array(
            'unique' => 'subscribers'
        )
    ));
    if ($validation->passed()) {
        try {
            $subscriber->create(array(
                    'mail' => Input::get('mail')
                ));
            echo 'ok';
            Redirect::to('index.php');
        } catch(Exception $e) {
            $err = $e->getMessage();
            Redirect::to('index.php');
        }
    } else {
        foreach ($validation->errors() as $error) {
            echo $error . '<br />';

        }
        Redirect::to('index.php');
    }
}
?>