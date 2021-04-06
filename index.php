<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<div id="principal">
    <h1>Latest News</h1>
    <?php  
        $entradas = conseguirEntradas($db, true);
        if(!empty($entradas)):
        while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
        <article class="entrada">
            <a href="entrada.php?id=<?=$entrada['id']?>" >
                <h2><?=$entrada['titulo']?></h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha'] ?></span>
                <p>
                  <?=substr($entrada['descripcion'], 0, 180).'...'?>
                </p>
            </a>
            <br/>
            <hr>
        </article>
    <?php
        endwhile;
        endif;
    ?>
    <div id="ver-todas">
        <a href="entradas.php">All entries</a>
    </div>
</div> 
<?php require_once 'includes/footer.php'; ?>
</body>
</html>
