<?php

include ('salidas-server.php');

?>


<!DOCTYPE html>
<html lang="en">
   
    <script language="JavaScript">
        function pregunta(){
            if (confirm('¿Estas seguro de eliminar este registro?')){
               document.tuformulario.submit()
            }
        }
        function recargar(){


        document.location.href = document.location.href;

        }
    </script>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Productos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
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
            <a class="navbar-brand" href="http://www.tecnocars.co">
                    <img src="http://www.tecnocars.co/wp-content/uploads/2018/10/logo-tecno.png" width="200"  class="d-inline-block align-center" alt="">
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
                  <li class="nav-item">
                    <a class="nav-link" href="entradas.php">Ingresos</a>
                  </li>
                  <li class="nav-item  active">
                    <a class="nav-link " href="salidas.php">Egresos<span class="sr-only">(current)</span></a>
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
            <h1>Bienvenido 
                <?php 

                   // echo $usuarioP;
            
                ?>
                
            </h1>
        </section>

        
                    
                    <?php
                    //obtener categorías
                    class ObtenerClientesClass extends DB{
                            


                            public function obtenerClientes(){
                                
                                $query = $this->connect()->prepare('SELECT * FROM clientes ORDER BY nombre');
                                $query->execute();
                                $clientes = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($clientes as $cliente){
                                    echo '<option value="'.$cliente[documento].'">'.$cliente[nombre].'</option>';

                               
                                }
                                
                            }
                        
                        } 


                    //Obtención de la tabla de productos
                    //Más su páginación
                    

                        ?>
                    

            
              
    <div class="row">
        <div class="col">
          <! – Ingresar registro información — >
            <form id="form1" method="post" style="width:600px; margin:20px;" enctype="multipart/form-data">
                <div class="form-group">
                            <label for="seleccionarCliente">Seleccionar cliente</label>
                            <select id="seleccionarCliente" class="form-control" name="clienteR">
                            <option value="<?php echo $clienteR ?>">Seleccione clientes:</option>   
        <!--------------------------------------Obtener empresas--------------->
                        <?php
                            

                        $obtenerClientesClass = new obtenerClientesClass;
                        $obtenerClientes=$obtenerClientesClass->obtenerClientes();             
                        
                    ?>
                <!--------------------------------Fin obtener empresas----------------->
                            
                            </select>

                        </div>
                        <label for="productosR">Productos</label>
                        <div class="form-group" id="divProductos">    
                            <div class="row">
                                <div class="col">
                                  ID
                                </div>
                                <div class="col">
                                 Descripción
                                </div>
                                <div class="col">
                                  Cantidad
                                </div>
                                <div class="col">
                                  Precio
                                </div>
                                <div class="col">
                                  Remover
                                </div>
                            </div>
                            </br>
                        </div>

                        <div class="form-group">
                            <input type="hidden" id="idR" class="form-control" value="<?php echo $idR ?>" name="idR" placeholder="Ingrese id">
                        </div>
                        <div class="form-group">
                        <label for="myDias">Días(Mínimo 5 días)</label>
                            <input type="number" id="myDias" min="5" class="form-control" value="5" required>
                        </div>
                        <div class="form-group">
                        <label for="precioRA">Total</label>
                            <p id="precioRA" class="form-control" name="precioRA">0</p>
                        </div>               

                    <button type="submit" class="btn btn-success" <?php echo $accionAgregar ?> name="accion" value="btnAgregar">Guardar</button> 
                    <button type="submit" class="btn btn-primary" <?php echo $accionModificar ?> name="accion" value="btnModificar">Modificar</button> 
                    <button type="submit" onclick="return Confirmar('¿Desea eliminar el producto?');" class="btn btn-danger" <?php echo $accionEliminar ?> name="accion" value="btnEliminar">Eliminar</button> 
                    <button type="submit" class="btn btn-warning" <?php echo $accionCancelar ?> name="accion" value="btnCancelar">Cancelar</button>

              
            </form>
        </div>
        <div class="col">
         <! – tabla registro información — >
        <script language="JavaScript">
    
        $(document).ready(function() {
            $('#tbDatos').DataTable( {
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
        
        <table id="tbDatos" class="table table-striped table-bordered" style="width:80%">
        <thead class="thead-dark">
            <tr>
                <td>Id</td>
                <td>Código</td>
                <td>Descripción</td>
                <td>Stock</td>
                <td>Precio</td>
                <td>Agregar</td>
            </tr>
        </thead>
        
        <?php foreach($listaProductos as $producto){ ?>
                <tr>

                    <td><?php echo $producto['id'];?></td>
                    <td><?php echo $producto['codigo'];?></td>
                    <td><?php echo $producto['descripcion'];?></td>          
                    <td><?php echo $producto['stock'];?></td>
                    <td><?php echo $producto['precio_venta'];?></td>
                    
                        
                    <td>
                        
                        <form method="post" name="formProductos">
                            <input type="hidden" id="descripcionR<?php echo $producto['id'];?>" name="descripcionR" value="<?php echo $producto['descripcion'];?>">
                            <input type="hidden" id="idR<?php echo $producto['id'];?>" name="idR" value="<?php echo $producto['id']?>">
                            <input type="hidden" id="codigoR<?php echo $producto['id'];?>"name="codigoR" value="<?php echo $producto['codigo'];?>">
                            <input type="hidden" id="stockR<?php echo $producto['id'];?>"name="stockR" value="<?php echo $producto['stock'];?>">
                            <input type="hidden" id="precioR<?php echo $producto['id'];?>" name="precioR" value="<?php echo $producto['precio_venta'];?>">
                            <input type="hidden" name="fecha_registroR" value="<?php echo $producto['fecha'];?>">
                            <div class="row">
                                <div class="col">
                                    <input type="number" id="cantidadR<?php echo $producto['id'];?>" name="cantidadR" style="width:100%" value="1" max="<?php echo $producto['stock'];?>">
                                </div>
                                <div class="col">
                                     <input type="button" class="btn btn-success" id="btAdd" value="+" onclick="agregarProductos('<?php echo $producto['id'];?>','<?php echo $producto['descripcion'];?>','<?php echo $producto['precio_venta'];?>','<?php echo $producto['stock'];?>',$('#cantidadR<?php echo $producto['id'];?>').val());"/>
                                </div>
                            </div>
                            


                            <div id="resultado"></div>
                    
                            
                            
                            <input type="button" id="btRemove" onclick="agregarVenta();" value="Agregar venta" class="bt" />
                        </form>                      

                    </td>
                </tr>
            
                                                        
                         <?php } ?>
            
                </table>
        </div>
    </div>

        
        <script>
                var primer =true;
                var cadenaTotal="";
                var cadenaUnit="";
                var datosJson="";
                var precioP=0;
                var diasP=0;
                var idP="";
                var descripcionP="";
                var cantidadP=0;
                var stockP=0;
                var nuevoStock=0;
                var idProducto="";
                var descripcionProducto="";
                var stockProducto="";
                var cantidadProducto="";
                var precioProducto="";
                var totalP=0;
                var totalPMostrar=0;
                var datosOperaciones="";
                var datosJsonOperaciones="";
                var jsonPrueba="";
                
                console.log(primer);
                
               function Confirmar(mensaje){
                    return (confirm(mensaje))?true:false;
               }
            function agregarProductos(id,descripcion,precio,stock,cantidad) {
                    idP=id;
                    descripcionP=descripcion;
                    cantidadP=Number(cantidad);
                    stockP=Number(stock);
                    precioP=Number(precio);
                    nuevoStock=stockP-cantidadP;

                    console.log(nuevoStock);
                    console.log(precioP);
                    console.log(stockP);
                    console.log(cantidadP);


                    //codificación cadena json

                    idProducto='"id":'+id;
                    descripcionProducto='"descripcion":'+'"'+descripcion+'"';
                    stockProducto='"stock":'+nuevoStock;
                    cantidadProducto='"cantidad":'+cantidad;
                    precioProducto='"precio_venta":'+'"'+precio+'"';

                    //COMPARAMOS QUE LA CANTIDAD NO EXCEDA EL STOCK
                    if(stockP>=cantidadP){
                        cadenaUnit='{'+idProducto+','+descripcionProducto+','+cantidadProducto+','+stockProducto+','+precioProducto+'}'
                        datosProductos='['+cadenaUnit+']';
                        datosJsonProductos=JSON.parse(datosProductos);
                        console.log(datosJsonProductos.length);
                        console.log(cadenaUnit);
                        if(Number($('#nbtn'+id).val())!=Number(idP)){
                            for (var i = 0; i < datosJsonProductos.length; i++) {
                    //CREAMOS LOS ELEMENTOS QUE VAMOS A MOSTRAR 
                            const newDiv = document.createElement("div");
                            const myDivId = document.createElement('div');
                            const myDivDescripcion = document.createElement('div');
                            const myDivCantidad = document.createElement('div');
                            const myDivPrecio = document.createElement('div');
                            const myBtnDiv = document.createElement('div');
                            const myBtnQuitar = document.createElement('button');
                        //ACA SE LE AÑADEN LOS DATOS QUE VAN A CONTENER
                            myDivId.textContent = datosJsonProductos[i].id;
                            myDivDescripcion.textContent = datosJsonProductos[i].descripcion;
                            myDivCantidad.textContent = datosJsonProductos[i].cantidad;
                            myDivPrecio.textContent = datosJsonProductos[i].precio_venta;
                            myBtnQuitar.textContent = "-";
                        //ACA LE ESTABLECEMOS EL ID Y LA CLASE A CADA ELEMENTO
                            myDivId.id = "nId"+id;
                            myDivDescripcion.id = "nDescripcion"+id;
                            myDivCantidad.id = "nCantidad"+id;
                            myDivPrecio.id = "nPrecio"+id;
                            myBtnDiv.id = "nbtnDiv"+id;
                            myBtnQuitar.id = "nbtn"+id;

                            myDivId.className += " col-sm";
                            myDivDescripcion.className += " col-sm";
                            myDivCantidad.className += "col-sm";
                            myDivPrecio.className += "col-sm";
                            myBtnDiv.className += "col-sm";
                            myBtnQuitar.className += "btn btn-danger";
                            newDiv.className += "row";
                            //ACA LE ESTABLECEMOS LOS ATRIBUTOS AL BOTON QUITAR ELEMENTO
                            newDiv.setAttribute("style", "margin-bottom:20px");
                            myBtnQuitar.setAttribute("type", "button");
                            myBtnQuitar.setAttribute("value", id);  
                            myBtnQuitar.setAttribute("onclick", "quitarProductos($('#nbtn"+id+"').val());");
                            

                            //CON APPENDCHILD LE DECIMOS A QUE ELEMNTO QUEREMOS QUE PERTENEZCA NUESTROS ELEMENTOS CREADOS
                             newDiv.appendChild(myDivId);
                             newDiv.appendChild(myDivDescripcion);
                             newDiv.appendChild(myDivCantidad);
                             newDiv.appendChild(myDivPrecio);
                             newDiv.appendChild(myBtnDiv);
                             myBtnDiv.appendChild(myBtnQuitar);

                             //ACA ESTABLECEMOS QUE EL ELEMENTO PADRE NEW DIV SE MOSTRARA EN EL DIV IDENTIFICADO COMO id="divProductos"
                             var currentDiv = document.getElementById("divProductos"); 
                             currentDiv.appendChild(newDiv);


                        }
                            


                    //CADENA JSON FINAL PARA HACER EL TRABAJO DE EJECUTAR EN LA BD
                            if(primer){
                                cadenaTotal='{'+idProducto+','+descripcionProducto+','+cantidadProducto+','+stockProducto+','+precioProducto+'}'
                                primer=false;
                                
                            }else{
                                cadenaTotal =cadenaTotal+',{'+idProducto+','+descripcionProducto+','+cantidadProducto+','+stockProducto+','+precioProducto+'}';
                            }

        //OPERACIONES AUTOMATICAS AL AGREGAR PRODUCTOS
                            datosOperaciones='{"data":['+cadenaTotal+']}';
                            datosJsonOperaciones=JSON.parse(datosOperaciones);
                            diasP=Number($('#myDias').val());
                            for (var i = 0; i < datosJsonOperaciones.data.length; i++) {
                                cantidadP=datosJsonOperaciones.data[i].cantidad;
                                precioP=datosJsonOperaciones.data[i].precio_venta;
                                totalP=totalP+(cantidadP*precioP);
                                totalPMostrar=totalP;
                                document.getElementById("precioRA").innerHTML = totalP*diasP;
                            }
                            console.log(datosJsonOperaciones);
                            totalP=0;
                            jsonPrueba=Array.from(datosJsonOperaciones.data);
                            }

                        

                    }else{
                        window.alert("Cantidad de productos excede al stock en bodega");
                    }

                     
                }
                function agregarVenta() {


                    datos='['+cadenaTotal+']';
                    datosJson=JSON.parse(datos);
                    console.log(datosJson.length);
                    var parametros = {"Informacion":datos};
                                $.ajax({
                                    data:parametros,
                                    url:'salidas-server.php',
                                    type: 'post',
                                    beforeSend: function () {
                                        $("#resultado").html("Procesando, espere por favor");
                                    },
                                    success: function (response) {   
                                        $("#resultado").html(response);
                                    }
                                });
                     
                }

                
                //Funcion que hace calculo automatico
                document.getElementById("myDias").addEventListener("input", function(){
                    diasP=Number($('#myDias').val());
                    console.log(diasP+" son estos dias");
                    console.log(precioP+" es este precio");
                    console.log(cantidadP+" es este cantidad");
                document.getElementById("precioRA").innerHTML = diasP*totalPMostrar;
                }); 

                //FUNCION QUITAR PRODUCTOS

                function quitarProductos(idQuitar) {
                    var idQ=Number(idQuitar);
                    $("#nId"+idQ).remove();
                    $("#nDescripcion"+idQ).remove();
                    $("#nCantidad"+idQ).remove();
                    $("#nPrecio"+idQ).remove();
                    $("#nbtnDiv"+idQ).remove();
                    $("#nbtn"+idQ).remove();
                    console.log(jsonPrueba);//json con su elemento
                    eliminarPorName(idQ);
                    console.log(jsonPrueba);//json sin su elemento      

                }

                function eliminarPorName(idborrar){
                    jsonPrueba.forEach(function(currentValue, index, arr){
                        console.log("array");
                        console.log(jsonPrueba[index].id);
                        console.log("id borrar");
                        console.log(idborrar);
                    if(jsonPrueba[index].id==idborrar){
                        console.log(index);
                        console.log("soy juan");
                        jsonPrueba.splice(index, 1);     
                    }
                  })
                }

                                                 
                    

            </script>

        <footer class="footerP">
               <div class="container text-center">© 2020 Desarrollado por:
          <!-- Copyright -->
            <p><a href="http://jeltex.co/"  style="color:white" >Jeltex</a></p>
          <!-- Copyright -->
            </div>
        </footer>
        
        
        
    </body>
</html>