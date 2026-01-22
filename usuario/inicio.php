<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title> 
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <link href = "./css/diseño.css" rel = "stylesheet">
    <link rel = "icon" href = "./img/icono_musica.png" type = "image/x-icon"> 
    <script>
        function cargar(div, desde) {
            $(div).load(desde);
        }
    </script>
</head>

<body>

    <div id="contenedor">
        <div id="barra"></div>
        <div id="principal" class="l w3-mobile mx-auto"></div>
        <div id="pie"></div>
    </div>

    <script> 
        cargar('#barra', './barra.php');
        cargar('#principal', './portada.php');
        cargar('#pie', './footer.php');
    </script>

</body>

</html>