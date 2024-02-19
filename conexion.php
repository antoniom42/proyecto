<?php
    ob_start(); //Conexión a base de datos mediante PDO
    
    $servername = "sql302.thsite.top";
    $username = "thsi_35750964";
    $password = "dTykF!lB";
    $bd="thsi_35750964_bdpruebas";

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