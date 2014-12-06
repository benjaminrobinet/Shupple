<?php
function isUsernameAlreadyRegistered($username) {
	global $bdd;
	$rep = $bdd->query('SELECT username FROM users WHERE username = :username', array('username' => $username));
	return (!empty($rep));
}

function isEmailAlreadyRegistered($email) {
	global $bdd;
	$rep = $bdd->query('SELECT email FROM users WHERE email = :email', array('email' => $email));
	return (!empty($rep));
}

function Login($data) {
	$_SESSION['id'] = $data['id'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['password'];
	$_SESSION['rank'] = $data['rank'];
	if(isset($_POST['stay_connected'])){
		setcookie('login', $data['username'].':'.$data['password'], time() + 60 * 60 * 24 * 31);
	}

	if(isset($_SESSION['redirect'])) {
		header('Location: '.WEBROOT.$_SESSION['redirect']);
		unset($_SESSION['redirect']);
	}
	else {
		header('Location: '.WEBROOT.'me');
	}
}

function AddUser($username, $email, $password){
	global $bdd;
	$bdd->insert('INSERT INTO users(username,email,password) VALUES(:username, :email, :password)', array('username' => $username, 'email' => $email, 'password' => $password));
}