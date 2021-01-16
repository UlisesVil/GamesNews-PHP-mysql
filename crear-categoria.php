<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<?php 
    if(isset($_SESSION['usuario']) && $_SESSION['usuario']['role']!=='admin'){
        header('Location: index.php');
    }
?>

<div id="principal">
    <h1>Crear Categorias</h1>
    <p>
        Añade nuevas categorias al blog para que los usuarios 
        puedan usarlas al crear sus entradas.
    </p>
    <br/>
    <form class="newEntry" action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre de la categoria</label>
        <input type="text" name="nombre" />
        <?php echo isset($_SESSION['errors_categoria'])? mostrarError($_SESSION['errors_categoria'], 'nombre'): ''; ?>
        
        <input type="submit" value="Guardar" />
    </form>
    <?php borrarErrores();?>
</div>
         
<?php require_once 'includes/footer.php'; ?>

</body>
</html>

