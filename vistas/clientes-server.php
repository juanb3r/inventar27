<?php
    $nombreR = (isset($_POST['nombreR']))?$_POST['nombreR']:"";
    $documentoR = (isset($_POST['documentoR']))?$_POST['documentoR']:"";
    $emailR = (isset($_POST['emailR']))?$_POST['emailR']:"";
    $idR = (isset($_POST['idR']))?$_POST['idR']:"";
    $telefonoR = (isset($_POST['telefonoR']))?$_POST['telefonoR']:"";
    $direccionR = (isset($_POST['direccionR']))?$_POST['direccionR']:"";
    $fecha_registroR= date("Y-m-d");

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $accionAgregar="";
    $accionModificar=$accionEliminar=$accionCancelar="disabled";

    $mostrarModal=false;

    include ('..//conexion/conexion.php');
  
  #####----------Cambio  de acciones de los botones por medio de switch-------#######
    switch ($accion) {
        case 'btnAgregar':

        $sentencia=$pdo1->prepare('INSERT INTO clientes(nombre, documento, email, telefono, direccion, fecha) VALUES (:nombre,:documento,:email,:telefono,:direccion, :fecha)');

        $sentencia->bindParam(':nombre',$nombreR);
        $sentencia->bindParam(':documento',$documentoR);
        $sentencia->bindParam(':email',$emailR);
        $sentencia->bindParam(':telefono',$telefonoR);
        $sentencia->bindParam(':direccion',$direccionR);
        $sentencia->bindParam(':fecha',$fecha_registroR);
        $sentencia->execute();

        header('Location: clientes.php');

            # code...
        #Agregar echo para saber parametros
            break;
        case 'btnModificar':

        $sentencia=$pdo1->prepare('UPDATE clientes SET
            nombre=:nombre, 
            documento=:documento, 
            email=:email,
            telefono=:telefono, 
            direccion=:direccion,
            fecha=:fecha WHERE 
            id=:id');

        $sentencia->bindParam(':nombre',$nombreR);
        $sentencia->bindParam(':id',$idR);
        $sentencia->bindParam(':documento',$documentoR);
        $sentencia->bindParam(':email',$emailR);
        $sentencia->bindParam(':telefono',$telefonoR);
        $sentencia->bindParam(':direccion',$direccionR);
        $sentencia->bindParam(':fecha',$fecha_registroR);
        $sentencia->execute();

        header('Location: clientes.php');

            # code...
        echo "Presionaste modificar";
            break;
        case 'btnEliminar':

        $sentencia=$pdo1->prepare('DELETE FROM clientes WHERE 
            id=:id');

        $sentencia->bindParam(':id',$idR);
        $sentencia->execute();

        header('Location: clientes.php');
            # code...
        
            break;
        case 'btnCancelar':

        header('Location: clientes.php');
            # code...
            break;
        case 'Seleccionar':
            $accionAgregar="disabled";
            $accionModificar=$accionEliminar=$accionCancelar="";
            $mostrarModal=true;
            # code...
            break;
    }

    $sentencia=$pdo1->prepare('SELECT * FROM clientes');
    $sentencia->execute();
    $listaClientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>