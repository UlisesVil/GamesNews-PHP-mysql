<?php
ob_start();
if(isset($_POST)){
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre'])? mysqli_real_escape_string($db, $_POST['nombre']): false;
    $apellidos = isset($_POST['apellidos'])? mysqli_real_escape_string($db, $_POST['apellidos']): false;
    $email = isset($_POST['email'])? mysqli_real_escape_string($db, trim($_POST['email'])): false;

    $errores = array();

    if(!empty($nombre) && !is_numeric($nombre)&& !preg_match("/[0-9]/",$nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "The name is invalid";
    }
    
    if(!empty($apellidos) && !is_numeric($apellidos)&& !preg_match("/[0-9]/",$apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Last name is not valid";
    }
    
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "The email is not valid";
    }
    
    $guardar_usuario = false;

    if(count($errores) == 0){
        $usuario = $_SESSION['usuario'];
        $usuarioID = $_SESSION['usuario']['id'];
        $guardar_usuario = true;
         
        $sql="SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db,$sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        
        if($isset_user['id'] == $usuario['id'] || empty($isset_user) ){            
            $sql="UPDATE usuarios SET
                nombre = '$nombre',
                apellidos = '$apellidos',
                email = '$email'
                WHERE id = $usuarioID";
            $guardar = mysqli_query($db, $sql);
            if($guardar){
                $_SESSION['usuario']['nombre']= $nombre;
                $_SESSION['usuario']['apellidos']= $apellidos;
                $_SESSION['usuario']['email']= $email;
                $_SESSION['completado'] = "Your data has been updated successfully";
            }else{
                $_SESSION['errores']['general'] = "Failed to update your data!!";
            }
        }else{
            $_SESSION['errores']['general'] = "User already exists!!";
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
}
header('Location: mis-datos.php');
ob_end_flush();