<?php
    $categoriaR = (isset($_POST['categoriaR']))?$_POST['categoriaR']:"";
    $fecha_registroR= date("Y-m-d");
    $idCatR = (isset($_POST['idR']))?$_POST['idR']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $accionAgregar="";
    $accionModificar=$accionEliminar=$accionCancelar="disabled";

    $mostrarModal=false;

    include ('..//conexion/conexion.php');
  
  #####----------Cambio  de acciones de los botones por medio de switch-------#######
    switch ($accion) {
        case 'btnAgregar':

        $sentencia=$pdo1->prepare('INSERT INTO categorias(categoria, fecha) VALUES (:categoria,:fecha)');

        $sentencia->bindParam(':categoria',$categoriaR);
        $sentencia->bindParam(':fecha',$fecha_registroR);
        $sentencia->execute();

        header('Location: categorias.php');

            # code...
        #Agregar echo para saber parametros
            break;
        case 'btnModificar':

        $sentencia=$pdo1->prepare('UPDATE categorias SET
            categoria=:categoria, 
            fecha=:fecha WHERE 
            idCat=:idCat');

        $sentencia->bindParam(':categoria',$categoriaR);
        $sentencia->bindParam(':fecha',$fecha_registroR);
        $sentencia->bindParam(':idCat',$idCatR);
        $sentencia->execute();

        header('Location: categorias.php');

            # code...
        echo "Presionaste modificar";
            break;
        case 'btnEliminar':

        $sentencia=$pdo1->prepare('DELETE FROM categorias WHERE 
            idCat=:idCat');

        $sentencia->bindParam(':idCat',$idCatR);
        $sentencia->execute();

        header('Location: categorias.php');
            # code...
        
            break;
        case 'btnCancelar':

        header('Location: categorias.php');
            # code...
            break;
        case 'Seleccionar':
            $accionAgregar="disabled";
            $accionModificar=$accionEliminar=$accionCancelar="";
            $mostrarModal=true;
            # code...
            break;
    }

    $sentencia=$pdo1->prepare('SELECT * FROM categorias');
    $sentencia->execute();
    $listaCategorias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>