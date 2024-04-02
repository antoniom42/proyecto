<?php

    session_start();
    session_set_cookie_params(120);

    if($_SESSION['admin']!="Administrador"){
        echo "<script> alert ('Debe ser admin para acceder a esta página') 
        window.location='http://antonio.thsite.top/crud/gestion/incidencias.php'</script>";
    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR USUARIO | PROYECTO</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class='caja'>
        <h1>
            Crear usuario
        </h1>

        <div>
            <form action="#" method="post" id="formu">
            <label for="">Usuario</label>
            <input type="text" name='usuario' placeholder='Ej.:Manolito' > <br>
            <label for="">Email</label>
            <input type="text" name='email' placeholder='Ej.:manoito@yahoo.com' > <br>
            <label for="" class='preg'>Contraseña</label>
            <input type="password" name='contrasena' placeholder='Ej.:sUp3rM4N0lit0'><br> 
            <label for="" class='preg'>Repita la contraseña</label>
            <input type="password" name='contrasena2' placeholder='Ej.:sUp3rM4N0lit0'><br>
            <label for="planta" class="form-label" class='preg'>Rol</label>
            <select name="admin" id="planta" class="form-control preg" required>
                <option value="Direccion">Dirección</option>
                <option value="Profesor">Profesor</option>
                <option value="Administrador">Administrador</option>
            </select>
            <button name="submit" type="submit" class="myButton" >Crear</button>
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
            $passwd2=base64_encode(htmlspecialchars($_POST['contrasena2']));
            $admin=(htmlspecialchars($_POST['admin']));
            $email=htmlspecialchars($_POST['email']);

            

            if($usuario==null OR $passwd==null){
                echo "<script> document.getElementById('mensaje').innerHTML='Todos los campos son obligatorios'
                document.getElementById('mensaje').className='error'</script>";
            } else if($passwd!=$passwd2){
                echo "<script> document.getElementById('mensaje').innerHTML='Las contraseñas no coinciden'
                document.getElementById('mensaje').className='error'</script>";
            } else{

                $showMessages = false;

                include "conexion.php";

                //echo $_SESSION['admin'];
        
                header("Content-type:text/html;charset=utf-8");

                $comprobar = "SELECT usuario FROM usuproyecto WHERE usuario='$usuario'";
                $result = $conn->query($comprobar);

                
                if ($result->rowCount() < 1) {
                    // Mira si el usuario ha sido registrado


                    /*insert*/

                    $insert = "INSERT INTO usuproyecto (usuario,contrasena,admin, email) VALUES('$usuario','$passwd','$admin', '$email')";
                    $resultado = $conn->query($insert);


                    echo "<script> document.getElementById('mensaje').innerHTML='Usuario creado correctamente';
                    document.getElementById('mensaje').className='acierto'</script>";

                    session_start();
                    sleep(1);
                    $_SESSION['usuario']=$usuario;
                    header('Location: index.php');

                } else {
                    echo "<script> document.getElementById('mensaje').innerHTML='Usuario ya existente'
                    document.getElementById('mensaje').className='error'</script>";
                }
            $conn->close();
            }
        }
?>