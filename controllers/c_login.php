<?php
if(isConnected()) {
	header('Location: '.WEBROOT.'me');
	exit;
}

$error = array();

if(isset($_COOKIE['login'])){
	list($username,$password) = explode(':', $_COOKIE['login']);
	$isValid = isValid($username, $password);
	if($isValid != -1) {
		if($isValid['banned']) {
			session_destroy();
			setcookie('login', NULL, -1);
		}
		else Login($isValid);
	} else { $error[] = 'incorrect_username_or_password'; }
}
if(isset($_POST['login'])) {
	if(!isset($_POST['username']) || empty($_POST['username'])) $error[] = 'no_username';
	elseif(!preg_match($regex_username, $_POST['username'])) $error[] = 'incorrect_username';

	if(!isset($_POST['password']) || empty($_POST['password'])) $error[] = 'no_password';


	if(empty($error)) {
		$password = hash('sha256', $_POST['password']);
		$isValid = isValid($_POST['username'], $password);
		if($isValid != -1) {
			if($isValid['banned'] == 1) $error[] = 'banned';
			else Login($isValid);
		} else { $error[] = 'incorrect_username_or_password'; }
	}
	

	$login_error = getErrMsgs($error);
}

elseif(isset($_POST['register'])) {
	if(!isset($_POST['username']) || empty($_POST['username'])) $error[] = 'no_username';
	elseif(!preg_match($regex_username, $_POST['username']))  $error[] = 'incorrect_username';

	if(!isset($_POST['email']) || empty($_POST['email'])) $error[] = 'no_email';
	elseif(!preg_match($regex_email, $_POST['email']))  $error[] = 'incorrect_email';

	if(!isset($_POST['password']) || empty($_POST['password']))  $error[] = 'no_password';
	elseif(!isset($_POST['confirm_password']) || empty($_POST['confirm_password'])) $error[] = 'no_confirm_password';
	elseif($_POST['password'] != $_POST['confirm_password'])  $error[] = 'password_match';
	elseif(!preg_match($regex_password, $_POST['password']))  $error[] = 'incorrect_password';


	if(empty($error)) {
		if(!isUserNameAlreadyRegistered($_POST['username'])) {
			if(!isEmailAlreadyRegistered($_POST['email'])) {
				$password = hash('sha256', $_POST['password']);

				AddUser($_POST['username'], $_POST['email'], $password);
				$isValid = $isValid = isValid($_POST['username'], $password);
				Login($isValid);
			} else { $error[] = 'email_already_registered'; }
		} else { $error[] = 'username_already_registered'; }
	}

	$register_error = getErrMsgs($error);
}
?>