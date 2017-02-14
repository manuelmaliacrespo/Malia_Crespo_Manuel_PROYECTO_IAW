<!-- Incluyendo la parte del código de la cabecera (principalmente menú)-->
<?php include '../cabecera.php'; ?>

<?php

  if($_SESSION["rol"] != "admin") {
    header ("Location: ../paginas/index.php");
  }
  //Si el rol "NO" es admin mandame a index.php
?>

  <div align="center">
    <h1 align="center"></h1>
    <?php

          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
          //Conexion a la base de datos (localhost, usuario, contraseña, bd).

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          //Validacion de la base de datos, en caso de error que lo muestre.

          $consulta="select * from viviendas";

          if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
              //Si el resultado es = 0 que me muestre que no hay viviendas.
                echo "Sin viviendas";
              } else {

                //TABLA HTML
                echo "<table class='table table-bordered'>";
                  echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Nombre</th>";
                    echo "<th></th>";
                    echo "<th></th>";
                  echo "</tr>";

                while($obj = $result->fetch_object()) {

                  echo "<tr>";
                    echo "<td>".$obj->id_vivienda."</td>";
                    echo "<td>".$obj->nombre."</td>";
                    echo "<td><a href='viviendas_editar.php?editar=$obj->id_vivienda'>Editar</a></td>";
                    echo "<td><a href='viviendas_eliminar.php?eliminar=$obj->id_vivienda'>Eliminar</a></td>";
                  echo "</tr>";
              //Si hay datos pues que me los muestre en una tabla.


                };


              }
          } else {
            echo "Wrong Query";
          }


    ?>


</div>


<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
