<?php

require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()) {
	Redirect::to('profile_page.php');
}
?>

<form action="" method="post">
	<input name="name" type="text" value="<?php echo escape($user->data()->name); ?>">
	<input type="submit" value="Update">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>