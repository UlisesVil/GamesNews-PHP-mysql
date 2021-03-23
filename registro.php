<?php


if(isset($_POST)){
    
    //CONECCION A LA BASE DE DATOS
    require_once 'includes/conexion.php';

    //INICIAR SESION
    if(!isset($_SESSION)){
	session_start();
    }

    //Recoger los valores del formulario de registro
    $nombre = isset($_POST['nombre'])? mysqli_real_escape_string($db, $_POST['nombre']): false;
    $apellidos = isset($_POST['apellidos'])? mysqli_real_escape_string($db, $_POST['apellidos']): false;
    $email = isset($_POST['email'])? mysqli_real_escape_string($db, trim($_POST['email'])): false;
    $role='user';
    $password = isset($_POST['password'])? mysqli_real_escape_string($db, $_POST['password']): false;
    /*mysqli_real_escape_string();  se usa para escapar caracteres especiales
    con los que se podria romper la consulta y tomarlos como parte del string*/
    
    
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
    //Validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos)&& !preg_match("/[0-9]/",$apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }
    //Validar email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }
    //Validar contraseña
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña esta vacia";
    }
    
    $guardar_usuario = false;
    
    if(count($errores) == 0){
        $guardar_usuario = true;
        
        //CIFRAR CONTRASEÑA
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        //password_hash= funcion de encriptado de contraseña
        //$password = variable que contiene la contraseña
        //PASSWORD_BCRYPT= tipo de cifrado que se usara
        //['cost'=>4]= numero de veces que se cifrara la contraseña
        //var_dump($password);
        //var_dump($password_segura);
        //var_dump(password_verify($password, $password_segura));
        //die();
        
        //INSERTAR USUARIO EN LA TABLA USUARIOS EN LA BASE DE DATOS
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$role', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql); //$db link de base de datos $sql= consulta o accion que se ejecutara en la base de datos en este caso un INSERT
                
        //var_dump(mysqli_error($db));
        //die();
        
        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con exito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
        }
        
    }else{
        $_SESSION['errores'] = $errores;
    }
    
    //var_dump($errores);
    
    
   //-----------Login after Register-------------------
    
    //Consulata para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);
    
    if($login && mysqli_num_rows($login)== 1){
        $usuario = mysqli_fetch_assoc($login);
        
     //Comprobar la contraseña
     $verify = password_verify($password, $usuario['password']); 
     
        if($verify){
          //Utilizar una sesion para guardar los datos del usuario logueado
          $_SESSION['usuario'] = $usuario;
          
            
        }else{
          //Si algo falla enviar una sesion con el fallo
          $_SESSION['error_login'] = "Login incorrecto!!";
        }
             
    }else{
        //Mensaje de error
        $_SESSION['error_login'] = "Login Incorrecto!!";
    }
}

 header('Location: index.php');



