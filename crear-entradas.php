<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<div id="principal">
    <h1>Create Entries</h1>
    <p>
        Add new blog posts for users to
        can read them and enjoy our content.
    </p>
    <br/>
    <form class="newEntry" action="guardar-entrada.php" method="POST">
        <label for="titulo">Title:</label>
        <input type="text" name="titulo" />
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'titulo'): ''; ?>
        <label for="descripcion">Description:</label>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'descripcion'): ''; ?>
        <label for="categoria">Category:</label>
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
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'categoria'): ''; ?>
        <input type="submit" value="Save" />
    </form>
    <?php borrarErrores();?>
</div>    
<?php require_once 'includes/footer.php'; ?>
</body>
</html>

