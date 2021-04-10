<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php';?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="icon.png">
        <title>Games News</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/header.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/forms-lateral-buttons.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/content.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>    
        <script src="https://kit.fontawesome.com/94235d9528.js"></script>
    </head>
<body>

    <div id="particles-js"></div>
  
    <header id="header">
        <div id="logo">
            <a href="index.php">Games News</a>
        </div>
       
        <nav id="menu">
            <input id="check" type="checkbox">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars" ></i>
            </label>
            <ul>
               <li>
                   <a class="active" href="index.php" >Main</a>
               </li> 
                    <?php 
                        $categorias = conseguirCategorias($db);
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
                   <a class="active" href="mailto:ulisesvil5@hotmail.com" >Contact</a>
               </li>
            </ul>
        </nav>
       <div class="clearfix"></div>
    </header>
    <div id="contenedor">