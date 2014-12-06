<?php
function getUserData($username) {
	global $bdd;
	$rep = $bdd->query('SELECT username, email, description, type, rank FROM users WHERE username = :username', array('username' => $username));
	if(empty($rep)) return -1;

	return $rep[0];
}
?>