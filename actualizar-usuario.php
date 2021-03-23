<?php
ob_start();

if(isset($_POST)){
    
    //CONECCION A LA BASE DE DATOS
    require_once 'includes/conexion.php';

   

    //Recoger los valores del formulario de actualizacion
    $nombre = isset($_POST['nombre'])? mysqli_real_escape_string($db, $_POST['nombre']): false;
    $apellidos = isset($_POST['apellidos'])? mysqli_real_escape_string($db, $_POST['apellidos']): false;
    $email = isset($_POST['email'])? mysqli_real_escape_string($db, trim($_POST['email'])): false;
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
    
    
    $guardar_usuario = false;
    
    if(count($errores) == 0){
        $usuario = $_SESSION['usuario'];
        $usuarioID = $_SESSION['usuario']['id'];
        $guardar_usuario = true;
        
        
        //COMPROBAR SI EL EMAIL YA EXISTE
         
        $sql="SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db,$sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        
        if($isset_user['id'] == $usuario['id'] || empty($isset_user) ){
            //ACTUALIZAR USUARIO EN LA TABLA USUARIOS EN LA BASE DE DATOS
            
            $sql =  "UPDATE usuarios SET
                    nombre = '$nombre',
                    apellidos = '$apellidos',
                    email = '$email'
                    WHERE id = $usuarioID";

            $guardar = mysqli_query($db, $sql); //$db link de base de datos $sql= consulta o accion que se ejecutara en la base de datos en este caso un INSERT

            //UPDATE usuarios SET fecha = '1985-05-29' WHERE nombre='Ulises';
            //var_dump(mysqli_error($db));
            //var_dump($usuarioID);
           //die();

            if($guardar){
                $_SESSION['usuario']['nombre']= $nombre;
                $_SESSION['usuario']['apellidos']= $apellidos;
                $_SESSION['usuario']['email']= $email;

                $_SESSION['completado'] = "Tus datos se han actualizado con exito";
            }else{
                $_SESSION['errores']['general'] = "Fallo al actualizar tus datos!!";
            }
        }else{
            $_SESSION['errores']['general'] = "El usuario ya existe!!";
        }
        
    }else{
        $_SESSION['errores'] = $errores;
    }
    
    //var_dump($errores);
}

 header('Location: mis-datos.php');
ob_end_flush();