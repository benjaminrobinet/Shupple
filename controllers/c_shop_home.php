<?php
$newsList = getNews($shop['id'], 0);
$newsNbr = count($newsList);

$categoriesList = getCategories($shop['id']);
$categoriesNbr = count($categoriesList);

/* News => Title: 45 max
		=> Content: 240

	Categories
		=> Title: 15
		=> Content: 140

*/
?>