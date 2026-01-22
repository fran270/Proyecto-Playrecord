<?php 

include './admin/basededatos.php';
$bd = new basededatos();

$cancion = new Canciones();
$cancion->borrarCancion();

header("Location: listasguardadas.php");
?>