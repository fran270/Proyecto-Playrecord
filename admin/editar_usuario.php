<?php

include './modelos/Usuarios.php';
$bd = new Usuarios();

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contraseña'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['correo'];
$tipo = $_POST['tipo'];

$bd->modificarUsuarios($id, $usuario, $contrasena, $fecha_nacimiento, $email, $tipo);

header("Location: listado_usuarios.php");

?>