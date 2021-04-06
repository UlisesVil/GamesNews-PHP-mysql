<?php
ob_start();
require_once 'includes/redireccion.php';
?>
<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
<?php 
    if(isset($_SESSION['usuario']) && $_SESSION['usuario']['role']!=='admin'){
        header('Location: index.php');
    }
    ob_end_flush();
?>

<div id="principal">
    <h1>Crear Categorias</h1>
    <p>
        Add new categories to the blog.
    </p>
    <br/>
    <form class="newEntry" action="guardar-categoria.php" method="POST">
        <label for="nombre">Category Name</label>
        <input type="text" name="nombre" />
        
        <input type="submit" value="Save" />
    </form>
</div>   
<?php require_once 'includes/footer.php'; ?>
</body>
</html>

