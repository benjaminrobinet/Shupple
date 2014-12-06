<?php
// Format de l'url à l'arrivée sur la page
// [shop].shupple.com/offers/[category]/[offerId]

$askedCategory = false; $askedOffer = false;

// S'il 
if(isset($req[0])) {
	$categoryId = existCategory($shop['id'], $req[0]);
	if($categoryId) {
		$askedCategory = $categoryId;

		if(isset($req[1])) {
			$offerId = existOffer($shop['id'], $req[1]);
			if($offerId) {
				$askedOffer = $offerId;
			} else {
				$offerError = true;
			}
		}
	} else {
		$categoryError = true;
	}
}
$offers = getOffers($shop['id']);
$categories = getCategories($shop['id']);
?>
