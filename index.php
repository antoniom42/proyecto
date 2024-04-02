<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | PROYECTO</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

</head>
<body>
    <div class='caja'>
        <h1>
            Iniciar Sesión
        </h1>

        <div>
            <form action="#" method="post" id="formu">
            <label for="">Usuario</label>
            <input type="text" name='usuario' placeholder='Ej.:Manolito'> <br>
            <label for="">Contraseña</label>
            <input type="password" name='contrasena' placeholder='Ej.:sUp3rM4N0lit0'><br> <br>
            <button name="submit" type="submit" class="myButton" >Login</button>
            </form>
        </div>
        <label for="" id="mensaje" class=''></label>
    </div>

</body>
</html>

<?php
        //Conexión a base de datos mediante PDO

        if ($_SERVER['REQUEST_METHOD'] == "POST"){

            $usuario=htmlspecialchars($_POST['usuario']);
            $passwd=base64_encode(htmlspecialchars($_POST['contrasena']));
            

            if($usuario==null OR $passwd==null){
                echo "<script> document.getElementById('mensaje').innerHTML='Todos los campos son obligatorios'
                document.getElementById('mensaje').className='error'</script>";
            } else{

                $showMessages = false;

                include "conexion.php";
        
                header("Content-type:text/html;charset=utf-8");

                $comprobar = "SELECT * FROM usuproyecto where usuario='$usuario' AND contrasena='$passwd'";
                $result = $conn->query($comprobar);
                while($row=$result->fetch()){
                    $admin=$row['admin'];
                    $email=$row['email'];
                    $fecha=$row['fecha'];
                    $ip=$row['ip'];
                }

                
                if ($result->rowCount() > 0) {
                    // Mira si el usuario ha sido registrado
                    echo "<script> document.getElementById('mensaje').innerHTML='Inicio de sesión correcto';
                    document.getElementById('mensaje').className='acierto'</script>";   
                    
                    session_start();
                    $_SESSION['usuario']=$usuario;
                    $_SESSION['admin']=$admin;
                    $_SESSION['email']=$email;
                    $_SESSION['fecha']=$fecha;
                    $_SESSION['ip']=$ip;

                    date_default_timezone_set('Europe/Madrid');
                    setlocale(LC_TIME, 'es_VE.UTF-8','esp');

                    $sesion= date("d")." de ".strftime("%B"). " de ".date("Y") . " a las ". date("H:i") ;
                    $actusesion = "UPDATE usuproyecto set fecha = '$sesion' WHERE usuario ='$usuario' ";
                    $result = $conn->query($actusesion);
                    
                    $ipclient=$_SERVER['REMOTE_ADDR'];
                    $queryip = "UPDATE usuproyecto set ip = '$ipclient' WHERE usuario ='$usuario' ";
                    $result = $conn->query($queryip);

                    header("Refresh:1; url=incidencias.php");
        
                } else {
                    echo "<script> document.getElementById('mensaje').innerHTML='Usuario o contraseña incorrecto'
                    document.getElementById('mensaje').className='error'</script>";
                }
            $conn->close();
            }
        }
?>