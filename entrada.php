<?php 
ob_start();
require_once 'includes/conexion.php'; 
?>
<?php require_once 'includes/helpers.php'; ?>

<?php
    $entrada_actual = conseguirEntrada($db, $_GET['id']); //En este caso usamos GET por que el id que necesitamos viene por la url de forma visible
     
    if(!isset($entrada_actual['id'])){
        header("Location: index.php");
    }
ob_end_flush();
?>



<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>


<!-- CAJA PRINCIPAL -->
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
            <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" id="verde" class="boton boton-verde">Edit Entry</a>
            <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" id="rojo" class="boton boton-rojo">Delete Entry</a>
        </div>
    <?php endif; ?>

        
        
        
    <div class="commentForm">
        
        <form class="newEntry" action="guardar-comentario.php" method="POST">

            <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'titulo'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

            <input class="commnetInput"type="hidden" name="entrada" value="<?=$entrada_actual['id']?>"/>
        
            
            <?php if(isset($_SESSION['usuario'])): ?> 
                <label for="comment">Add a comment:</label>
                <textarea name="comment"></textarea>
                <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'descripcion'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->
                <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'categoria'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->
                <input type="submit" value="Save Comment" />
            <?php else: ?> 
               <label for="comment">Add a comment:</label>
               <textarea name="comment" disabled></textarea>
               
               <h3 class="commentDisabled">You must be Logged In to make a comment!!!</h3>
            <?php endif; ?>

        </form>
        
    </div>
        <br/>
        <hr>    
      
        
    <?php  
        $comments = conseguirComentarios($db, $_GET['id']);
        if(!empty($comments)):
        while($comment = mysqli_fetch_assoc($comments)):
    ?>
        
    <article class="entrada">
        <h3><?=$comment['usuario'].' '?>Says:</h3>
            <p>
              <?=$comment['content']?>
            </p>

       <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $comment['usuario_id']): ?> 

            <div class="commentbuttons">
                <a href="editar_comentario.php?id=<?=$comment['id']?>" id="verde" class="boton boton-verde">Edit Comment</a>
                <a href="borrar_comentario.php?id=<?=$comment['id']?>" id="rojo" class="boton boton-rojo">Delete Comment</a>
            </div>
    
        <?php endif; ?>
    </article>
    
    <hr>
    
    <?php
        endwhile;
        endif;
    ?>
 
</div>  <!--FIN PRINCIPAL-->
        
<?php require_once 'includes/footer.php'; ?>

</body>
</html>
