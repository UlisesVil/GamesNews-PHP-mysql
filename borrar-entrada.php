<?php
    ob_start();
    
    require_once 'includes/conexion.php';
    require_once 'includes/helpers.php';

    if(isset($_SESSION['usuario']) && isset($_GET['id'])){

        $entrada_idGet = $_GET['id'];
        $comments = conseguirComentarios($db, $entrada_idGet);
        while($comment = mysqli_fetch_assoc($comments)){
            $entrada_id=$comment['entrada_id'];
            $sql = "DELETE FROM comments WHERE entrada_id = $entrada_id";
            $borrar = mysqli_query($db, $sql);
        }

        $sql = "DELETE FROM entradas WHERE id = $entrada_idGet";
        $borrar = mysqli_query($db, $sql);
    }

    header("Location: categoria.php?id=$entrada_id");

    ob_end_flush();