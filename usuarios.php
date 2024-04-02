<!-- Header -->
<?php include "header.php"?>

<?php

    session_start();
    session_set_cookie_params(120);

    if($_SESSION['admin']!="Administrador"){
        echo "<script> alert ('Debe ser admin para acceder a esta página') 
        window.location='http://antonio.thsite.top/crud/gestion/incidencias.php'</script>";
    }


?>

<script>

  function confirmar(usuario){
        var confirmacion = confirm('¿Estás seguro de que deseas eliminar este usuario? Esto también eliminará todas sus incidencias.');

    if (confirmacion) {
        // Si el usuario aecpta, redirige a la página de eliminar
        window.location='deleteuser.php?eliminar=' + usuario;
    }
  }

</script>

<!-- Navbar -->

<!-- Navbar -->

  <div class="container">
    <h1 class="text-center" >Incidencias IES Antonio Machado</h1>

    <h3 class="text-center">Usuarios del sistema</h3>

    <a href="createaula.php" class='btn btn-outline-dark mb-2' id="anadir"> <i class="bi bi-person-plus"></i> Añadir aula</a>
    
    <div class="conttabla">

    <table class="table table-striped table-bordered table-hover" id='tablausus'>
          <thead class="table-dark">
            <tr>
              <th  scope="col" class='text-center'><a href="usuarios.php?orden=usuario">Nombre</th>
              <th  scope="col" class='text-center'><a href="usuarios.php?orden=email">Email</th>
            </tr>  
          </thead>
        <tbody>
            <tr>
 

 
              
        <?php //SELECT DE TODO

            if ($_GET['orden']=='') {
              $query="SELECT * FROM usuproyecto";
            } else {
              $query="SELECT * FROM usuproyecto ORDER BY ". $_GET['orden'];
            }
                          
            $vista_incidencias= $conn->query($query);

            while($row = $vista_incidencias->fetch()){
              $usuario = $row['usuario'];                
              $email = $row['email'];        
              echo "<tr >";
              echo " <th scope='row' class='text-center'>{$usuario}</th>";
              echo " <td class='text-center'> {$email}</td>";
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