<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/headers.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Mis Datos</h1>
    
    <?php if(isset($_SESSION['completado'])): ?>
                <div class="alerta alerta-exito">     
                   <?= $_SESSION['completado'] ?>
                </div>    
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error">     
                   <?=$_SESSION['errores']['general']?>
                </div>
            <?php endif; ?>

            <form class="newEntry" action="actualizar-usuario.php" method="POST">

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre'];?>"/>
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'nombre'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos'];?>"/>
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'apellidos'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

                <label for="email">Email</label>
                <input type="email" name="email" value="<?=$_SESSION['usuario']['email'];?>"/>
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'email'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->
                
                <input type="submit" name="sumbit" value="Actualizar" />

            </form>
            <?php borrarErrores(); ?>
    
</div>  <!--FIN PRINCIPAL-->
         
<?php require_once 'includes/footer.php'; ?>

</body>
</html>