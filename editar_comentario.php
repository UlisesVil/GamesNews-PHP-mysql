<?php
ob_start();
require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php 
    $commentInd = conseguirComentario($db, $_GET['id']);
    if(!isset($commentInd['id'])){
        header("Location: index.php");
    }
    ob_end_flush();
?>
<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<div id="principal">
    <h1><?=$commentInd['entrada']?></h1>
    <a href="categoria.php?id=<?=$commentInd['categoria_id']?>" >
       <h2><?=$commentInd['categoria']?></h2> 
    </a>
    <h4><?=$commentInd['fecha']?> | <?=$commentInd['usuario']?></h4>
    <p>
        <?=$commentInd['descripcion']?>
    </p>
    
    <form class="newEntry" action="guardar-comentario.php?editar=<?=$commentInd['id']?>" method="POST">
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'titulo'): ''; ?>
            <input class="commnetInput"type="hidden" name="entrada" value="<?=$commentInd['entrada_id']?>"/>
            <label for="comment">Edita tu Comentario:</label>
            <textarea name="comment"><?=$commentInd['content']?></textarea>
            <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'descripcion'): ''; ?>
            <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'categoria'): ''; ?>
            <input type="submit" value="Guardar Comentario" />
    </form>
</div>  
<?php require_once 'includes/footer.php'; ?>
</body>
</html>