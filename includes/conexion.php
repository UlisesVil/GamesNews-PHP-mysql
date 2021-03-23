<?php
//CONEXION
//$servidor = 'localhost';
//$usuario= 'root';
//$password= ''; //el password de myadmin root
//$basededatos= 'blog_master';
//$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

/*
$servidor = 'localhost';
$usuario= 'id15557042_ulisesvil5';
$password= 'm7cVbsUi@4-mI]5y'; //el password de myadmin root
$basededatos= 'id15557042_blog_master';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);
*/
$servidor = 'fdb30.awardspace.net';
$usuario= '3716107_gamesnews';
$password= 'zLZ6hq#{8mzG^][('; //el password de myadmin root
$basededatos= '3716107_gamesnews';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");


//Iniciar la sesion ligada a registro.php
if(!isset($_SESSION)){
	session_start();
}


?>