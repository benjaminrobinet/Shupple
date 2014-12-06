<?php
function getShopId($name) {
	$shopId = strtolower($name);
	$shopId = preg_replace('/[\W_]/', '', $shopId);
	return $shopId;
}

function isNameAlreadyRegistered($shopId) {
	global $bdd;

	$rep = $bdd->query('SELECT shop_id FROM shops WHERE shop_id = :shop_id', array('shop_id' => $shopId));
	return (!empty($rep));
}

function addShop($name, $shopId, $ownerId, $description, $type) {
	global $bdd;

	$bdd->insert('INSERT INTO shops(name, shop_id, owner_id, description, type) VALUES(:name, :shop_id, :owner_id, :description, :type)', array('name' => $name, 'shop_id' => $shopId, 'owner_id' => $ownerId, 'description' => $description, 'type' => ($type == 'public'))); 
}
?>