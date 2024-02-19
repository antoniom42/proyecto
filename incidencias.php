<!-- Header -->
<?php include "header.php"?>


<!-- Navbar -->

<!-- Navbar -->

<!-- CONTADORES -->

<?php 

              $user = $_SESSION['usuario'];

              if($_SESSION['admin']!="Administrador"){
              
                $querytot="SELECT count(id) FROM incidencias WHERE user='$user'"; 
                $vistatot= $conn->query($querytot);
     
                $queryres="SELECT count(id) FROM incidencias WHERE resolucion!='0000-00-00' AND user='$user'"; 
                $vistares= $conn->query($queryres);
     
                $querypen="SELECT count(id) FROM incidencias WHERE resolucion='0000-00-00' AND user='$user'"; 
                $vistapen= $conn->query($querypen);
              
              }else{
              
                $querytot="SELECT count(id) FROM incidencias"; 
                $vistatot= $conn->query($querytot);
     
                $queryres="SELECT count(id) FROM incidencias WHERE resolucion!='0000-00-00'"; 
                $vistares= $conn->query($queryres);
     
                $querypen="SELECT count(id) FROM incidencias WHERE resolucion='0000-00-00'"; 
                $vistapen= $conn->query($querypen);

              }


 
          ?>

  <div class="container">
    <h1 class="text-center" >Incidencias IES Antonio Machado</h1>
    <div id="contadores">
      <h4 class="text-center" >Incidencias totales: <?php echo $vistatot->fetch()[0]; ?> </h4>
      <h4 class="text-center" >Incidencias resueltas: <?php echo $vistares->fetch()[0]; ?> </h4>
      <h4 class="text-center" >Incidencias pendientes: <?php echo $vistapen->fetch()[0]; ?> </h4>
    </div>
    
      <a href="create.php" class='btn btn-outline-dark mb-2' id="anadir"> <i class="bi bi-person-plus"></i> Añadir incidencia</a>
        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Planta</th>
              <th  scope="col">Aula</th>
              <th  scope="col">Descripción</th>
              <th  scope="col">Fecha alta</th>
              <th  scope="col">Fecha revisión</th>
              <th  scope="col">Fecha solución</th>
              <th  scope="col">Comentario</th>
              <th  scope="col" colspan="3" class="text-center">Operaciones</th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 

 
              
          <?php //SELECT DE TODO
            $user = $_SESSION['usuario'];

            if($_SESSION['admin']!="Administrador"){
              $query="SELECT * FROM incidencias WHERE user='$user'";
            }else{
              $query="SELECT * FROM incidencias ";
            }
      
            $vista_incidencias= $conn->query($query);

            while($row = $vista_incidencias->fetch()){
              $id = $row['id'];                
              $planta = $row['planta'];        
              $aula = $row['aula'];         
              $descripcion = $row['descripcion'];        
              $alta = $row['alta'];        
              $revision = $row['revision'];        
              $resolucion = $row['resolucion'];        
              $comentario = $row['comentario']; 
              if($revision=='0000-00-00'){
                $revision='';
              }
              if($resolucion=='0000-00-00'){
                $resolucion='';
              }
              echo "<tr >";
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$planta}</td>";
              echo " <td > {$aula}</td>";
              echo " <td >{$descripcion} </td>";
              echo " <td >{$alta} </td>";
              echo " <td >{$revision} </td>";
              echo " <td >{$resolucion} </td>";
              echo " <td >{$comentario} </td>";
              echo " <td class='text-center'> <a href='view.php?incidencias_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i> Ver</a> </td>";
              
              if($_SESSION['admin']=="Administrador" || $_SESSION['admin']=="Direccion"){
                echo " <td class='text-center' > <a href='update.php?editar&incidencias_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
                echo " <td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
              };

              echo " </tr> ";
            }  

            include "footer.php";

$conn->close()
                ?>
              </tr>  
            </tbody>
        </table>
  </div>
<div class="container text-center mt-5">
      <a href="../index.php" class="btn btn-warning mt-5"> Volver </a>
    <div>