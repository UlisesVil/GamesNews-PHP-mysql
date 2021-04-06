<?php 
    ob_start();
    require_once 'includes/conexion.php'; 
?>
<?php 
    require_once 'includes/helpers.php';
?>
<?php 
    $categoria_actual = conseguirCategoria($db, $_GET['id']);
    if(!isset($categoria_actual['id'])){
        header("Location: index.php");
    }
    ob_end_flush();
?>
<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<div id="principal">
    <h1><?=$categoria_actual['nombre']?> News</h1>
    <?php  
        $entradas = conseguirEntradas($db, null, $_GET['id'] );
        if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
        while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
        <article class="entrada">
           <!-- <?php var_dump($entrada);?> -->
            <a href="entrada.php?id=<?=$entrada['id']?>" >
                <h2><?=$entrada['titulo']?></h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha'] ?></span>
                <p>
                  <?=substr($entrada['descripcion'], 0, 180).'...'?>
                </p>
            </a>
        </article>
    <?php
        endwhile;
        else:
    ?>
    <div class="alerta">No entries in this category</div>
    <?php endif; ?>
</div>
<?php require_once 'includes/footer.php'; ?>
</body>
</html>
