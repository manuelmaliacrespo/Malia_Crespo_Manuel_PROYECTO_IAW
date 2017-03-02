<!-- Incluyendo la parte del código de la cabecera (principalmente menú)-->
<?php include '../cabecera.php'; ?>








<?php

$connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
//Conexion a la base de datos.

if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
//Validación.




    if (isset($_GET["id_vivienda"])) {
    //Si existe peticion $_GET "id_vivienda"...

      $consulta='SELECT usu.nombre, usu.apellidos, va.*, vi.nombre as nombre_vivienda
      FROM valoracion va, usuarios usu, viviendas vi
      WHERE va.id_vivienda=vi.id_vivienda
      AND va.id_usuario=usu.id_usuario
      AND va.id_vivienda='.$_GET["id_vivienda"].'';
      //Consulta solicitando * vivienda para extraer el id de vivienda.

      if ($result = $connection->query($consulta)) {

          if ($result->num_rows===0) {
          //Si el resultado es = 0
          echo "No hay comentarios.";
          } else {


            echo '<h3 align="center">Valoraciones</h3>';

            while($obj = $result->fetch_object()) {


              /*echo '<div class="panel panel-default">
                <div class="panel-heading">
                  <b>'.$obj->nombre.' '.$obj->apellidos.'  ';

                  for ($i=0; $i < $obj->puntuacion; $i++) {
                    echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                  }

                  echo '</b>
                  <br>'.$obj->fecha.'
                </div>
                <div class="panel-body">
                  '.$obj->comentario.'
                </div>
              </div>';*/

            echo ' <blockquote>
  <p>'.$obj->comentario.' ';
  for ($i=0; $i < $obj->puntuacion; $i++) {
    echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
  }
echo '
  </p>
  <footer>'.$obj->nombre.' '.$obj->apellidos.', <cite title="Source Title">'.$obj->fecha.'


  </cite></footer>
</blockquote>';


            }


          }
      } else {
        echo "Wrong Query";
      }

  } else {
    //header("Location: index.php");
  }
?>





<br>




<?php

    if (isset($_POST["comentar_vivienda"])) {
    //Si existe petición $_POST reservar_vivienda

      $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
      //Conexion base de datos

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Validación

      $consulta="INSERT INTO valoracion (puntuacion, comentario, fecha, id_vivienda, id_usuario)
      VALUES ('".$_POST["puntuacion"]."','".$_POST["comentario"]."', now(),'".$_POST["id_vivienda"]."','".$_SESSION["id_usuario"]."')";
      //Consulta para insertar "reserva" con campos de reserva.

      if ($result = $connection->query($consulta)) {

        header("Location: ver_comentarios.php?id_vivienda=".$_POST["id_vivienda"]."");

      } else {
        echo "Wrong Query";
        //Fallo en la query.
      }

  }
?>

<!-- FORMULARIO DE COMENTAR -->
<?php
/* Si está logado mostrar el formulario, sino nada.*/
if (isset($_SESSION["email"])) {
echo '<form method="post" action="ver_comentarios.php">
      <input type="hidden" name="id_vivienda" value="'.$_GET["id_vivienda"].'"></input>
      <p><b>Puntuación:</b> <input style="width:200px;" name="puntuacion" type="range" min="1" max="5"></input></p>
      <p><b>Comentario:</b> <textarea style="width:200px;" class="form-control" rows="2" name="comentario"></textarea></p>
      <p><input type="submit" value="Comentar" class="btn btn-primary" name="comentar_vivienda"></p>

</form>';
}
?>






<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
