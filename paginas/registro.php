

    <!-- Incluyendo la parte del código de la cabecera (principalmente menú)-->
    <?php include '../cabecera.php'; ?>




<div align="center">
<h1 align="center">Registro</h1>
<?php

    if (isset($_POST["registro"])) {
    //Si existe el campo registro...
      $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
      //Conexion a la base de datos (localhost, usuario, contraseña, bd).

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Validacion de la base de datos, en caso de error que lo muestre.

      $consulta="insert into usuarios (email, clave, nombre, apellidos, dni, rol)
      values ('".$_POST["email"]."', md5('".$_POST["clave"]."'), '".$_POST["nombre"]."', '".$_POST["apellidos"]."', '".$_POST["dni"]."', 'usuario')";

      echo $consulta;

      if ($result = $connection->query($consulta)) {

            //VALID LOGIN. SETTING SESSION VARS
            header ("Location: index.php");

      } else {
        echo "Wrong Query";
      }

  }
?>

<!--Formulario con los datos que solicito.-->
<form action="registro.php" method="post" autocomplete="off">

  <p>EMAIL: <input name="email" required></p>
  <p>CONTRASEÑA: <input name="clave" type="password" required></p>
  <p>NOMBRE: <input name="nombre" type="text" required></p>
  <p>APELLIDOS: <input name="apellidos" type="text" required></p>
  <p>DNI: <input name="dni" type="text" required></p>


  <p><input type="submit" value="Registrar" name="registro"></p>

</form>


</div>




<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
