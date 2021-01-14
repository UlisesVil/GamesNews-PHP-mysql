<?php
require_once 'includes/conexion.php';
require_once 'includes/helpers.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $commentInd = conseguirComentario($db, $_GET['id']);
    $commnet_id=$_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];
    
    $entrada_id = $commentInd['entrada_id'];
    
    var_dump($commentInd['entrada_id']);
     var_dump($entrada_id);
    var_dump($commnet_id);
    var_dump($usuario_id);
    
    $sql = "DELETE FROM comments WHERE usuario_id = $usuario_id AND id = $commnet_id";
    $borrar = mysqli_query($db, $sql);
    
    //var_dump($_GET['id']);
    //var_dump($_SESSION['usuario']['id']);
    //echo mysqli_error($db);
   //die();
}

header("Location: entrada.php?id=$entrada_id");