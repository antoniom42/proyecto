<?php 
include 'sesion.php';
$showMessages= false;
include 'conexion.php';


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Gestión de incidencias (CRUD)</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/incidencias.css">

<link rel="icon" type="image/x-icon" href="favicon.ico">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary" style="background-color: black;">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://iesamachado.es/" id="machado">
      <img
        src="images/machado.jpg"
        height="16"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px; width: 69px; height: auto;"
      />

    </a>

    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link corto" href="incidencias.php" style="color: white;" >Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link largo" href="create.php" style="color: white;" >Crear incidencia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link largo" href="creausu.php" style="color: white;" id='creausus'>Crear usuario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link corto" href="usuarios.php" style="color: white;" id='usuarios'>Usuarios</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center" id="dchanav">
      <a class="btn btn-link px-3 me-2" href="index.php" style="color: white;">Cerrar sesión</a>

        
        <img src="https://cdn-icons-png.flaticon.com/512/260/260507.png" id='persona' alt="" >

        <?php
            echo $_SESSION['usuario'];
        ?>

      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>

<script>
  // Initialization for ES Users
import { Collapse, Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Collapse, Ripple });
</script>
    
<?php
  if($_SESSION['admin']!="Administrador"){
    echo "<script> 
            document.getElementById('usuarios').className = 'invisible'
            document.getElementById('creausus').className = 'invisible'
          </script>";
}
?>