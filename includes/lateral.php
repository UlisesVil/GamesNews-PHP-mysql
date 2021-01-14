<!-- BARRA LATERAL -->
<aside id="sidebar" >

    <div id="buscador" class="bloque elementbloq" style="display: none;">
        <i id="buscadorClose" class="fas fa-times"></i>
          
            <h3>Buscar<i class="fas fa-search"></i></h3>

            <form class="newEntry" action="buscar.php" method="POST">
                
                <input type="text" name="busqueda" />
                <input type="submit" value="Buscar" />

            </form>
    </div>
    
    <h3 id="buscadorbtn" class="h3bloq showmenu">Buscar<i class="fas fa-search"></i></h3>
    
    <?php if(isset($_SESSION['usuario'])): ?>
    <div id="userLog" class="bloque" style="display: none;">
        
    <i id="userLogClose" class="fas fa-times"></i>
            <h3 id="userLogbtnIn">Bienvenido,<br/>-<?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']; ?>-</h3>
            <!--BOTONES-->
           
            <?php if($_SESSION['usuario']['role']==='admin'): ?>
            <a href="crear-entradas.php" class="boton boton-verde">Crear Entradas</a>
            <a href="crear-categoria.php" class="boton boton">Crear Categoria</a>
            <?php endif; ?>
            <a href="mis-datos.php" class="boton boton-naranja">Mis datos</a>
            <a href="cerrar.php" class="boton boton-rojo">Cerrar Sesión<i class="fas fa-sign-out-alt"></i></a>

    </div>
    <h3 id="userLogbtn" class="h3bloq showmenu">Tus Opciones:<br/>-<?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']; ?>-</h3>
    <?php endif; ?>


    <?php if(!isset($_SESSION['usuario'])): ?>
        <div id="login" class="bloque elementbloq" style="display: none;"> 
            <i id="loginClose" class="fas fa-times"></i>
            <h3>Identificate<i class="fas fa-sign-in-alt"></i></h3>

        <?php if(isset($_SESSION['error_login'])): ?>
            <div class="alerta alerta-error">
            <?=$_SESSION['error_login'];?>                  
            </div>
        <?php endif; ?>

            <form class="newEntry" action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" />

                <label for="password">Contraseña</label>
                <input type="password" name="password" />

                <input type="submit" value="Entrar" />

            </form>
        </div>
<h3 id="loginbtn" class="h3bloq showmenu">Identificate<i class="fas fa-sign-in-alt"></i></h3>

        <div id="register" class="bloque elementbloq" style="display: none;">
            <?php if(isset($_SESSION['errores'])): ?>
                <?php var_dump($_SESSION['errores']); ?>
            <?php endif; ?>
            <i id="registerClose" class="fas fa-times"></i>
            <h3>Registrate<i class="far fa-clipboard"></i></h3>
            
            <!--Mostrar errores-->
            <?php if(isset($_SESSION['completado'])): ?>
                <div class="alerta alerta-exito">     
                   <?= $_SESSION['completado'] ?>
                </div>    
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error">     
                   <?=$_SESSION['errores']['general']?>
                </div>
            <?php endif; ?>

            <form class="newEntry" action="registro.php" method="POST">

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" />
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'nombre'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" />
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'apellidos'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

                <label for="email">Email</label>
                <input type="email" name="email" />
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'email'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

                <label for="password">Contraseña</label>
                <input type="password" name="password" />
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'password'): ''; ?><!--con esto se corrige el warrning que lanza de error al actualizar despues de campo no valido-->

                <input type="submit" name="sumbit" value="Registrar" />

            </form>
            <?php borrarErrores(); ?>
             
        </div>
<h3 id="registerbtn" class="h3bloq showmenu">Registrate<i class="far fa-clipboard"></i></h3>
    <?php endif; ?>
</aside>