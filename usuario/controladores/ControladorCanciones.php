<?php

class ControladorCanciones
{

    public function listadoCanciones()
    {

        $cancion = new Canciones();
        $lista = new Listas();

        $idlistas = $lista->idListasPorUsuario();
        $songs = $cancion->getCanciones();

        echo '<ol id = "playlist">

         <form action = "#" id = "formCanciones" method = "POST">';

        foreach ($idlistas as $idlista) {

            echo '<input type = "hidden" name = "idLista" value = "' . $idlista[0] . '">';

        }

        foreach ($songs as $canciones) {

            echo '<input type = "hidden" name = "idCancion" value = "' . $canciones[0] . '">';

        }


        $carpeta1 = "canciones/";
        $directorio = scandir($carpeta1, SCANDIR_SORT_NONE);

        //Bucle que recorre la carpeta que contiene las canciones
        foreach ($directorio as $carpeta) {

            if ($carpeta != "." && $carpeta != "..") {

                echo '<scroll-container>
                <scroll-page>

                 <li data-src = "canciones/' . $carpeta . '" name = "canci" id = "cancion">
                
                  <input type ="checkbox" name = "opcion[]" id = "opcion" data-nombre = "' . $carpeta . '" value = "' . $carpeta . '">' . $carpeta . '
    
                </li>
  
               </scroll-page>
             </scroll-container>';

            }

        }

        echo '
      <div class = "botones">
        <button type="submit" name="anadir" id="anadir" class="btn btn-primary">Añadir</button>
      </div>
    </form>
    </ol>';

    }


    public function insertarCancionLista()
    {

        if ($_SERVER['REQUEST_METHOD'] = 'POST') {

            $cancionLista = new Canciones();

            if (isset($_POST['opcion'])) {

                if (is_array($_POST['opcion'])) {

                    $cancionesSeleccionadas = $_POST['opcion'];

                    $idlista = intval($_POST['idLista']);

                    // Guardar cada canción seleccionada en la base de datos
                    foreach ($cancionesSeleccionadas as $cancion) {

                        $resultado = $cancionLista->insertarCancionesLista($cancion, $idlista);

                        if ($resultado) {

                            //echo "<p>La canción '$cancion' se ha guardado correctamente en la base de datos.</p>";

                        } else {

                            //echo "<p>Error al guardar la canción '$cancion'.</p>";
                        }
                    }

                }

            }

        }

    }
}

?>