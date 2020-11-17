<?php
    
    $informacionR = (isset($_POST['Informacion']))?$_POST['Informacion']:"";
    $productosR = (isset($_POST['productosR']))?$_POST['productosR']:"";//Vector con todos los productos
    $categoriaR = (isset($_POST['categoriaR']))?$_POST['categoriaR']:"";
    $descripcionR = (isset($_POST['descripcionR']))?$_POST['descripcionR']:"";
    $diasR = 5;
    $codigoR = (isset($_POST['codigoR']))?$_POST['codigoR']:"";
    $clienteR = (isset($_POST['clienteR']))?$_POST['clienteR']:"";
    $idR = (isset($_POST['idR']))?$_POST['idR']:"";
    $cantidadR = (isset($_POST['cantidadR']))?$_POST['cantidadR']:"";
    $stockR = (isset($_POST['stockR']))?$_POST['stockR']:"";
    $precioRA = (isset($_POST['precioRA']))?$_POST['precioRA']:"";
    $fecha_registroR= (isset($_POST['fechaR']))?$_POST['fechaR']:"";
    $fecha_registroR= date("Y-m-d");
    
    include ('..//conexion/conexion.php');

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $accionAgregar="";
    $accionModificar=$accionEliminar=$accionCancelar="disabled";

    $mostrarModal=false;



    $sentencia=$pdo1->prepare('SELECT * FROM productos ORDER BY descripcion');
    $sentencia->execute();
    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $producto = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    $sentencia=$pdo1->prepare('SELECT * FROM entradas INNER JOIN clientes ON clientes.documento = entradas.id_cliente');
    $sentencia->execute();
    $listaEntradas = $sentencia->fetchAll(PDO::FETCH_ASSOC);



?>