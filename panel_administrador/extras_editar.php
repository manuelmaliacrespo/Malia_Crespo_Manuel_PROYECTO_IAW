<!-- Incluyendo la parte del código de la cabecera (principalmente menú)-->
<?php include '../cabecera.php'; ?>


<?php

if($_SESSION["rol"] != "admin") {
  header ("Location: ../paginas/index.php");
}
//Si el rol "NO" es admin mandame a index.php
?>







<?php
//SI HACE CLIC EN EL EDITAR
    if (isset($_POST["editar_extras"])) {
    //Si existe el campo registro...
      $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
      //Conexion a la base de datos (localhost, usuario, contraseña, bd).

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Validacion de la base de datos, en caso de error que lo muestre.

      $consulta="update extras set email='".$_POST["email"]."', nombre='".$_POST["nombre"]."',  apellidos='".$_POST["apellidos"]."', dni='".$_POST["dni"]."', rol='".$_POST["rol"]."' where id_extras='".$_POST["id_extras"]."'";

      echo $consulta;

      if ($result = $connection->query($consulta)) {

            //VALID LOGIN. SETTING SESSION VARS
            header ("Location: usuarios.php");

      } else {
        echo "Wrong Query";
      }

  }
?>







<?php
//VIENE DE USUARIOS.PHP RELLENAMOS EL FORMULARIO CON LOS DATOS DEL USUARIO.
if (isset($_GET["editar"])) {

  $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
  //Conexion a la base de datos (localhost, usuario, contraseña, bd).

  $consulta = "select * from extras where id_extras=".$_GET["editar"]."";


  if ($result = $connection->query($consulta)) {

      if ($result->num_rows===0) {

        echo "No existe el extra";
      } else {


        $obj = $result->fetch_object();

        echo '<form action="extras_editar.php" method="post">

          <input type="hidden" value="'.$obj->id_extras.'" name="id_extras" readonly>
          <p>ACTIVIDAD: <input value="'.$obj->actividad.'" name="actividad" required></p>


          <p><input type="submit" value="Editar" class="btn btn-primary" name="editar_extras"></p>

        </form>';

      }
  } else {
    echo "Wrong Query";
  }

}

?>


<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
