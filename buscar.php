<?php 
    if(!isset($_POST['busqueda'])){
        header("Location: index.php");
    }
   
?>



<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>


<!-- CAJA PRINCIPAL -->
<div id="principal">
    
    
    
    <h1>Busqueda: <?=$_POST['busqueda']?></h1>
    
    <?php  
        $entradas = conseguirEntradas($db, null, null, $_POST['busqueda']); //En este caso usamos GET por que el id que necesitamos viene por la url de forma visible
        //var_dump($entradas);
        if(!empty($entradas) && mysqli_num_rows($entradas) >= 1): // se agrego el && mysqli_num_rows($entradas) >= 1 para que funcione el else y muestre la alerta de que no hay entradas que mostrar
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
    <div class="alerta">No hay entradas en esta categoria</div>
    <?php endif; ?>


</div>  <!--FIN PRINCIPAL-->
    
         
<?php require_once 'includes/footer.php'; ?>

</body>
</html>
