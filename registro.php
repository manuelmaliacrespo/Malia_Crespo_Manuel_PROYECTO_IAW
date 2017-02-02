<?php
  session_start();
  //Siempre se ha de empezar con session start.
?>
<div align="center">
<h1 align="center">Registro</h1>
<?php
    //FORM SUBMITTED
    if (isset($_POST["registro"])) {
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
      $consulta="insert into usuarios (email, clave, nombre, apellidos, dni)
      values ('".$_POST["email"]."', md5('".$_POST["clave"]."'), '".$_POST["nombre"]."', '".$_POST["apellidos"]."', '".$_POST["dni"]."')";

      //Test if the query was correct
      //SQL Injection Possible
      //Check http://php.net/manual/es/mysqli.prepare.php for more security
      if ($result = $connection->query($consulta)) {

            //VALID LOGIN. SETTING SESSION VARS
            header ("Location: index.php");

      } else {
        echo "Wrong Query";
      }

  }
?>


<form action="registro.php" method="post" autocomplete="off">

  <p>EMAIL: <input name="email" required></p>
  <p>CONTRASEÑA: <input name="clave" type="password" required></p>
  <p>NOMBRE: <input name="nombre" type="text" required></p>
  <p>APELLIDOS: <input name="apellidos" type="text" required></p>
  <p>DNI: <input name="dni" type="text" required></p>


  <p><input type="submit" value="Registrar" name="registro"></p>

</form>


</div>
