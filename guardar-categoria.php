<?php
    ob_start();
    
    if(isset($_POST)){

        require_once "includes/conexion.php";
        $nombre = isset($_POST['nombre'])? mysqli_real_escape_string($db, $_POST['nombre']) : false;

        $errores = array();

        if(!empty($nombre) && !is_numeric($nombre)&& !preg_match("/[0-9]/",$nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre'] = "La categoria esta en blanco, escribe un nombre para guardarla";
        }

        if(count($errores) == 0){
            $sql = "INSERT INTO categorias VALUES (NULL, '$nombre');";
            $guardar = mysqli_query($db, $sql);
        }else{
            $_SESSION["errors_categoria"] = $errores;
            if(isset($_GET['editar'])){
                header('Location: crear-categoria.php');
            }else{
                header('Location: crear-categoria.php');
            }
        }
    }
    ob_end_flush();
