<?php
ob_start();
?>

<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php';?> 
<!--una vez hacemos require de helpers o cualquier 
otro archivo en headers tendremos disponibles las funciones 
y variables de los mismos en todo el codigo-->



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proyecto PHP</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
        
<!--JQuery-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        
        <script src="https://kit.fontawesome.com/a076d05399.js""></script>
    </head>
<body>
       <div id="particles-js"></div>
  
   <!-- CABECERA -->
   <header id="cabecera">
       <!-- LOGO -->
       <div id="logo">
           <a href="index.php" >
               Games News
           </a>
           
       </div>
       
       <!-- MENU -->
       
       <nav id="menu">
          <input id="check" type="checkbox">
               <label for="check" class="checkbtn">
                   <i class="fas fa-bars" ></i>
               </label>
           <ul>
               
               
               
               <li>
                   <a class="active" href="index.php" >Inicio</a>
               </li> 
               
               <?php 
                    $categorias = conseguirCategorias($db);
                    //var_dump($db);
                    if(!empty($categorias)):
                        while($categoria = mysqli_fetch_assoc($categorias)):
                ?>
                    <li>   
                        <a class="active" href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                    </li>
                    
               <?php 
                        endwhile; 
                    endif;
                ?>
                    
                <li>   
                   <a class="active" href="" >Sobre mi</a>
               </li>
                <li>   
                   <a class="active" href="" >Contacto</a>
               </li>
           </ul>
       </nav>
        
       <div class="clearfix"></div> <!--este div es para que borre los flotados-->
       
   </header>


   <div id="contenedor">











