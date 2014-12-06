<?php
function existCategory($shop_id, $category) {
	global $bdd;
	$rep = $bdd->query('SELECT id FROM shops_categories WHERE shop_id = :shop_id AND name = :name', array('shop_id' => $shop_id, 'name' => $category));
	return !empty($rep) ? $rep[0]['id'] : false;
}

function existOffer($shop_id, $offer_id){
	global $bdd;
	$rep = $bdd->query('SELECT id FROM shop_offers WHERE shop_id = :shop_id AND offer_id = :offer_id', array('shop_id' => $shop_id, 'offer_id' => $offer_id));
	return !empty($rep);
}

function getOffers($shop_id) {
	global $bdd;
	$offers = '';
	$offers = $bdd->query('SELECT id,category_id,name,description,price FROM shops_offers WHERE shop_id = :shop_id AND deleted = 0 ORDER BY category_id', array('shop_id' => $shop_id));
	return $offers;
}

function getCategories($shop_id) {
	global $bdd;
	return $rep = $bdd->query('SELECT id,name,description FROM shops_categories WHERE shop_id = :shop_id AND deleted = 0 ORDER BY purchases', array('shop_id' => $shop_id));
}
?>