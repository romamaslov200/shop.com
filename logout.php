<?php 
	session_start();
    include "include/functions.php";
	unset($_SESSION['logged_user']);
	header('Location: /');
?>
