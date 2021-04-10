<?php

	$servidor = '**DB secret Data Host**';
	$usuario= '**DB secret Data Host**';
	$password= '**DB secret Data Host**';
	$basededatos= '**DB secret Data Host**';
	
	$db = mysqli_connect($servidor, $usuario, $password, $basededatos);
	mysqli_query($db, "SET NAMES 'utf8'");

	if(!isset($_SESSION)){
		session_start();
	}
?>