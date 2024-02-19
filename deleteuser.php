<?php include "header.php" ?>

<?php

    session_start();
    session_set_cookie_params(120);

    if($_SESSION['admin']!="Administrador"){
        echo "<script> alert ('Debe ser admin para acceder a esta página') 
        window.location='http://http://antonio.thsite.top/crud/gestion/incidencias.php'</script>";
    } else {
/*
        echo 
        "
        <script>
        var confirmacion = confirm('¿Estás seguro de que deseas eliminar este usuario? Esto también eliminará todas sus incidencias.');

        if (confirmacion == false) {
            // Si el usuario cancela, redirige a la página de incidencias
            window.location='http://pepe.thsite.top/proyecto/incidencias.php';
        }
        </script>

        ";*/

        if(isset($_GET['eliminar']))
        {
  
            $usuario= htmlspecialchars($_GET['eliminar']);
            $query = "DELETE FROM usuproyecto WHERE usuario = '{$usuario}'"; 
            $query2 = "DELETE FROM incidencias WHERE user = '{$usuario}'"; 
            $delete_query= $conn->query($query);
            $delete_query2= $conn->query($query2);
            // header("Location: home.php");
            echo "<script>window.location='incidencias.php';</script>";
        }

    }


?>


<?php include "footer.php" ?>