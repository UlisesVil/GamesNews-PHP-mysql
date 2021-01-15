<?php
ob_start();
if(isset($_POST)){
    
    require_once 'includes/conexion.php';
    $comment= isset($_POST['comment'])? mysqli_real_escape_string($db, $_POST['comment']): false;
    $entrada= isset($_POST['entrada'])? mysqli_real_escape_string($db, $_POST['entrada']): false;
    $usuario= (int)$_SESSION['usuario']['id'];
    var_dump($_POST['comment']); 
    
    
     //Validation
    $errors=array();
    if(empty($comment)){
        $errors['comment']='El comentario no es valido';
    }
    if(empty($entrada) && !is_numeric($entrada)){
        $errors['entrada']='La entrada no es valida';
    }
     var_dump($errors);
    
    
    
    if(count($errors) == 0){
        if(isset($_GET['editar'])){
           $comment_id=$_GET['editar'];
           $usuario_id=$_SESSION['usuario']['id'];
            
            $sql= "UPDATE comments SET entrada_id= $entrada, content='$comment', updated_at= CURDATE()"
                    . "WHERE id= $comment_id AND entrada_id= $entrada";
            
//            var_dump($comment);
//            var_dump($entrada);
//            var_dump($usuario);
            
            //die();
        }else{
            //var_dump($comment);
            //var_dump($entrada);
            //var_dump($usuario);
            
            //die();
            $sql = "INSERT INTO comments VALUES (null, $usuario, $entrada, '$comment', CURDATE(), CURDATE());";
            $sqlEntrada = "UPDATE entradas SET comment_id= $comment_id"
                        . "WHERE id= $entrada_id AND usuario_id= $usuario_id";
                    
            $guardarEntrada = mysqli_query($db, $sqlEntrada);
        }
        
        $guardarComment = mysqli_query($db, $sql);
        
        header('Location: entrada.php?id='.$entrada);
        
        
        
    }
     
     
    
    
    
    
    
}

ob_end_flush();