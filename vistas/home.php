<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="d-flex flex-column">

    <?php   
        $usuarioIn=$user->getNombre();
    ?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" > 
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" > 
            <a class="navbar-brand" href="#">
                    <img src="./images/alquileresla27.png" width="200"  class="d-inline-block align-center" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="vistas/productos.php">Productos<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="vistas/entradas.php">Ingresos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="vistas/salidas.php">Egresos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="vistas/clientes">Clientes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="vistas/categorias.php">Categorias</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  
                  <a class="btn btn-outline-danger my-2 my-sm-0" href="includes/logout.php">Cerrar sesión</a>
                  
                </form>
            </div>
        </nav>
            
            
            

    </header>
    

    <section>
        <br>
        <h1>Bienvenido 
            <?php 
            echo $user->getNombre(); 
            



            ?>
            
        </h1>
    </section>

    

    <!-- Footer -->
    <footer id="footerP" class="py-4 text-white bg-dark">
        <div class="container text-center">© 2020 Desarrollado por:
          <!-- Copyright -->
            <p><a href="http://jeltex.co/"  class="text-white bg-dark" >Jeltex</a></p>
          <!-- Copyright -->
        </div>
     </footer>
<!-- Footer -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>