<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php 
    $entrada_actual = conseguirEntrada($db, $_GET['id']); //En este caso usamos GET por que el id que necesitamos viene por la url de forma visible
    //var_dump($entrada_actual['id']);
    
    
    if(!isset($entrada_actual['id'])){
        header("Location: index.php");
    }
?>



<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>




<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Edit Entry:</h1>
    
    <p>
      <?=$entrada_actual['titulo']?>
    </p>
    <br/>
    
    <form class="newEntry" action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for="titulo">Title:</label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>"/>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'titulo'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->
        
        <label for="descripcion">Description:</label>
        <textarea name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'descripcion'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

        
        <label for="categoria">Category:</label>
        <select name="categoria">
            <?php $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
                        
            ?>
             
            <option value="<?= $categoria['id'] ?>" <?= ($categoria['id']==$entrada_actual['categoria_id'])? 'selected="selected"' : ''?>>
                    <?=$categoria['nombre']?>
                </option>
               
            <?php 
                    endwhile;
                endif;
            ?>
             
        </select>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'categoria'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

        
        <input type="submit" value="Save" />
        
    </form>
    <?php borrarErrores();?>
    
</div>  <!--FIN PRINCIPAL-->
    
         
<?php require_once 'includes/footer.php'; ?>

</body>
</html>