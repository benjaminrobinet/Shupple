<?php
if(!$me && $username == $_SESSION['username']) {
	header('Location: '.WEBROOT.'me/shops');
	exit;
}

if(isset($_POST['delete'])){
	$shop_id = $_POST['shop_id'];
	$user_id = $_SESSION['id'];
	if(isOwner($shop_id,$user_id)){
		deleteShop($shop_id);
	}
}

$userData = getUserData($username);
if($userData === false) { // Le user n'existe pas
	header('Location: '.WEBROOT.'user/'.$username);
	exit;
}


$shopsList = getShops($userData['id'], !$me); // affiche les shops privés si c'est le profil de l'utilisateur connecté
?>