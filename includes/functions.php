<?php
class Utils {
	public static function parseURL($input) {
	if(self::stringStartsWith($input, '/')) {
			$input = substr_replace($input, '', 0, 1);
		}

		if(self::stringEndsWith($input, '/')) {
			$input = substr_replace($input, '', strlen($input) - 1, 1);
		}

		return explode("/", $input);
	}

	public static function stringStartsWith($haystack, $needle) {
		return !strncmp($haystack, $needle, strlen($needle));
	}

	public static function stringEndsWith($haystack, $needle) {
		$length = strlen($needle);

		if ($length == 0) {
			return true;
		}

		return substr($haystack, -$length) === $needle ? true : false;
	}
}

function isConnected(){
	if(!isset($_SESSION['username']) || !isset($_SESSION['password'])) return false;

	$isValid = isValid($_SESSION['username'], $_SESSION['password']);

 	return ($isValid !== -1 && $isValid['banned'] == 0);
}

function isValid($username, $password) {
	global $bdd;
	$username = strtolower($username);
	$rep = $bdd->query('SELECT * FROM users WHERE username = :username AND password = :password', array('username' => $username, 'password' => $password));
	if(empty($rep)) return -1;

	return $rep[0];
}

function getErrMsgs($error) {	
	if(empty($error)) return null;

	global $lang;
	$errorMsg = '';

	foreach($error as $errorId) {
		$errorMsg .= $lang['error'][$errorId].'<br/>';
	}

	return $errorMsg;
}

function issetShop($shopId) {
	global $bdd;
	$shopId = strtolower($shopId);
	$rep = $bdd->query('SELECT * FROM shops WHERE shop_id = :shop_id', array('shop_id' => $shopId));
	if(empty($rep)) return -1;

	return $rep[0];
}
?>