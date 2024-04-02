<?php
    ob_start(); //Conexión a base de datos mediante PDO
    
    $servername = "sql307.byetcluster.com";
    $username = "thsi_35748569";
    $password = "U?daGhYf";
    $bd="thsi_35748569_bdpruebas";

    if (!isset($showMessages)) {
        $showMessages = true;
    }
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($showMessages) {
        echo "Conectado con éxito a $servername con usuario $username y contraseña $password <br><br>" ;

    }
    
    } catch(PDOException $e) {

        if ($showMessages) {
            echo "Error de conexion quillo " . $e->getMessage();
        }
    exit();
    }

    

    ob_end_flush();
?>