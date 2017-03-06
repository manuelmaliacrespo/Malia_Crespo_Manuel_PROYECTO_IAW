<!-- Incluyendo la parte del código de la cabecera (principalmente menú)-->
<?php include '../cabecera.php'; ?>




<?php

    if (isset($_POST["reservar_vivienda"])) {
    //Si existe petición $_POST reservar_vivienda

      $connection = new mysqli("localhost", "mmalia", "123456", "proyecto");
      //Conexion base de datos

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Validación

      $consulta="INSERT INTO reservas (fecha_entrada, fecha_salida, estado, dinero_reserva, fecha_reserva, id_usuario, id_vivienda)
      VALUES ('".$_POST["fecha_entrada"]."', '".$_POST["fecha_salida"]."', 'PENDIENTE', '".$_POST["dinero_reserva"]."', now(), '".$_SESSION["id_usuario"]."', '".$_POST["id_vivienda"]."')";
      //Consulta para insertar "reserva" con campos de reserva.

      if ($result = $connection->query($consulta)) {
      //Si hay resultado...
      //copiado de internet.
      function dias_transcurridos($fecha_i,$fecha_f) {
          $dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
          $dias 	= abs($dias); $dias = floor($dias);
          return $dias;
      }
      $dias = dias_transcurridos($_POST["fecha_entrada"], $_POST["fecha_salida"]);


      $dinero_reserva = $_POST["dinero_reserva"];
      $dinero_porcentaje = $dinero_reserva*0.3;
      $resultado = $dinero_porcentaje*$dias;
      echo "Se ha hecho la reserva correctamente. Aquí metemos los datos bancarios para hacer el ingreso.";
      echo "<br>Haz el ingreso en ES00 0000 0000 00 0000000000 de la señal: ".$resultado." Euros.";



      } else {
        echo "Wrong Query";
        //Fallo en la query.
      }

  }
?>







<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
