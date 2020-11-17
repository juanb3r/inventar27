<?php

    $codigoActualizar = (isset($_POST['codigoActualizar']))?$_POST['codigoActualizar']:"";
    $idActualizar = (isset($_POST['idActualizar']))?$_POST['idActualizar']:"";
    $checkInActualizar = (isset($_POST['checkInActualizar']))?$_POST['checkInActualizar']:"";






    include ('..//conexion/conexion.php');

            echo "soy juan";
            echo $codigoActualizar." ".$idActualizar." ".$checkInActualizar;
            $sentencia=$pdo1->prepare('UPDATE ventas SET
            checkIn=:checkIn 
             WHERE 
            codigo=:codigo AND id_cliente=:id_cliente');
            
            $sentencia->bindParam(':codigo',$codigoActualizar);
            $sentencia->bindParam(':id_cliente',$idActualizar);
            $sentencia->bindParam(':checkIn',$checkInActualizar);
            $sentencia->execute();

            header('Location: RegistroSalidas.php');


            



    
?>