<!-- Footer -->
<?php include "header.php"?>

<?php

  session_start();
  session_set_cookie_params(120);

  if($_SESSION['admin']=="Profesor"){
      echo "<script> alert ('No tienes suficientes permisos para acceder a esta página') 
      window.location='http://http://antonio.thsite.top/crud/gestion/incidencias.php'</script>";
  } else {

   if(isset($_GET['incidencias_id']))
    {
      $incidenciaid = htmlspecialchars($_GET['incidencias_id']); 
    }

    $user = $_SESSION['usuario'];

    if($_SESSION['admin']!="Administrador"){

      $query = "SELECT * FROM incidencias WHERE id = $incidenciaid AND user='$user'";
        
    }else{

      $query="SELECT * FROM incidencias WHERE id = $incidenciaid ";

    }

 
      $vista_incidencias= $conn->query($query);


      while($row = $vista_incidencias->fetch())
        {
          $id = $row['id'];                
          $planta = $row['planta'];        
          $aula = $row['aula'];         
          $descripcion = $row['descripcion'];        
          $alta = $row['alta'];        
          $revision = $row['revision'];        
          $resolucion = $row['resolucion'];        
          $comentario = $row['comentario'];
        }

        if ($id==''){
          echo "<script type='text/javascript'>
          alert('¡Esta incidencia no es tuya ratilla!');
          window.location='incidencias.php';
          </script>";
        }
 
    if(isset($_POST['editar'])) 
    {
      $planta = htmlspecialchars($_POST['planta']);
      $aula = htmlspecialchars($_POST['aula']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
      $alta = htmlspecialchars($_POST['alta']);
      $revision = htmlspecialchars($_POST['revision']);
      $resolucion = htmlspecialchars($_POST['resolucion']);
      $comentario = htmlspecialchars($_POST['comentario']);
      $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', Alta = '{$alta}', Revision = '{$revision}', Resolucion = '{$resolucion}', Comentario = '{$comentario}' WHERE id = {$id}";
      $incidencia_actualizada = $conn->query($query);
      if (!$incidencia_actualizada)
        echo "Se ha producido un error al actualizar la incidencia.";
      else
        echo "<script type='text/javascript'>alert('¡Datos de la incidencia actualizados!')</script>";
    }
  }             
?>

<h1 class="text-center">Actualizar incidencia</h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="planta" >Planta</label>
        <select name="planta" id="planta" class="form-control" value="<?php echo $planta  ?>" required>
          <option value="Baja">Baja</option>
          <option value="primera">Primera</option>
          <option value="Segunda">Segunda</option>
        </select>
      </div>
      <div class="form-group">
        <label for="aula" >Aula</label>
        <select name="aula" id="aula" class="form-control" value="<?php echo $aula  ?>" required>
          <option value="1">Aula 1</option>
          <option value="2">Aula 2</option>
          <option value="3">Aula 3</option>
          <option value="4">Aula 4</option>
          <option value="5">Aula 5</option>
          <option value="6">Aula 6</option>
          <option value="7">Aula 7</option>
          <option value="8">Aula 8</option>
          <option value="9">Aula 9</option>
          <option value="10">Aula 10</option>
          <option value="11">Aula 11</option>
          <option value="12">Aula 12</option>
          <option value="13">Aula 13</option>
          <option value="14">Aula 14</option>
          <option value="15">Aula 15</option>

        </select>
      </div>
      <div class="form-group">
        <label for="descripcion" >Descripción</label>
        <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_alta" >Fecha alta</label>
        <input type="date" name="alta" class="form-control" value="<?php echo $alta  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_rev" >Fecha revisión</label>
        <input type="date" name="revision" class="form-control" value="<?php echo $revision  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_sol" >Fecha solución</label>
        <input type="date" name="resolucion" class="form-control" value="<?php echo $resolucion ?>">
      </div>
      <div class="form-group">
        <label for="comentario" >Comentario</label>
        <input type="text" name="comentario" class="form-control" value="<?php echo $comentario  ?>">
      </div>
      <div class="form-group">
         <input type="submit"  name="editar" class="btn btn-primary mt-2" value=" Editar ">
      </div>
    </form>    
  </div>

    <div id='volver' class="container text-center mt-5">
      <a href="incidencias.php" class="btn btn-warning mt-5"> Volver </a>
    <div>

<?php include "footer.php" ?>

