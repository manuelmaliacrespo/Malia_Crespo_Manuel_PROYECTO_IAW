<?php
  session_start();
  //Siempre se ha de empezar con session start.
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href=" ">
  </head>
  <body>

  <div align="center">
    <h1 align="center">Inserte sus datos</h1>
    <?php
        //FORM SUBMITTED
        if (isset($_POST["login"])) {
          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
          //Conexion a la base de datos (localhost, usuario, contraseña, bd).
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
  ?>
  </div>
  </body>
</html>
