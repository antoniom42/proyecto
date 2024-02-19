<!-- Header -->
<?php include "header.php"?>

<?php

    session_start();
    session_set_cookie_params(120);

    if($_SESSION['admin']!="Administrador"){
        echo "<script> alert ('Debe ser admin para acceder a esta página') 
        window.location='http://http://antonio.thsite.top/crud/gestion/incidencias.php'</script>";
    }


?>


<!-- Navbar -->

<!-- Navbar -->

  <div class="container">
    <h1 class="text-center" >Incidencias IES Antonio Machado</h1>

    <h3 class="text-center">Usuarios del sistema</h3>
    
    <div class="conttabla">

    <table class="table table-striped table-bordered table-hover" id='tablausus'>
          <thead class="table-dark">
            <tr>
              <th  scope="col" class='text-center'>Nombre</th>
              <th  scope="col" class='text-center'>Rol</th>
              <th  scope="col" colspan="2" class="text-center">Operaciones</th>
            </tr>  
          </thead>
        <tbody>
            <tr>
 

 
              
        <?php //SELECT DE TODO
            $query="SELECT * FROM usuproyecto ORDER BY admin";               
            $vista_incidencias= $conn->query($query);

            while($row = $vista_incidencias->fetch()){
              $usuario = $row['usuario'];                
              $rol = $row['admin'];        
              echo "<tr >";
              echo " <th scope='row' class='text-center'>{$usuario}</th>";
              echo " <td class='text-center'> {$rol}</td>";
              echo " <td class='text-center' > <a href='edituser.php?editar&usuario={$usuario}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
              echo " <td class='text-center'>  <a href='deleteuser.php?eliminar={$usuario}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
              echo " </tr> ";
            }  

            include "footer.php";

            $conn->close()
        ?>
            </tr>  
        </tbody>
        </table>

    </div>
       
  </div>
<div class="container text-center mt-5">
      <a href="../index.php" class="btn btn-warning mt-5"> Volver </a>
    <div>