<?php
include 'sesion.php';
$showMessages= true;
include 'conexion.php';

$sql_query = file_get_contents('actualizaUsuarios.sql');

if ($conn->query($sql_query) = TRUE) {
    echo "Se han añadido las columnas correctamente";
}
else {
    echo "Ha ocurrido un error" . $conn->error;
}
?>