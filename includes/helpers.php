<?php
//En este archivo no hacemos session_start por que ya lo hereda 

function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo])&& !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>'; 
    }
 
    return $alerta;
}


function borrarErrores(){
    
    $borrado=false;
            
        /*if(isset($_SESSION['errores'])){
            $_SESSION['errores'] = null;
            $borrado = session_unset(); //en la leccion 195 coloca session_unset($_SESSION['errores']) pero marca error por lo que se corrige solo a session_unset();
        }
        */
        if(isset($_SESSION['errores'])){
		$_SESSION['errores'] = null;
		$borrado = true;
	}
        
         /*if(isset($_SESSION['errores_entrada'])){
            $_SESSION['errores_entrada'] = null;
            $borrado = session_unset(); //en la leccion 195 coloca session_unset($_SESSION['errores']) pero marca error por lo que se corrige solo a session_unset();
        }
        */
        if(isset($_SESSION['errores_entrada'])){
		$_SESSION['errores_entrada'] = null;
                $borrado = true;
	}

        /*if(isset($_SESSION['completado'])){
            $_SESSION['completado'] = null;
            $borrado = session_unset(); //en la leccion 195 coloca session_unset($_SESSION['errores']) pero marca error por lo que se corrige solo a session_unset();
        }
        */
        
        if(isset($_SESSION['completado'])){
		$_SESSION['completado'] = null;
		$borrado = true;
	}
        
    return $borrado;
}


function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    
    $result = array();
    if($categorias && mysqli_num_rows($categorias)>=1){
        $result = $categorias;
    }
    
    return $result;
}

function conseguirCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categorias = mysqli_query($conexion, $sql);
    
    $result = array();
    if($categorias && mysqli_num_rows($categorias)>=1){
        $result = mysqli_fetch_assoc($categorias);
    }
    
    return $result;
}


function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario  FROM entradas e
            INNER JOIN categorias c ON e.categoria_id = c.id
            INNER JOIN usuarios u ON e.usuario_id = u.id
            WHERE e.id= $id";
   
    
    $entrada= mysqli_query($conexion, $sql);

    $resultado=array();
    
    if($entrada && mysqli_num_rows($entrada) >=1 ){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    
    return $resultado;
}



function conseguirEntradas($conexion, $limit=null, $categoria=null, $busqueda=null){
    $sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.id DESC";
                  
    if(!empty($categoria)){
        $sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id WHERE e.categoria_id = $categoria ORDER BY e.id DESC ";
    }
   
    if(!empty($busqueda)){
        $sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id WHERE e.titulo LIKE '%$busqueda%' ORDER BY e.id DESC ";
    }
    
    if($limit){
        $sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.id DESC LIMIT 4";
         //En el video 203 se concatena cada linea de la query
         //pero eso genera error.
        //$sql = $sql."LIMIT 4";
        //$sql .="LIMIT 4";
    }
         
    $entradas = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
        $numero = 1; //se utilizo para revisar el estado de las variables por el error de la query
    }else{
        $numero=2;//se utilizo para revisar el estado de las variables por el error de la query
    }
    return $entradas;
}


function conseguirComentarios($conexion, $id){
    
    $sql="SELECT c.*, e.titulo AS 'entrada', CONCAT(u.nombre, ' ', u.apellidos) AS usuario FROM comments c "
            . "INNER JOIN entradas e ON c.entrada_id = e.id "
            . "INNER JOIN usuarios u ON c.usuario_id = u.id "
            . "WHERE c.entrada_id= $id "
            . "ORDER BY c.id DESC";
    
             
    $comments = mysqli_query($conexion, $sql);
    $resultado = array();
    
    if($comments && mysqli_num_rows($comments) >= 1){
        $resultado = $comments;
        $numero = 1; //se utilizo para revisar el estado de las variables por el error de la query
    }else{
        $numero=2;//se utilizo para revisar el estado de las variables por el error de la query
    }
    return $comments;
}



function conseguirComentario($conexion, $id){
    
    $sql="SELECT c.*, e.titulo AS 'entrada', e.descripcion AS 'descripcion', "
            . "e.fecha AS 'fecha', e.categoria_id AS 'categoria_id',"
            . "ca.nombre AS 'categoria', "
            . "CONCAT(u.nombre, ' ', u.apellidos) AS usuario FROM comments c "
            . "INNER JOIN entradas e ON c.entrada_id = e.id "
            . "INNER JOIN usuarios u ON c.usuario_id = u.id "
            . "INNER JOIN categorias ca ON e.categoria_id = ca.id "
            . "WHERE c.id= $id ";
    
             
    $commentInd = mysqli_query($conexion, $sql);
    $resultado = array();
    
    if($commentInd && mysqli_num_rows($commentInd) >= 1){
        $resultado = mysqli_fetch_assoc($commentInd);
        $numero = 1; //se utilizo para revisar el estado de las variables por el error de la query
    }else{
        $numero=2;//se utilizo para revisar el estado de las variables por el error de la query
    }
    return $resultado;
}



?>