<?php

include ('entradas-server.php');

$idR = (isset($_POST['idR']))?$_POST['idR']:"";

switch ($accion) {
       
        case 'btnEliminar':

        $sentencia=$pdo1->prepare('DELETE FROM entradas WHERE 
            id_e=:id_e');

        $sentencia->bindParam(':id_e',$idR);
        $sentencia->execute();

        header('Location: RegistroIngresos.php');
            # code...
        
            break;
    }

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registro de Entradas</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../jsPDF/dist/jspdf.min.js"></script>
    <script src="../jsPDF/dist/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


     <!-- Latest compiled and minified CSS -->




    </head>
    <body>
        <?php 

            include_once '../includes/user.php';
            
            include_once '../includes/user_session.php';
            //include '..//includes/db.php';

            $userSession = new UserSession();
            $user = new User();
            $usuarioIni=$user->setUser($userSession->getCurrentUser());
            $usuarioP = $user->getNombre();
            //$usuarioIni=($_GET['usuarioIn']);
        ?>
        <header>
                
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark" > 
            <a class="navbar-brand" href="#">
                    <img src="../images/alquileresla27.png" width="200"  class="d-inline-block align-center" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="../index.php">Inicio </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="productos.php">Productos</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="entradas.php">Ingresos<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="salidas.php">Egresos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="clientes.php">Clientes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categorias.php">Categorias</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  
                  <a class="btn btn-outline-danger my-2 my-sm-0" href="../includes/logout.php">Cerrar sesión</a>
                  
                </form>
            </div>
        </nav>

            </header>
        

        <section>
            <br>
            <h1>Registro de ingresos
                <?php 

                   // echo $usuarioP;
            
                ?>
                
            </h1>
        </section>

        
         <! – tabla registro información — >
        <script language="JavaScript">
    
        $(document).ready(function() {
            $('#tbClientes').DataTable( {
                "language": {
                    
                    "decimal":        "",
                    "emptyTable":     "Tabla vacía",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 Registros",
                    "infoFiltered":   "(filtered de _MAX_ total Registros)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrando _MENU_ Registros",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "search":         "Buscar:",
                    "zeroRecords":    "No se encontró ningun registro",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "aria": {
                        "sortAscending":  ": Activar para ordenar columna ascendentemente",
                        "sortDescending": ": Activar para ordenar columna descendentemente"
                    }
                }
            } );
        } );
        </script> 
        
        <table id="tbClientes" class="table table-striped table-bordered" style="width:80%">
        <thead class="thead-dark">
            <tr>
                <td>Id</td>
                <td>Código</td>
                <td>Cliente</td>
                <td>Fecha</td>
                <td>Agregar</td>
            </tr>
        </thead>
        
        <?php foreach($listaEntradas as $producto){ ?>
                <tr>

                    <td><?php echo $producto['id'];?></td>
                    <td><?php echo $producto['codigo'];?></td>
                    <td><?php echo $producto['nombre'];?></td>          
                    <td><?php echo $producto['fecha_e'];?></td>
                    
                        
                    <td>
                        
                        <form method="post" name="formProductos">
                            <input type="hidden" id="descripcionR<?php echo $producto['id_e'];?>" name="descripcionR" value="<?php echo $producto['descripcion'];?>">
                            <input type="hidden" id="idR<?php echo $producto['id_e'];?>" name="idR" value="<?php echo $producto['id_e']?>">
                            <input type="hidden" id="codigoR<?php echo $producto['id_e'];?>" name="codigoR" value="<?php echo $producto['codigo'];?>">
                            <input type="hidden" id="stockR<?php echo $producto['id_e'];?>" name="stockR" value="<?php echo $producto['id_cliente'];?>">
                            <input type="hidden" id="productoR<?php echo $producto['id_e'];?>" name="productoR" value='<?php echo stripslashes ($producto["productos"]);?>'>
                            <input type="hidden" id="precioR<?php echo $producto['id_e'];?>" name="precioR" value="<?php echo $producto['total'];?>">
                            <input type="hidden" name="fecha_registroR" value="<?php echo $producto['fecha'];?>">
                            
                                <div class="col">
                                     <input type="button" class="btn btn-success" id="btAdd" value="PDF" onclick="agregar('<?php echo $producto["documento"];?>','<?php echo $producto["codigo"];?>','<?php echo $producto["nombre"];?>','<?php echo $producto["neto"];?>','<?php echo $producto["total"];?>',$('#productoR<?php echo $producto['id_e'];?>').val(),'<?php echo $producto["telefono"];?>','<?php echo $producto["direccion"];?>','<?php echo $producto["fecha_e"];?>');"/>
                                     <button type="submit" onclick="return Confirmar('¿Desea eliminar el producto?');" class="btn btn-danger" name="accion" value="btnEliminar">Eliminar</button>
                                </div>
                                
                            
                            


                            
                    
                            
                        </form>                      

                    </td>
                </tr>
            
                                                        
                         <?php } ?>
            
                </table>


        <footer class="footerP">
               <div class="container text-center">© 2020 Desarrollado por:
          <!-- Copyright -->
            <p><a href="http://jeltex.co/"  style="color:white" >Jeltex</a></p>
          <!-- Copyright -->
        </footer>
        
        <script type="text/javascript">
            var idPDF="";
            var codigoPDF="";
            var nombrePDF="";
            var netoPDF="";
            var totalPDF="";
            var productosPDF="";
            var telefonoPDF="";
            var direccionPDF="";
            var fechaPDF="";

            
            function agregar(id, codigo, nombre, neto, total, productos, telefono, direccion, fecha) {
                
                idPDF=id;
                codigoPDF=codigo;
                nombrePDF=nombre;
                netoPDF=neto;
                totalPDF=total;
                productosPDF=productos;
                telefonoPDF=telefono;
                direccionPDF=direccion;
                fechaPDF=fecha;
                console.log(id,codigo,nombre,neto,total,productosPDF,telefono,direccion);
                crearPDF();
            }
            function crearPDF() {
                var doc = new jsPDF();
                


                doc.setFontSize(22);
                doc.text(120, 20, 'Registro de entrada');

                doc.setFontSize(12);
                doc.text(20, 20, 'ALQUILERES LA 27 - NIT:30208908-3');
                doc.setFontSize(10);
                doc.text(20, 25, 'Calle 4 No 27-16 Aguachica, Cesar - Cel: 318 2549265');

                doc.setFontSize(10);
                doc.text(20, 30, 'Fecha: '+ fechaPDF);

                doc.setFontSize(16);
                doc.text(20, 40, 'Ingresos/Entradas No Documento: '+codigoPDF );

                doc.setFontSize(10);
                doc.text(20, 50, 'Nombre: '+nombrePDF+' Cédula: '+idPDF);

                doc.setFontSize(10);
                doc.text(20, 60, 'Teléfono:'+telefonoPDF+' Dirección: '+direccionPDF);

                var columnas = [
                    
                    { header: 'Descripción', dataKey: 'descripcion' },
                    { header: 'Cantidad', dataKey: 'cantidad' },
                    { header: 'Código Producto', dataKey: 'precio_venta' },
                    ];

                datosPDF=JSON.parse(productosPDF);

               
                

                doc.autoTable({
                 body:datosPDF,
                 columns: columnas,
                margin:{ top: 70 }

                }
                );

                doc.save('Test.pdf');
            }

            function Confirmar(mensaje){
                    return (confirm(mensaje))?true:false;
               }
        </script>
        
    </body>
</html>
