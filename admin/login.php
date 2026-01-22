<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include './controladores/ControladorUsuario.php';
    $usuarios = new ControladorUsuario();
    $datosusuario = $usuarios->comprobarUsuario($_POST['usuario'], $_POST['contraseña']);

    if (!empty($datosusuario)) {

        session_start();

        $_SESSION['Usuario'] = serialize($datosusuario);

        header('Location:portada.php');

        exit();

    } else {

        header('Location:login.php');
         
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <link href="./css/diseño.css" rel="stylesheet">
    <link rel="icon" href="../img/iniciar-sesion.png" type="image/x-icon">
    <script src="./js/validarCampos.js"></script>
</head>

<body>

    <img src="./img/imagen.jpg" id="imagen1">

    <style>
        #admin,
        #contraseña {

            margin-left: 6px;
        }

        .contenedor {

            display: inline-block;
            width: 110px;
        }
    </style>

    <!--Formulario inicio sesion administrador-->
    <form action="#" id="formulario" method="POST">

        <h1>LOGIN</h1>

        <label for="usuario" class="contenedor">Administrador:</label>
        <input type="text" name="usuario" id="usuario">

        <br><br>
        <label for="contraseña" class="contenedor">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña">

        <br><br>
        <button type="submit" id="boton" value="Acceder" class="btn btn-primary">Acceder</button>

    </form>

</body>
</html>