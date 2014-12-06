<?php
function isOwner($shop_id, $user_id){
	global $bdd;
	$rep = $bdd->query('SELECT id FROM shops WHERE owner_id = :user_id', array('user_id' => $user_id));
	return (!empty($rep));
}

function getUserData($username) {
	global $bdd;
	$rep = $bdd->query('SELECT id FROM users WHERE username = :username', array('username' => $username));
	if(empty($rep)) return false;

	return $rep[0];
}

function deleteShop($id){
	global $bdd;
	$bdd->insert('UPDATE shops SET deleted = 1 WHERE id = :id', array('id' => $id));
}

function getShops($owner_id, $type = 1){
	global $bdd;
	return $rep = $bdd->query('SELECT * FROM shops WHERE owner_id = :owner_id AND type >= :type AND deleted = 0', array('owner_id' => $owner_id, 'type' => $type));
}
?>