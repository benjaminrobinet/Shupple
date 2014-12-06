<?php
if($me) {
	if(!isConnected()) {
		$_SESSION['redirect'] = CURRENT_PAGE;
		header('Location: '.WEBROOT.'login');
		exit;
	}
} else {
	if($username == $_SESSION['username']) {
		header('Location: '.WEBROOT.'me');
		exit;
	}
}

$userData = getUserData($username);

$badge = '';
if($userData['rank'] == RANK_ADMIN) $badge = '<span class="label label-danger">Admin</span>';
elseif($userData['rank'] == RANK_MODO) $badge = '<span class="label label-primary">Modo</span>';
elseif($userData['rank'] == RANK_PREMIUM) $badge = '<span class="label label-info">Premium</span>';

if (!$me) {
	if($userData == -1) $errorMsg = $lang['error']['profile_not_found'];
	elseif($userData['type'] == 0 && $_SESSION['rank'] > RANK_MODO) $errorMsg = $lang['error']['profile_not_public'];
}
?>