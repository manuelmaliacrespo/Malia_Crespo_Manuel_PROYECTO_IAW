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
    if (isset($_POST["editar_usuario"])) {
    //Si existe el campo registro...
      $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
      //Conexion a la base de datos (localhost, usuario, contraseña, bd).

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Validacion de la base de datos, en caso de error que lo muestre.

      $consulta="update usuarios set email='".$_POST["email"]."', nombre='".$_POST["nombre"]."',  apellidos='".$_POST["apellidos"]."', dni='".$_POST["dni"]."', rol='".$_POST["rol"]."' where id_usuario='".$_POST["id_usuario"]."'";

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

  $consulta = "select * from usuarios where id_usuario=".$_GET["editar"]."";


  if ($result = $connection->query($consulta)) {

      if ($result->num_rows===0) {

        echo "No existe el usuario";
      } else {


        $obj = $result->fetch_object();

        echo '<form action="usuarios_editar.php" method="post">

          <input type="hidden" value="'.$obj->id_usuario.'" name="id_usuario" readonly>
          <p>EMAIL: <input value="'.$obj->email.'" name="email" required></p>
          <p>NOMBRE: <input value="'.$obj->nombre.'" name="nombre" type="text" required></p>
          <p>APELLIDOS: <input value="'.$obj->apellidos.'" name="apellidos" type="text" required></p>
          <p>DNI: <input value="'.$obj->dni.'" name="dni" type="text" required></p>
          <p>ROL: <input value="'.$obj->rol.'" name="rol" type="text" required></p>


          <p><input type="submit" value="Editar" class="btn btn-primary" name="editar_usuario"></p>

        </form>';

      }
  } else {
    echo "Wrong Query";
  }

}

?>


<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
