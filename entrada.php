<?php
    ob_start();
?>

<?php 
    require_once 'includes/conexion.php';
    require_once 'includes/helpers.php'; 
?>

<?php 
    $entrada_actual = conseguirEntrada($db, $_GET['id']);
     
    if(!isset($entrada_actual['id'])){
        header("Location: index.php");
    }
?>

<?php 
    require_once 'includes/headers.php';
    require_once 'includes/lateral.php';
?>

<div id="principal">
  
    <h1><?=$entrada_actual['titulo']?></h1>
    <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>" >
       <h2><?=$entrada_actual['categoria']?></h2> 
    </a>
    <h4><?=$entrada_actual['fecha']?> | <?=$entrada_actual['usuario']?></h4>
    <p>
        <?=$entrada_actual['descripcion']?>
    </p>
    
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['role']==='admin'): ?> 
        <br/>
        <div class="commentbuttons">
            <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-verde">Editar Entrada</a>
            <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" id="rojo" class="boton boton-rojo">Eliminar Entrada</a>
        </div>
    <?php endif; ?>
        
    <div class="commentForm">
        <form class="newEntry" action="guardar-comentario.php" method="POST">
            <input class="commnetInput"type="hidden" name="entrada" value="<?=$entrada_actual['id']?>"/>
            <?php echo isset($_SESSION['errors_comment'])? mostrarError($_SESSION['errors_comment'], 'id'): ''; ?>
            
            <label for="comment">Agrega un Comentario:</label>
            <textarea name="comment"></textarea>
            <?php echo isset($_SESSION['errors_comment'])? mostrarError($_SESSION['errors_comment'], 'comment'): ''; ?>

            <input type="submit" value="Guardar Comentario" />
        </form>
        <?php borrarErrores();?>
    </div>
        
    <br/>
    <hr>    
       
    <?php  
        $comments = conseguirComentarios($db, $_GET['id']);
        if(!empty($comments)):
        while($comment = mysqli_fetch_assoc($comments)):
    ?>
        
    <article class="entrada">
        <h3><?=$comment['usuario'].' '?>Dice:</h3>
            <p>
              <?=$comment['content']?>
            </p>
        <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $comment['usuario_id']): ?> 
            <div class="commentbuttons">
                <a href="editar_comentario.php?id=<?=$comment['id']?>" id="verde" class="boton boton-verde">Editar Comentario</a>
                <a href="borrar_comentario.php?id=<?=$comment['id']?>" id="rojo" class="boton boton-rojo">Eliminar Comentario</a>
            </div>
        <?php endif; ?>
    </article>
    <hr>
    <?php
        endwhile;
        endif;
    ?>
</div>
        
<?php require_once 'includes/footer.php'; ?>

<?php
    ob_end_flush();
?>

</body>
</html>
