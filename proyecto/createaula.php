<?php

    session_start();
    session_set_cookie_params(120);

    if($_SESSION['admin']!="Administrador"){
        echo "<script> alert ('Debe ser admin para acceder a esta página') 
        window.location='http://antonio.thsite.top/crud/gestion/incidencias.php'</script>";
    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR AULA | PROYECTO</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class='caja'>
        <h1>
            Crear aula
        </h1>

        <div>
            <form action="#" method="post" id="formu">
            <label for="">Nombre</label>
            <input type="text" name='nombre' placeholder='Ej.:Aula X' > <br>
            <label for="">Planta</label>
            <input type="text" name='planta' placeholder='Ej.:Baja' > <br>
            <button name="submit" type="submit" class="myButton" >Crear</button>
            </form>
        </div>
        <label for="" id="mensaje" class=''></label>
    </div>

</body>
</html>

<?php
        //Conexión a base de datos mediante PDO

        if ($_SERVER['REQUEST_METHOD'] == "POST"){

            $nombre=htmlspecialchars($_POST['nombre']);
            $planta=htmlspecialchars($_POST['planta']);

            

            if($nombre==null OR $planta==null){
                echo "<script> document.getElementById('mensaje').innerHTML='Todos los campos son obligatorios'
                document.getElementById('mensaje').className='error'</script>";
            } else{

                $showMessages = false;

                include "conexion.php";

                //echo $_SESSION['admin'];
        
                header("Content-type:text/html;charset=utf-8");

                $comprobar = "SELECT nombre FROM aulas WHERE nombre='$nombre'";
                $result = $conn->query($comprobar);

                
                if ($result->rowCount() < 1) {
                    // Mira si el usuario ha sido registrado


                    /*insert*/

                    $insert = "INSERT INTO aulas (nombre,planta) VALUES('$nombre','$planta')";
                    $resultado = $conn->query($insert);


                    echo "<script> document.getElementById('mensaje').innerHTML='Aula creada correctamente';
                    document.getElementById('mensaje').className='acierto'</script>";

                } else {
                    echo "<script> document.getElementById('mensaje').innerHTML='Aula ya existente'
                    document.getElementById('mensaje').className='error'</script>";
                }
            $conn->close();
            }
        }
?>