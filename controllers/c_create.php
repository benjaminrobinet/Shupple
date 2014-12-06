<?php
if(!isConnected()) {
	$_SESSION['redirect'] = CURRENT_PAGE;
	header('Location: '.WEBROOT.'login');
	exit;
}

if(isset($_POST['create'])) {
	$error = array();
	if((!isset($_POST['name'])) || empty($_POST['name'])) $error[] = 'no_shopname';
	else {
		$shopId = getShopId($_POST['name']);
		if(empty($shopId) || strlen($shopId) <= 4) $error[] = 'incorrect_shopname';
	}

	if((!isset($_POST['type'])) || empty($_POST['type'])) $error[] = 'no_shoptype';
	elseif($_POST['type'] != 'public' && $_POST['type'] != 'private') $error[] = 'incorrect_shop_type';

	if((!isset($_POST['description'])) || empty($_POST['description'])) $error[] = 'no_shop_description';

	if(empty($error)){
		if(!isNameAlreadyRegistered($shopId)){
			$name = htmlspecialchars($_POST['name']);
			$description = htmlspecialchars($_POST['description']);

			addShop($name, $shopId, $_SESSION['id'],$description, ($_POST['type'] == 'public'));
			
			$createdShop = array('id' => $shopId, 'name' => $name);
		}
	}

	$errorMsgs = getErrMsgs($error);
}
?>