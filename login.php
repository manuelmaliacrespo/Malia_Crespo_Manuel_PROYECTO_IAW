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
          //Validacion de la base de datos, en caso de error que lo muestre.
          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="select * from usuarios where
          email='".$_POST["email"]."' and clave=md5('".$_POST["clave"]."');";
          //Consulta y que muestre la clave encriptada en md5.
          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result = $connection->query($consulta)) {
              //No rows returned
              if ($result->num_rows===0) {
              //Si el resultado es = 0 muestrame Login invalido.
                echo "LOGIN INVALIDO";
              } else {
                //VALID LOGIN. SETTING SESSION VARS
                //Si mete en session el email-
                $_SESSION["email"]=$_POST["email"];
                $_SESSION["language"]="es";
                header("Location: index.php");
              }
          } else {
            echo "Wrong Query";
            //Si no error en la consulta.
          }

      }
    ?>

<!--Formulario con los datos que pido.-->

    <form action="login.php" method="post">

      <p><input name="email" required></p>
      <p><input name="clave" type="password" required></p>
      <p><input type="submit" value="Identificarme" name="login"></p>

    </form>
</div>


  </body>
</html>
