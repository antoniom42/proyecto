<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="#">Features</a>
        <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a>
        </div>
    </div>
    </nav>

    <h1>Registro de incidencias</h1>
    <form method="POST">
        <label for="planta">Planta: <br></label><input type="text" name="planta" placeholder="Planta"><br><br>
        <label for="aula">Aula: <br><input type ="text" name="aula" placeholder="Aula"><br><br>
        <label for="descripcion">Describe la incidencia: <br><input type ="text" name="descripcion" placeholder="Descripción"><br><br>
        <label for="alta">Fecha de Alta: <br><input type ="date" name="alta"><br><br>
        <label for="revision">Fecha de Revision: <br><input type ="date" name="revision"><br><br>
        <label for="resolucion">Fecha de Resolucion: <br><input type ="date" name="resolucion"><br><br>
        <label for="comentario">Comentario opcional: <br><input type ="text" name="comentario" placeholder="Comentario"><br><br>
        <input type="submit" value="Anotar Incidencia">
    </form>
    
</body>
</html>
<?php

    // Conexion con la base de datos
    header("Content-type:text/html;charset=utf-8");
    include "conexion.php";
    $enlace = mysqli_connect("sql307.thsite.top","thsi_35748569","U?daGhYf","thsi_35748569_bdpruebas");

        if ($_POST['planta']=='')
        {
            echo "<p>El numero de planta es obligatorio</p>";
        }
        else if ($_POST['aula']=='')
        {
            echo "<p>El aula es obligatoria</p>";
        }
        else if ($_POST['descripcion']=='')
        {
            echo "<p>La descripción del problema es obligatoria</p>";
        }
        else if ($_POST['alta']=='')
        {
            echo "<p>La fecha de alta de la incidencia es obligatoria</p>";
        }
        else
        {
            // Añadir a nuestro usuario a la BD
                $query="INSERT INTO incidencias (planta, aula, descripcion, alta, revision, resolucion, comentario) VALUES('".mysqli_real_escape_string($enlace,$_POST['planta'])."','".mysqli_real_escape_string($enlace,$_POST['aula'])."','".mysqli_real_escape_string($enlace,$_POST['descripcion'])."','".mysqli_real_escape_string($enlace,$_POST['alta'])."','".mysqli_real_escape_string($enlace,$_POST['revision'])."','".mysqli_real_escape_string($enlace,$_POST['resolucion'])."','".mysqli_real_escape_string($enlace,$_POST['comentario'])."')";
                if (mysqli_query($enlace,$query)){
                    echo "<p>¡Enhorabuena! Has registrado tu incidencia! Será tratada con la mayor brevedad posible</p>";
                
                }
                else
                {
                    echo "<p>Hubo algún problema al registrar la incidencia. Inténtelo más tarde</p>";
                }
        }

?>
