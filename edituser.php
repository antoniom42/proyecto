<!-- Footer -->
<?php include "header.php"?>

<?php

    session_start();
    session_set_cookie_params(120);

    if($_SESSION['admin']!="Administrador"){
        echo "<script> alert ('Debe ser admin para acceder a esta página') 
        window.location='http://antonio.thsite.top/crud/gestion/incidencias.php'</script>";
    }


?>

<?php
   if(isset($_GET['usuario']))
    {
      $usuario = htmlspecialchars($_GET['usuario']); 
    }
      
      $query="SELECT * FROM usuproyecto WHERE usuario = '$usuario' ";
      $vista_incidencias= $conn->query($query);

      while($row = $vista_incidencias->fetch())
        {
          $username = $row['usuario'];                
          $admin = $row['admin'];         
        }

    if(isset($_POST['editar'])) 
    {

      $admin = htmlspecialchars($_POST['admin']);
      $query = "UPDATE usuproyecto SET  admin = '$admin' WHERE usuario = '$usuario'";
      $incidencia_actualizada = $conn->query($query);
      if (!$incidencia_actualizada)
        echo "Se ha producido un error al actualizar el usuario.";
      else
        echo "<script type='text/javascript'>alert('¡Usuario editado!')</script>";
    }             
?>

<h1 class="text-center">Actualizar usuario</h1>
  <div class="container ">
  <div>
            <form action="#" method="post" id="formu">
            <?php echo "<h4>" . strtoupper($usuario) . "</h4>" ?> <br>
            <label for="planta" class="form-label" class='preg'>Rol</label>
            <select name="admin" id="planta" class="form-control preg" required>
                <option value="Dirección">Dirección</option>
                <option value="Profesor">Profesor</option>
                <option value="Administrador">Administrador</option>
            </select>
            <button name="editar" type="submit" class="myButton" >Editar</button>
            </form>
        </div>
  </div>

    <div id='volver' class="container text-center mt-5">
      <a href="incidencias.php" class="btn btn-warning mt-5"> Volver </a>
    <div>

<?php include "footer.php" ?>

