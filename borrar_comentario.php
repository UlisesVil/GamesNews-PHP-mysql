<?php
ob_start();
require_once 'includes/conexion.php';
require_once 'includes/helpers.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $commentInd = conseguirComentario($db, $_GET['id']);
    $commnet_id=$_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];
    $entrada_id = $commentInd['entrada_id'];
    $sql = "DELETE FROM comments WHERE usuario_id = $usuario_id AND id = $commnet_id";
    $borrar = mysqli_query($db, $sql);
}

header("Location: entrada.php?id=$entrada_id");
ob_end_flush();