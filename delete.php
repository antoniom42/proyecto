<?php include "header.php" ?>

<?php



?>

<?php

    session_start();
    session_set_cookie_params(120);

    if($_SESSION['admin']=="Profesor"){
        echo "<script> alert ('No tienes suficientes permisos para acceder a esta página') 
        window.location='http://antonio.thsite.top/crud/gestion/incidencias.php'</script>";
    } else {

        if(isset($_GET['eliminar']))
        {
            $id= htmlspecialchars($_GET['eliminar']);
    
            $user = $_SESSION['usuario'];
    
            
    
            if($_SESSION['admin']!="Administrador"){
                $query = "DELETE FROM incidencias WHERE id = {$id} AND user='$user'"; 
            }else{
                $query = "DELETE FROM incidencias WHERE id = {$id}"; 
            }
        
    
            $delete_query= $conn->query($query);
            // header("Location: home.php");
            echo "<script>window.location='incidencias.php';</script>";
        }

    }



?>
<?php include "footer.php" ?>