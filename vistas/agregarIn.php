<?php
$informacionR = (isset($_POST['Informacion']))?$_POST['Informacion']:"";//Vector con todos los productos
    $productosR = (isset($_POST['productosR']))?$_POST['productosR']:"";
    $categoriaR = (isset($_POST['categoriaR']))?$_POST['categoriaR']:"";
    $descripcionR = (isset($_POST['descripcionR']))?$_POST['descripcionR']:"";
    $diasR = 5;
    $codigoR = (isset($_POST['codigoR']))?$_POST['codigoR']:"";
    $codigoInR = (isset($_POST['codigoInR']))?$_POST['codigoInR']:"";
    $clienteR = (isset($_POST['clienteR']))?$_POST['clienteR']:"";
    $idR = (isset($_POST['idR']))?$_POST['idR']:"";
    $cantidadR = (isset($_POST['cantidadR']))?$_POST['cantidadR']:"";
    $stockR = (isset($_POST['stockR']))?$_POST['stockR']:"";
    $precioRA = (isset($_POST['precioRA']))?$_POST['precioRA']:"";
    $fecha_registroR= (isset($_POST['fechaR']))?$_POST['fechaR']:"";
    $registroProductos=json_encode($informacionR);
    $cadenaProductos=json_decode(json_encode($informacionR), true);




    include ('..//conexion/conexion.php');

    $sentencia=$pdo1->prepare('SELECT * FROM ventas WHERE codigo=:codigoInR AND id_cliente=:id_cliente');
    $sentencia->bindParam(':codigoInR',$codigoInR);
    $sentencia->bindParam(':id_cliente',$clienteR);
    $sentencia->execute();
    $codigoList = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    foreach($codigoList as $productolist){ 
        $listado=json_decode($productolist['productos'], true);
    }
    echo "listado";
    var_dump($listado);
        echo "cadenaProductos";
        var_dump($cadenaProductos);
       

    if($codigoList!=null){
        if(empty($informacionR)||empty($clienteR)||empty($diasR)||empty($codigoR)||empty($precioRA)){
        echo "<div class='alert alert-danger'>Alguno de los campos están vacíos</div>";                        
    }else{

        if (is_array($cadenaProductos) || is_object($cadenaProductos)){
            //$nListado="";
            foreach($listado as $list){
                foreach($cadenaProductos as $productoCad){
                    if($productoCad['id']==$list['id']){
                        $list['cantidad']=$list['cantidad']-$productoCad['cantidad'];
                    }
                }
                //$nListado=$nListado+$list;
            }
            $nuevoListado=json_encode($nListado);

            $sentencia=$pdo1->prepare('UPDATE ventas SET
            productos=:productos, 
            fecha_e=:fecha WHERE 
            codigo=:codigoInR AND id_cliente=:id_cliente');
            
            $sentencia->bindParam(':codigoInR',$codigoInR);
            $sentencia->bindParam(':id_cliente',$clienteR);
            $sentencia->bindParam(':productos',$nuevoListado);
            $sentencia->bindParam(':fecha',$fecha_registroR);
            $sentencia->execute();


            foreach($cadenaProductos as $producto){


               $sentencia=$pdo1->prepare('UPDATE productos SET
                stock=:stock, 
                fecha=:fecha WHERE 
                id=:id');

                $sentencia->bindParam(':id', $producto['id']);
                $sentencia->bindParam(':stock',$producto['stock']);
                $sentencia->bindParam(':fecha',$fecha_registroR);
                $sentencia->execute();
            }
            $sentencia=$pdo1->prepare('INSERT INTO entradas(codigo,id_cliente, productos, neto, total, fecha_e) VALUES (:codigo,:id_cliente,:productos,:neto,:total,:fecha_e)');

            $sentencia->bindParam(':codigo',$codigoR);
            $sentencia->bindParam(':id_cliente',$clienteR);
            $sentencia->bindParam(':productos',$registroProductos);
            $sentencia->bindParam(':neto',$diasR);
            $sentencia->bindParam(':total',$precioRA);
            $sentencia->bindParam(':fecha_e',$fecha_registroR);
            $sentencia->execute();

            ?> 

            <!--<script type="text/javascript"> location.reload();</script> --> <?php 

        }else{
            echo "<div class='alert alert-danger'>Debe agregar productos</div>";                         
        }
                    
                             
    }


    }else{
        echo "<div class='alert alert-danger'>Código de salida y cliente no coinciden, por favor verifique</div>";
    }


    
?>