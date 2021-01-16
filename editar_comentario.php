<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php 
    $commentInd = conseguirComentario($db, $_GET['id']);
    
    if(!isset($commentInd['id'])){
        header("Location: index.php");
    }
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
        
        <input class="commnetInput"type="hidden" name="entrada" value="<?=$commentInd['entrada_id']?>"/>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'entrada_id'): ''; ?>
        
        <label for="comment">Edita tu Comentario:</label>
        <textarea name="comment"><?=$commentInd['content']?></textarea>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'content'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

        <input type="submit" value="Guardar Comentario" />
    </form>
    
</div>
         
<?php require_once 'includes/footer.php'; ?>

</body>
</html>