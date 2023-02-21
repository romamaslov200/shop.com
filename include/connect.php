<?php
require 'rb.php';
session_start();
	$servername = "localhost";
	$database = "shop";
	$username = "root";
	$password = "";	
	
	// Устанавливаем соединение
	
	$conn = mysqli_connect($servername, $username, $password, $database);
	
	// Проверяем соединение
	
	R::setup( 'mysql:host=' . $servername . ';dbname=' . $database . '','' . $username . '', '' . $password . '' );

	$conn->set_charset("utf8");

	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	?>