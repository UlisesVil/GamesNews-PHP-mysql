<?php
	$servidor = 'localhost';
	$usuario= 'root';
	$password= '';
	$basededatos= 'blog_master';
	$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

	/*
	$servidor = '**Data Server**';
	$usuario= '**Data Server**';
	$password= '**Data Server**';
	$basededatos= '**Data Server**';
	*/
	$db = mysqli_connect($servidor, $usuario, $password, $basededatos);
	mysqli_query($db, "SET NAMES 'utf8'");

	if(!isset($_SESSION)){
		session_start();
	}
?>