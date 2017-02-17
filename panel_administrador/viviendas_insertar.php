<?php include '../cabecera.php'; ?>


<?php

if($_SESSION["rol"] != "admin") {
  header ("Location: ../paginas/index.php");
}
//Si el rol "NO" es admin mandame a index.php
?>










<?php
//SI HACE CLIC EN EL INSERTAR
    if (isset($_POST["insertar_viviendas"])) {
    //Si existe el campo registro...
      $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
      //Conexion a la base de datos (localhost, usuario, contraseña, bd).

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Validacion de la base de datos, en caso de error que lo muestre.

      $consulta="insert into viviendas (nombre, localizacion, dormitorios, personas, mascotas, precio_baja, precio_media, precio_alta, descripcion)
      VALUES ('".$_POST["nombre"]."',
      '".$_POST["localizacion"]."',
      '".$_POST["dormitorios"]."',
      '".$_POST["personas"]."',
      '".$_POST["mascotas"]."',
      '".$_POST["precio_baja"]."',
      '".$_POST["precio_media"]."',
      '".$_POST["precio_alta"]."',
      '".$_POST["descripcion"]."')";


      if ($result = $connection->query($consulta)) {

            //VALID LOGIN. SETTING SESSION VARS
            header ("Location: viviendas.php");

      } else {
        echo "Wrong Query";
        echo $consulta;
      }

  }
?>


















<form action="viviendas_insertar.php" method="post">

          <input type="hidden" value="" name="id_vivienda" readonly>
          <p>NOMBRE: <input type="text" value="" name="nombre" required></p>
          <p>LOCALIZACIÓN: <input type="text" value="" name="localizacion"></p>
          <p>DORMITORIOS: <input type="text" value="" name="dormitorios"></p>
          <p>PERSONAS: <input type="text" value="" name="personas"></p>
          <p>MASCOTAS: <input type="text" value="" name="mascotas"></p>
          <p>TEMP. BAJA: <input type="text" value="" name="precio_baja"></p>
          <p>TEMP. MEDIA: <input type="text" value="" name="precio_media"></p>
          <p>TEMP. ALTA: <input type="text" value="" name="precio_alta"></p>
          <p>DESCRIPCIÓN: <textarea name="descripcion" style="width:250px"></textarea></p>


<p><input type="submit" value="Insertar nuevo" class="btn btn-primary" name="insertar_viviendas"></p>

</form>










<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
