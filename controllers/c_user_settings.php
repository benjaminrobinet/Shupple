<?php
if(!isConnected()) {
	$_SESSION['redirect'] = CURRENT_PAGE;
	header('Location: '.WEBROOT.'login');
	exit;
}

$error = array();
if(isset($_POST['update'])){
	if(!isset($_POST['username']) || empty($_POST['username'])) $error[] = 'no_username';
	elseif(!preg_match($regex_username, $_POST['username']))  $error[] = 'incorrect_username';

	if(!isset($_POST['email']) || empty($_POST['email'])) $error[] = 'no_email';
	elseif(!preg_match($regex_email, $_POST['email'])) $error[] = 'incorrect_email';

	if(!isset($_POST['description'])) $error[] = 'no_description';

	if(!isset($_POST['type']) || empty($_POST['type'])) $error[] = 'no_profile_type';
	elseif($_POST['type'] != 'public' && $_POST['type'] != 'private') $error[] = 'incorrect_profile_type';

	if(empty($error)) {
		updateData($_SESSION['id'], $_POST['username'], $_POST['email'], $_POST['description'], $_POST['type']);
		$success_updateMsg = $lang['user']['success_update'];
	}

	$error_updateMsgs = getErrMsgs($error);
}
elseif(isset($_POST['add'])) {
	$userData = getUserData($_SESSION['username']);

	if(!isset($_POST['pseudo']) || empty($_POST['pseudo'])) $error[] = 'no_pseudo';
	// elseif(!preg_match($regex_pseudo, $_POST['pseudo']))  $error[] = 'incorrect_pseudo';
	elseif(hasPseudo($_POST['pseudo'], $userData['pseudos'])) $error[] = 'already_have_pseudo';

	if(empty($error)) {
		addPseudo($_SESSION['id'], $_POST['pseudo'], $userData['pseudos']);
		$success_pseudoMsg = $lang['user']['success_add_pseudo'];
	}

	$error_pseudosMsgs = getErrMsgs($error);
}
elseif(isset($_POST['remove'])) {
	$userData = getUserData($_SESSION['username']);

	if(!isset($_POST['remove_pseudo']) || empty($_POST['remove_pseudo']) || $_POST['remove_pseudo'] == -1) $error[] = 'no_pseudo';
	elseif(!hasPseudoById($_POST['remove_pseudo'], $userData['pseudos'])) $error[] = 'doesnt_have_pseudo';

	if(empty($error)) {
		removePseudo($_SESSION['id'], $_POST['remove_pseudo'], $userData['pseudos']);
		$success_pseudoMsg = $lang['user']['success_remove_pseudo'];
	}

	$error_pseudosMsgs = getErrMsgs($error);
}
elseif(isset($_POST['update_pwd'])) {
	$old_password = hash('sha256', $_POST['old_password']);
	if(!isValid($_SESSION['username'], $old_password)) {
		$error[] = 'wrong_password';
	}
	else {
		if(!isset($_POST['password']) || empty($_POST['password']))  $error[] = 'no_password';
		elseif(!isset($_POST['confirm_password']) || empty($_POST['confirm_password'])) $error[] = 'no_confirm_password';
		elseif($_POST['password'] != $_POST['confirm_password'])  $error[] = 'password_match';
		elseif(!preg_match($regex_password, $_POST['password']))  $error[] = 'incorrect_password';

		if(empty($error)) {
			$new_password = hash('sha256', $_POST['password']);
			updatePassword($_SESSION['id'], $new_password);
			$_SESSION['password'] = $new_password;
			$success_updatePwdMsg = $lang['user']['success_update_pwd'];
		}
	}
	$error_updatePwdMsgs = getErrMsgs($error);
}

$userData = getUserData($_SESSION['username']);