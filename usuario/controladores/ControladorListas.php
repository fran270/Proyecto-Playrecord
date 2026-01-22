<?php


class ControladorListas
{

    public function crearNombreLista()
    {

        echo '<form id="crearLista" method="POST">
          
           <label for="nombre">Nombre de la Lista:</label>
           <input type="text" name="nombre" id="nombre" value = "">
      
           <button type="submit" name="boton3" id="boton3" value="crear" class="btn btn-primary">Crear</button>

          </form>
          
          <span id="error" style="color:red;"><center>' . '</center></span>';

    }


    public function mostrarNombreLista()
    {


        $lista = new Listas();
        $datos = $lista->listasPorUsuario();

        echo "<table>
                  <tbody id = 'list'>
                  <tr>
                   <td>";


        foreach ($datos as $row) {

            echo "" . $row['nombre'] . "<br>";

        }

        echo "  
                </td>
                </tr>
                </tbody>
                </table>";


    }


    public function listasUsuario()
    {

        $lista = new Listas();
        $datos = $lista->listasPorUsuario();

        echo ' <div class="listas">

          <table class="table table-hover">

            <thead>
             <h2>Listas</h2>
              <th id = "columna1">ID</th>
              <th>
                <b>Nombre Lista</b>
              </th>
              <th>
               <b>OPCIONES</b>
              </th>
            </thead>

          <tbody class="tbody">';

        //Mostramos en una tabla las listas creadas por el usuario con 3 botones de edicion
        foreach ($datos as $row) {

            echo '<tr data-lista-nombre = ' . $row['nombre'] . '">
             
             <td id = "col1"><input type = "hidden" name ="idLista"> ' . $row[0] . '</td>

              <td>' . $row['nombre'] . '</td>

               <td>
                <img src="./img/añadirCancion.png" class="añadirCancion" value = "' . $row[0] . '" data-lista-id=' . $row[0] . '>
                <img src="./img/verLista.png" class="verLista" value = "' . $row[0] . '">
                <a href = "eliminarLista.php?id= "' . $row[0] . '">
                <img src="./img/eliminarCancion.png" class="eliminarLista" value ="' . $row[0] . '" data-lista-nombre = ' . $row[1] . '>
                </a>
              </td>

          </tr>';

        }


        echo '</tbody>
          </table>
        </div>';


    }


    public function listaExiste()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $lista = new Listas();

            $verificar_lista = $lista->verificarLista($_POST['nombre']);

            if ($verificar_lista) {

                $error = "Esta lista ya existe";

            } else {

                $d00 = $_POST['nombre'];
                $d01 = $nombre;
                $bloque = array();
                $bloque[0] = $d00;
                $bloque[1] = $d01;
                $list = serialize($bloque);
                $lista->insertarNombreLista($list);

            }


        }
    }


    public function mostrarCancionesLista()
    {
        include './modelos/Listas.php';
        include './modelos/Canciones.php';
        include './admin/basededatos.php';
        
        $lista = new Listas();
        $cancion = new Canciones();

        $id = $lista->idListasPorUsuario();
        $nombreLista = $lista->nombreLista();
        $cancionesLista = $cancion->cancionesPorLista();
        $cancion->borrarCancion();

        //Con este bucle obtenemos los nombres de cada una de las listas creadas
        foreach ($nombreLista as $lista) {

            echo "<div id = 'contenedor'>
           <strong>
              <p>Nombre de la lista:</p>
              <h4 id = 'nombreLista'>" . $lista[0] . "</h4>
           </strong>
          </div>
          <br>";

        }

        //Id de la lista
        foreach ($id as $idLista) {

            echo "<input type = 'hidden' name = 'idlist' value = '" . $idLista[0] . "'>";
        }


        //Canciones que contiene la lista
        echo '<ol id = "list">
          <scroll-container>
           <scroll-page>';

        foreach ($cancionesLista as $canciones) {

            echo '<li data-src = "canciones/' . $canciones[1] . '" name = "idsong" id = "song">' . $canciones[1] . '
           <input type = "hidden" name = "idcancion" value = "' . $canciones[0] . '">
           <a href = "eliminarCancion.php?id=' . $canciones[0] . '">
           <img src = "./img/eliminarCancion.png" name = "cancion" class = "borrarCancion" value = ' . $canciones[0] . '>
           </a>
          </li>';

        }

        echo ' </scroll-page>
        </scroll-container>
       </ol>';


    }

}


?>