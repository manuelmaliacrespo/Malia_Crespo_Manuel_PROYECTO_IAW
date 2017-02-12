<?php
  session_start();
  //Siempre se ha de empezar con session start.

  if($_SESSION["rol"] != "admin") {
    header ("Location: ../index.php");
  }
?>


  <div align="center">
    <h1 align="center"></h1>
    <?php


          $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
          //Conexion a la base de datos (localhost, usuario, contraseña, bd).

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          //Validacion de la base de datos, en caso de error que lo muestre.

          $consulta="select * from usuarios";

          if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
              //Si el resultado es = 0 que me muestre que no hay usuarios.
                echo "Sin usuarios";
              } else {
                //TABLA HTML
                //Si existen que me muestre los usuarios en una tabla.
                echo "<table border='1'>";
                  echo "<tr>";
                    echo "<td>ID</td>";
                    echo "<td>EMAIL</td>";
                    echo "<td>NOMBRE</td>";
                    echo "<td>APELLIDOS</td>";
                    echo "<td>DNI</td>";
                    echo "<td>ROL</td>";
                  echo "</tr>";

                while($obj = $result->fetch_object()) {

                  echo "<tr>";
                    echo "<td>".$obj->id_usuario."</td>";
                    echo "<td>".$obj->email."</td>";
                    echo "<td>".$obj->nombre."</td>";
                    echo "<td>".$obj->apellidos."</td>";
                    echo "<td>".$obj->dni."</td>";
                    echo "<td>".$obj->rol."</td>";
                  echo "</tr>";


                };


              }
          } else {
            echo "Wrong Query";
          }


    ?>


</div>


  </body>
</html>
