<?php
if(isset($_SESSION['username'])) {
    session_destroy();
    setcookie('login', NULL, -1);
    session_start();
    
    $_SESSION['logout'] = 1;
}
header('Location: '.WEBROOT);
?>