<?php

include '../admin/basededatos.php';
include './modelos/Listas.php';
$listaBorrar = new Listas();
$listaBorrar->borrarLista();

header("Location: listasguardadas.php");

?>