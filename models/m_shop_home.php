<?php
function getNewsNbr($shop_id) {
	global $bdd;
	$rep = $bdd->query('SELECT COUNT(id) as newsNbr FROM shops_news WHERE shop_id = :shop_id', array('shop_id' => $shop_id));
	return $rep[0]['newsNbr'];
}

function getNews($shop_id, $page) {
	$nbParPage = 5;
	$page = 1;
	$page--;

	$start = intval($page*$nbParPage);

	global $bdd;
	return $bdd->query('SELECT title,news,timestamp FROM shops_news WHERE shop_id = :shop_id AND deleted = 0 LIMIT '.$start.', '.$nbParPage, array('shop_id' => $shop_id));
}

function getCategories($shop_id) {
	$nbOfCategories = 6;

	global $bdd;
	return $bdd->query('SELECT name,description FROM shops_categories WHERE shop_id = :shop_id AND deleted = 0 ORDER BY purchases LIMIT '.$nbOfCategories, array('shop_id' => $shop_id));
}
?>