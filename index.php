<?php
/*********************/
//  DEV MODE
define('DEV_MODE', true);
// if(!$_COOKIE['developper'] == "") header('Location: http://beta.shupple.com');
/*********************/

// ini_set('session.cookie_domain', '.shupple.com');
define('HTTP_HOST', $_SERVER['HTTP_HOST'], true);
define('WEBROOT', 'http://'.HTTP_HOST.str_replace('index.php', '', $_SERVER['SCRIPT_NAME']), true);

include_once('./includes/functions.php');
include_once('./includes/infos.php');
include_once('./includes/MySQL.php');
$bdd = new MySQL();

// Default
$prefix = '';
$page = 'home'; // Default page
$me = false;

if(isset($_GET['shop'])) {
    $issetShop = issetShop($_GET['shop']);
    if($issetShop != -1) {
        define('SHOP_ID', $_GET['shop']);
        $shop = $issetShop;

        next($_GET);
        $req = Utils::parseUrl(key($_GET));

        $prefix = 'shop_';
    } else {
        $loc = str_replace($_GET['shop'].'.', '', HTTP_HOST);
        header('Location: http://'.$loc.WEBROOT.'404'); // FIX
    }
}
else { 
    $req = Utils::parseUrl(key($_GET));
}

if(DEV_MODE) define('SHOPROOT', WEBROOT.'index.php?'.((isset($shop['shop_id'])) ? 'shop='.$shop['shop_id'].'&' : '').'/', true);

$req = array_map('strtolower', $req);
define('CURRENT_PAGE', implode('/', $req));

session_start();
date_default_timezone_set('Europe/Paris');

if(!empty($req[0])) {
    $page = $req[0];

    if($page == "user") {
        $username = $req[1];
        unset($req[1]);
    }
    if($page == "me") {
    	$page = "user";
        $me = true;

        if(isset($_SESSION['username'])) $username = $_SESSION['username'];
    }
    
    array_shift($req);

} else {$req = array();}

// on ajoute le préfix s'il été créé
$page = $prefix.$page;

// On verifie s'il y a erreur 404
$controllers = scandir('./controllers');
$implode = implode('_', $req);
if(!empty($req) && in_array('c_'.$page.'_'.$implode.'.php', $controllers)) $page .= '_'.$implode;
elseif(!in_array('c_'.$page.'.php', $controllers)) $page = '404';

// # Langs
$lang_id = "fr";
if(isset($_COOKIE['lang'])) $lang_id = $_COOKIE['lang'];
if(!isset($langs_list[$lang_id])) $lang_id = "fr";

include_once('./langs/lang_'.$lang_id.'.php');

// # On charge la page
// - Modele
$models = scandir('./models');
if(in_array('m_'.$page.'.php', $models)) include_once('./models/m_'.$page.'.php');

// - Page
include_once('./controllers/c_'.$page.'.php');

// - View
$views = scandir('./views');
if(in_array('v_'.$page.'.php', $views)) {
    include_once('./views/'.$prefix.'top.php');
    include_once('./views/v_'.$page.'.php');
    include_once('./views/'.$prefix.'btm.php');
}
?>