<?php
ob_start();
require_once 'includes/conexion.php';
require_once 'includes/helpers.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    
    $entrada_idGet = $_GET['id'];
    $comments = conseguirComentarios($db, $entrada_idGet);
    while($comment = mysqli_fetch_assoc($comments)){
        //var_dump($comment);
        $entrada_id=$comment['entrada_id'];
        //var_dump($entrada_id);
        $sql = "DELETE FROM comments WHERE entrada_id = $entrada_id";
        //var_dump($sql);
        $borrar = mysqli_query($db, $sql);
    }
     
    $sql = "DELETE FROM entradas WHERE id = $entrada_idGet";
    //var_dump($sql);
    //var_dump($entrada_id);
    //var_dump($usuario_id);
    //var_dump($sql);
    //die();
    $borrar = mysqli_query($db, $sql);
    
//var_dump($_GET['id']);
//var_dump($_SESSION['usuario']['id']);
//echo mysqli_error($db);
//die();
}

header("Location: categoria.php?id=$entrada_id");
ob_end_flush();