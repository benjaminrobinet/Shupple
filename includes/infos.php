<?php
$regex_email = '/^[a-z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i';
$regex_username = '/^([a-z0-9_-]{3,15})$/i';
$regex_name = '/^([a-z0-9_-]{3,15})$/i';
// $regex_pseudo = '/^([a-z0-9_-]{3,15})$/i';
$regex_password = '/^(.{6,})$/i';

define('SiteName', 'Shupple');
define('githubLink', 'http://github.com/BenjaminSansNom/Shupple/');

define('RANK_ADMIN', 1);
define('RANK_MODO', 5);
define('RANK_PREMIUM', 10);
define('RANK_USER', 15);

$langs_list = array(
	'en' => 'English',
	'fr' => 'Français'
	);
?>