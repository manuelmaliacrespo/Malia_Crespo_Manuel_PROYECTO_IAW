<!-- Incluyendo la parte del código de la cabecera (principalmente menú)-->
<?php include '../cabecera.php'; ?>


<?php

if($_SESSION["rol"] != "admin") {
  header ("Location: ../paginas/index.php");
}




?>


  <div align="">
    <h3 align="center">Extras</h3>
    <p><a href="extras_insertar.php">Añadir nuevo extra</a></p>
    <!-- Boton debajo de extras -->


    <?php


          $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
          //Conexion a la base de datos (localhost, usuario, contraseña, bd).


          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          //Validacion de la base de datos, en caso de error que lo muestre.

          $consulta="select * from extras";

          if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
              //Si el resultado es = 0, mostrar "Sin extras".
                echo "Sin extras";
              } else {

                //Si existe, mostrar usuarios en una tabla.

                echo "<table class='table table-bordered'>";
                  echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Actividad</th>";
                    echo "<th>Precio</th>";
                  echo "</tr>";

                while($obj = $result->fetch_object()) {

                  echo "<tr>";
                    echo "<td>".$obj->id_extras."</td>";
                    echo "<td>".$obj->actividad."</td>";
                    echo "<td>".$obj->precio."</td>";
                    echo "<td><a href='extras_editar.php?editar=$obj->id_extras'>Editar</a></td>";
                    echo "<td><a href='extras_eliminar.php?eliminar=$obj->id_extras'>Eliminar</a></td>";

                  echo "</tr>";


                };


              echo "</table>";


              }
          } else {
            echo "Wrong Query";
          }


    ?>






</div>

<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
