<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Crear Entradas</h1>
    
    <p>
        Añade nuevas Entradas al blog para que los usuarios 
        puedan leerlas y disfrutar de nuestro contenido.
    </p>
    <br/>
    
    <form class="newEntry" action="guardar-entrada.php" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" />
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'titulo'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'descripcion'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

        
        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <?php $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
                        
            ?>
             
            <option value="<?= $categoria['id'] ?>">
                
                    <?=$categoria['nombre']?>
                </option>
               
            <?php 
                    endwhile;
                endif;
            ?>
             
        </select>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'categoria'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

        
        <input type="submit" value="Guardar" />
        
    </form>
    <?php borrarErrores();?>
    
</div>  <!--FIN PRINCIPAL-->
    
         
<?php require_once 'includes/footer.php'; ?>

</body>
</html>

