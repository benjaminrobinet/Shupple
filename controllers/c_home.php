<?php 
if(isset($_SESSION['logout']) && $_SESSION['logout'] == 1) {
	$successMsg = $lang['general']['logout_message'];
	unset($_SESSION['logout']);
}