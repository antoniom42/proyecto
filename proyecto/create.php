<?php  include "header.php" ?>
<?php 
  if(isset($_POST['crear'])) 
    {
        $planta = htmlspecialchars($_POST['planta']);
        $aula = htmlspecialchars($_POST['aula']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $comentario = htmlspecialchars($_POST['comentario']);
        $alta = htmlspecialchars($_POST['alta']);
        $revision = htmlspecialchars($_POST['revision']);
        $resolucion = htmlspecialchars($_POST['resolucion']);
        $user = $_SESSION['usuario'];
        $email=$_SESSION['email'];
        $query= "INSERT INTO incidencias(user, planta, aula, descripcion, alta, revision, resolucion, comentario, email) VALUES('{$user}','{$planta}','{$aula}','{$descripcion}','{$alta}','{$revision}','{$resolucion}','{$comentario}','{$email}')";
        $resultado = $conn->query($query);
    
          if (!$resultado) {
              echo "Algo ha ido mal añadiendo la incidencia: ";
          }
          else
          {
            echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
          }         
    }
?>
<h1 class="text-center">Añadir incidencia</h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="planta" class="form-label">Planta</label>
        <select name="planta" id="planta" class="form-control" required>
          <option value="Baja">Baja</option>
          <option value="Primera">Primera</option>
          <option value="Segunda">Segunda</option>
        </select>
      </div>
      <div class="form-group">
        <label for="aula" class="form-label">Aula</label>
        <select name="aula" id="aula" class="form-control" required>
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
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" name="descripcion"  class="form-control" required>
      </div>
      <div class="form-group">
        <label for="fecha_alta" class="form-label">Fecha Alta</label>
        <input type="date" name="alta" id="fecha" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="fecha_rev" class="form-label">Fecha Revisión</label>
        <input type="date" name="revision"  class="form-control">
      </div>
      <div class="form-group">
        <label for="fecha_sol" class="form-label">Fecha Solución</label>
        <input type="date" name="resolucion"  class="form-control">
      </div>
      <div class="form-group">
        <label for="comentario" class="form-label">Comentario</label>
        <input type="text" name="comentario"  class="form-control">
      </div>
      <div class="form-group">
        <input type="submit"  name="crear" class="btn btn-primary mt-2" value="Añadir">
      </div>
    </form> 
  </div>
  <div id='volver' class="container text-center mt-5">
    <a href="incidencias.php" class="btn btn-warning mt-5"> Volver </a>
  <div>
<?php include "footer.php" ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$( document ).ready(function() {

    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $("#fecha").val(today);

    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("alta")[0].setAttribute('max', today);
});
</script>