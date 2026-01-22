<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
  <title>Eliminacion Usuarios</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
  <link rel="icon" href="./img/eliminar.png" type="image/x-icon">
  <link href="./css/estilos.css" rel="stylesheet">
  <?php
  include 'barra.php';
  include './controladores/ControladorUsuario.php';
  session_start();
  $datosusuario = unserialize($_SESSION['Usuario']);
  $nombre = $datosusuario['usuario'];
  ?>
</head>

<body>

<style>
  #contenedor{
     text-align: center;
  }
</style>

  <div id = "contenedor">
   
      <div><br>
        <form action="eliminacion_usuarios.php" id="formulario" method="POST">
          <img src="../img/imagen1.jpg" id="imagen">&nbsp;
          <b id = "titulo">Eliminación Usuarios</b>
        </form>
      </div>
      <br><br>

      <div>
        <table id="tablausuarios">
          <thead class="thead-dark">
            <tr>
              <th class="id">ID</th>
              <th class="usuario">Usuario</th>
              <th class="contraseña">Contraseña</th>
              <th class="fecha">Fecha Nacimiento</th>
              <th class="email">Email</th>
              <th class="tipo">Tipo Usuario</th>
              <th class="eliminar">Eliminar</th>
            </tr>
          </thead>

          <tbody>

            <?php

            $consultaDelete = new ControladorUsuario();
            $usuarios = $consultaDelete->listadoUsuarios();

            foreach ($usuarios as $usuario) {

              echo "<tr>
          
                     <th id = 'id'>" . $usuario['id'] . "</th>",

                    "<th id = 'usuario'>" . $usuario['usuario'] . "</th>",

                    "<th id = 'contraseña'>" . $usuario['contraseña'] . "</th>",

                    "<th id = 'fecha'>" . $usuario['fecha_nacimiento'] . "</th>",

                    "<th id = 'correo'>" . $usuario['email'] . "</th>",

                    "<th id = 'tipo'>" . $usuario['tipo'] . "</th>
            
                    <th id = 'botonEliminar'>
                       <a href='eliminar_usuario.php?id=" . $usuario['id'] . "' class='btn btn-danger'
                        onclick='return confirm(\"¿Estas seguro de que quieres borrar este usuario?\");'>
                         <iconify-icon icon='bi:trash' class='d-inline-block align-top' id = 'eliminar'>
                         </iconify-icon>Eliminar
                       </a>
                    </th>
                    
                  </tr>";

            }

            ?>

          </tbody>
        </table>
      </div>
   
  </div>

  <!--Pie de pagina-->
  <?php
 
  include 'footer.php';
 
  ?>

</body>
</html>