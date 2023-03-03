<?php

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}

session_start();

function avatarSucurity($avatar){
	$name = $avatar['name'];
	$type = $avatar['type'];
	$size = $avatar['size'];
	$blacklist = array(".php", ".js", "html");

	foreach($blacklist as $row){
		if(preg_match("/$row\$/i", $name)) return false;
	}

	if(($type != "image/png") && ($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/gif")){
		echo"<h1 style='color:#c93e3e;'>Неверный формат изображения</h1>";
		return false;
	}
	if($size > 5 * 1024 * 1024){
		echo"<h1 style='color:#c93e3e;'>Изображение не должно весить больше 20MB</h1>";
		return false;
	}

	return true;
}

function productSucurity($img){
	$name = $img['name'];
	$type = $img['type'];
	$size = $img['size'];
	$blacklist = array(".php", ".js", "html");

	foreach($blacklist as $row){
		if(preg_match("/$row\$/i", $name)) return false;
	}

	if(($type != "image/png") && ($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/gif")){
		echo"<h1 style='color:#c93e3e;'>Неверный формат изображения</h1>";
		return false;
	}
	if($size > 5 * 1024 * 1024){
		echo"<h1 style='color:#c93e3e;'>Изображение не должно весить больше 20MB</h1>";
		return false;
	}

	return true;
}