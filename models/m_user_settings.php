<?php
function getUserData($username) {
	global $bdd;
	$rep = $bdd->query('SELECT username, email, description, type, pseudos FROM users WHERE username = :username', array('username' => $username));
	if(empty($rep)) return -1;

	return $rep[0];
}

function updateData($id, $username, $email, $description, $type){
	global $bdd;
	$username = strtolower($username);
	$description = htmlspecialchars($description);
	$bdd->insert('UPDATE users SET username = :username, email = :email, description = :description, type = :type WHERE id = :id', array('id' => $id, 'username' => $username, 'email' => $email, 'description' => $description, 'type' => ($type == 'public')));
	$GLOBALS['username'] = $_SESSION['username'] = $username;
}

function updatePassword($id, $password) {
	global $bdd;
	$bdd->insert('UPDATE users SET password = :password WHERE id = :id', array('id' => $id, 'password' => $password));
}

function hasPseudo($pseudo, $pseudos) {
	$pseudos = explode(',', $pseudos);
	return (array_search($pseudo, $pseudos) !== false);
}

function hasPseudoById($pseudoId, $pseudos) {
	$pseudos = explode(',', $pseudos);
	return (isset($pseudos[$pseudoId]));
}

function addPseudo($id, $pseudo, $pseudos) {
	global $bdd;

	$pseudos = explode(',', $pseudos);
	$pseudos[] = $pseudo;

	$pseudos_str = implode(',', $pseudos);

	$bdd->insert('UPDATE users SET pseudos = :pseudos WHERE id = :id', array('id' => $id, 'pseudos' => $pseudos_str));
}

function removePseudo($id, $pseudoId, $pseudos){
	global $bdd;

	$pseudos = explode(',', $pseudos);
	unset($pseudos[$pseudoId]);

	$pseudos_str = implode(',', $pseudos);

	$bdd->insert('UPDATE users SET pseudos = :pseudos WHERE id = :id', array('id' => $id, 'pseudos' => $pseudos_str));
}
?>