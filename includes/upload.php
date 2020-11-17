<?php
    //var_dump($_FILES["file"]);
    
    $directorio = "archivos/";

    $archivo = $directorio . basename($_FILES["archivoR"]["name"]);

    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    
    //var_dump($size);

    

            //validar tipo de imagen
            if($tipoArchivo == "pdf" || $tipoArchivo == "PDF"){
                // se validó el archivo correctamente
                if(move_uploaded_file($_FILES["archivoR"]["tmp_name"], $archivo)){
                    echo "El archivo se subió correctamente";
                }else{
                    echo "Hubo un error en la subida del archivo";
                }
            }else{
                echo "Solo se admiten archivos pdf";
            }
        
?>