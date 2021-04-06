<?php
ob_start();

if(isset($_POST)){
    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){
	    session_start();
    }

    $nombre = isset($_POST['nombre'])? mysqli_real_escape_string($db, $_POST['nombre']): false;
    $apellidos = isset($_POST['apellidos'])? mysqli_real_escape_string($db, $_POST['apellidos']): false;
    $email = isset($_POST['email'])? mysqli_real_escape_string($db, trim($_POST['email'])): false;
    $role='user';
    $password = isset($_POST['password'])? mysqli_real_escape_string($db, $_POST['password']): false;    
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

    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "The password is empty";
    }

    $guardar_usuario = false;
    
    if(count($errores) == 0){
        $guardar_usuario = true;
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$role', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        if($guardar){
            $_SESSION['completado'] = "Registration has been completed successfully";
        }else{
            $_SESSION['errores']['general'] = "Failed to save user!!";
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
    
   //-----------Login after Register-------------------
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);
    
    if($login && mysqli_num_rows($login)== 1){
        $usuario = mysqli_fetch_assoc($login);
        $verify = password_verify($password, $usuario['password']); 
        if($verify){
          $_SESSION['usuario'] = $usuario;
        }else{
          $_SESSION['error_login'] = "Incorrect Login!!";
        }
    }else{
        $_SESSION['error_login'] = "Incorrect Login!!";
    }
}

header('Location: index.php');
ob_end_flush();


