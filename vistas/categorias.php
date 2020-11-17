<?php

    include ('categorias-server.php');

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
        <title>Categorias</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
                  <li class="nav-item">
                    <a class="nav-link" href="entradas.php">Ingresos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="salidas.php">Egresos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="clientes.php">Clientes</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="categorias.php">Categorias<span class="sr-only">(current)</span></a>
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

        <section  class="wrapper">
            <section class="main">
                    
                    
<! – Ingresar registro información — >
        
    <section class=ingresarInfo>
    
        <form id="form_ingresar" method="post" style="width:600px; margin:20px;" enctype="multipart/form-data">

                    <!-- Button trigger modal -->
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Agregar categoria +
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                        <div class="form-group">    
                        <label for="categoriaR">Nombre</label>
                            <input type="text" id="categoriaR" class="form-control" value="<?php echo $categoriaR ?>" name="categoriaR" placeholder="Ingrese categoria" required>
                        </div>
                        <div class="form-group">    
                            <input type="hidden" id="idR" class="form-control" value="<?php echo $idCatR ?>" name="idR" placeholder="Id" required>
                        </div>             
              </div>
              <div class="modal-footer">
                
                    <button type="submit" class="btn btn-success" <?php echo $accionAgregar ?> name="accion" value="btnAgregar">Agregar</button> 
                    <button type="submit" class="btn btn-primary" <?php echo $accionModificar ?> name="accion" value="btnModificar">Modificar</button> 
                    <button type="submit" onclick="return Confirmar('¿Desea eliminar la categoria?');" class="btn btn-danger" <?php echo $accionEliminar ?> name="accion" value="btnEliminar">Eliminar</button> 
                    <button type="submit" class="btn btn-warning" <?php echo $accionCancelar ?> name="accion" value="btnCancelar">Cancelar</button>

              </div>
            </div>
            </div>
            </div>
                                
                    
                    
                    
                        
                        
                    </form>
                </section> 
              

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
    
        <table id="tbDatos" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <td>Id</td>
                <td>Categoría</td>
                <td>Agregado</td>
                <td>Acciones</td>
            </tr>
        </thead>

        <?php foreach($listaCategorias as $categorias){?>
                <tr>
                    <td><?php echo $categorias['idCat'];?></td>
                    <td><?php echo $categorias['categoria'];?></td>                                
                    <td><?php echo $categorias['fecha'];?></td>
                    <td>
                        <form action="" method="post">

                            <input type="hidden" name="idR" value="<?php echo $categorias['idCat']?>">
                            <input type="hidden" name="categoriaR" value="<?php echo $categorias['categoria']?>">
                            <input type="hidden" name="fecha_registroR" value="<?php echo $categorias['fecha']?>">
                            
                            <input type="submit" class="btn btn-primary" value="Seleccionar" name="accion">
                            <button type="submit" class="btn btn-danger" onclick="return Confirmar('¿Desea eliminar la categoria?');" name="accion" value="btnEliminar">Eliminar</button> 


                        </form>
                        

                    </td>
                </tr>
            
                                                        
                         <?php } ?>
            
                </table>
            </section>    
        
        </section>
        <?php if($mostrarModal){ ?>
            <script>
                
                $('#exampleModalLong').modal('show');
                
            </script>
        
        <?php } ?>
        <script>
                
               function Confirmar(mensaje){
                    return (confirm(mensaje))?true:false;
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