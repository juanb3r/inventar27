<?php
    $categoriaR = (isset($_POST['categoriaR']))?$_POST['categoriaR']:"";
    $descripcionR = (isset($_POST['descripcionR']))?$_POST['descripcionR']:"";
    $codigoR = (isset($_POST['codigoR']))?$_POST['codigoR']:"";
    $idR = (isset($_POST['idR']))?$_POST['idR']:"";
    $cantidadR = (isset($_POST['cantidadR']))?$_POST['cantidadR']:"";
    $cantidadRealR = (isset($_POST['cantidadRealR']))?$_POST['cantidadRealR']:"";
    $precioR = (isset($_POST['precioR']))?$_POST['precioR']:"";
    $fecha_registroR= date("Y-m-d");

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $accionAgregar="";
    $accionModificar=$accionEliminar=$accionCancelar="disabled";

    $mostrarModal=false;

    include ('..//conexion/conexion.php');
  
  #####----------Cambio  de acciones de los botones por medio de switch-------#######
    switch ($accion) {
        case 'btnAgregar':

        $sentencia=$pdo1->prepare('INSERT INTO productos(id_categoria, codigo, descripcion, stock,cantidad, precio_venta, fecha) VALUES (:id_categoria,:codigo,:descripcion,:stock,:cantidad,:precio_venta, :fecha)');

        $sentencia->bindParam(':id_categoria',$categoriaR);
        $sentencia->bindParam(':codigo',$codigoR);
        $sentencia->bindParam(':descripcion',$descripcionR);
        $sentencia->bindParam(':stock',$cantidadR);
        $sentencia->bindParam(':cantidad',$cantidadRealR);
        $sentencia->bindParam(':precio_venta',$precioR);
        $sentencia->bindParam(':fecha',$fecha_registroR);
        $sentencia->execute();

        header('Location: productos.php');

            # code...
        #Agregar echo para saber parametros
            break;
        case 'btnModificar':

        $sentencia=$pdo1->prepare('UPDATE productos SET
            id_categoria=:id_categoria, 
            codigo=:codigo, 
            descripcion=:descripcion,
            stock=:stock,
            cantidad=:cantidad, 
            precio_venta=:precio_venta,
            fecha=:fecha WHERE 
            id=:id');

        $sentencia->bindParam(':id_categoria',$categoriaR);
        $sentencia->bindParam(':id',$idR);
        $sentencia->bindParam(':codigo',$codigoR);
        $sentencia->bindParam(':descripcion',$descripcionR);
        $sentencia->bindParam(':stock',$cantidadR);
        $sentencia->bindParam(':cantidad',$cantidadRealR);
        $sentencia->bindParam(':precio_venta',$precioR);
        $sentencia->bindParam(':fecha',$fecha_registroR);
        $sentencia->execute();

        header('Location: productos.php');

            # code...
        echo "Presionaste modificar";
            break;
        case 'btnEliminar':

        $sentencia=$pdo1->prepare('DELETE FROM productos WHERE 
            id=:id');

        $sentencia->bindParam(':id',$idR);
        $sentencia->execute();

        header('Location: productos.php');
            # code...
        
            break;
        case 'btnCancelar':

        header('Location: productos.php');
            # code...
            break;
        case 'Seleccionar':
            $accionAgregar="disabled";
            $accionModificar=$accionEliminar=$accionCancelar="";
            $mostrarModal=true;
            # code...
            break;
    }

    $sentencia=$pdo1->prepare('SELECT * FROM productos INNER JOIN categorias ON categorias.idCat = productos.id_categoria');
    $sentencia->execute();
    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    $sentencia1=$pdo1->prepare('SELECT * FROM ventas INNER JOIN clientes ON  ventas.id_cliente=clientes.documento');
    $sentencia1->execute();
    $productosBuscar = $sentencia1->fetchAll(PDO::FETCH_ASSOC);

?>