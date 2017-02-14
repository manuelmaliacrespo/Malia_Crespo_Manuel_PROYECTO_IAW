<?php include '../cabecera.php'; ?>


<?php

if($_SESSION["rol"] != "admin") {
  header ("Location: ../paginas/index.php");
}
//Si el rol "NO" es admin mandame a index.php
?>











<?php
//SI HACE CLIC EN EL EDITAR
    if (isset($_POST["editar_viviendas"])) {
    //Si existe el campo registro...
      $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
      //Conexion a la base de datos (localhost, usuario, contraseña, bd).

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Validacion de la base de datos, en caso de error que lo muestre.

      $consulta="update viviendas set nombre='".$_POST["nombre"]."' where id_vivienda='".$_POST["id_vivienda"]."'";



      if ($result = $connection->query($consulta)) {

            //VALID LOGIN. SETTING SESSION VARS
            header ("Location: viviendas.php");

      } else {
        echo "Wrong Query";
        echo $consulta;
      }

  }
?>




























<?php
//VIENE DE USUARIOS.PHP RELLENAMOS EL FORMULARIO CON LOS DATOS DEL USUARIO.
if (isset($_GET["editar"])) {

  $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
  //Conexion a la base de datos (localhost, usuario, contraseña, bd).

  $consulta = "select * from viviendas where id_vivienda=".$_GET["editar"]."";


  if ($result = $connection->query($consulta)) {

      if ($result->num_rows===0) {

        echo "No existe la vivienda";
      } else {


        $obj = $result->fetch_object();

        echo '<form action="viviendas_editar.php" method="post">

          <input type="hidden" value="'.$obj->id_vivienda.'" name="id_vivienda" readonly>
          <p>NOMBRE: <input value="'.$obj->nombre.'" name="nombre" required></p>




          <p><input type="submit" value="Editar" class="btn btn-primary" name="editar_viviendas"></p>

        </form>';

      }
  } else {
    echo "Wrong Query";
  }

}

?>


<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
