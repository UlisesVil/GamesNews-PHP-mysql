<?php
ob_start();
if(isset($_POST)){
    
    //CONECCION A LA BASE DE DATOS
    require_once "includes/conexion.php";
    
    $nombre = isset($_POST['nombre'])? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    
    
    //Array de errores
    $errores = array();
    
    
    //Validar los datos antes de guardarlos en la base de datos
    //Validar Campo Nombre
    if(!empty($nombre) && !is_numeric($nombre)&& !preg_match("/[0-9]/",$nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    
    
    
    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES (NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);
    }
        
    
}

header('Location: index.php');

ob_end_flush();
