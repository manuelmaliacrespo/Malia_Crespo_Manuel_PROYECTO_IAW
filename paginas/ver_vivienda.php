<!-- Incluyendo la parte del código de la cabecera (principalmente menú)-->
<?php include '../cabecera.php'; ?>








<?php

$connection = new mysqli("localhost", "mmalia", "123456", "proyecto");

if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}




    if (isset($_GET["id_vivienda"])) {

      $consulta="select * from viviendas where id_vivienda = ".$_GET["id_vivienda"];

      if ($result = $connection->query($consulta)) {

          if ($result->num_rows===0) {

          } else {

            //PARTE DE LA INFORMACIÓN DE LA VIVIENDA.
            echo "<h4>Información</h4>";
            //Recuperamos el resultado de la consulta.
            $obj = $result->fetch_object();

            echo "<div>";
              echo "<align='center'>";
              echo "<img class='img-rounded' style='width:300px;' src='../images/viviendas/".$obj->foto1."'></img>";
              echo "<br><b>Nombre:</b> ".$obj->nombre;
              echo "<br><b>Ubicación:</b> ".$obj->localizacion;
              echo "<br><b>Descripcion:</b> ".$obj->descripcion;
              echo "<br><b>Temp. Baja:</b> ".$obj->precio_baja;
              echo "<br><b>Temp. Media:</b> ".$obj->precio_media;
              echo "<br><b>Temp. Alta:</b> ".$obj->precio_alta;
            echo "</div>";


            echo "<br>";

            //Recuperamos el mes actual.
            $mes_actual = date("n");

            //Si el mes actual es desde Julio a Septiembre: Guardar en variable el precio de alta.
            if($mes_actual >= 7 && $mes_actual <= 9) {
              $precio_cobrar = $obj->precio_alta;

            //Si el mes actual es Abril o Mayo: Guardar en variable el precio de media.
            } elseif ($mes_actual == 6 || $mes_actual == 7) {
              $precio_cobrar = $obj->precio_media;

            //Si no es ninguno de los anteriores: Guardar en variable el precio de baja.
            } else {
              $precio_cobrar = $obj->precio_baja;
            }



            //FORMULARIO PARA RESERVAR VIVIENDA.
            echo '<h4>Hacer Reserva</h4>';
            echo '<form action="reservar_vivienda.php" method="post">';

              echo '<input type="hidden" name="id_vivienda" value="'.$obj->id_vivienda.'">';
              echo '<p>Fecha Entrada: <input type="date" name="fecha_entrada"></p>';
              echo '<p>Fecha Salida: <input type="date" name="fecha_salida"></p>';
              echo '<p>Precio/día: <input type="text" value="'.$precio_cobrar.'" name="dinero_reserva" readonly></p>';


              //Si está logado (Existe email en la variable SESSION) que muestre el botón. Sino que muestre el mensaje de más abajo.
              if (isset($_SESSION["email"])) {
                echo '<p><input type="submit" value="Reservar" class="btn btn-primary" name="reservar_vivienda"></p>';
              } else {
                echo '<i><b>Debe estar registrado para poder reservar la vivienda.</b></i>';
              }

            echo '</form>';

          }
      } else {
        echo "Wrong Query";
      }

  }
?>





<br>











<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
