<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form action="" method="POST">
        <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <h2>Iniciar sesión</h2>

        <p>Nombre de usuario:</p>
            <div class="field-container">
                <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>
                <input name="usuario" type="text" class="field" placeholder="Ingrese usuario"> <br/>
            </div>

            <p>Contraseña:</p>
            <div class="field-container">
                <i class="fa fa-key fa-lg" aria-hidden="true"></i>
                <input name="password" type="password" class="field" placeholder="*******"> <br/>
            </div>
       
        <p class="center-content"><input type="submit" class="btn btn-green" value="Iniciar Sesión"></p>
    </form>
</body>
</html>