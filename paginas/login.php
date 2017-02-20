

  <!-- Incluyendo la parte del código de la cabecera (principalmente menú)-->
  <?php include '../cabecera.php'; ?>


  <div align="center">
    <h1 align="center">Inserte sus datos</h1>
    <?php
        //FORM SUBMITTED
        //Si esxiste el login por $ POST conectarse a la base de datos.
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
          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result = $connection->query($consulta)) {
              //No rows returned
              if ($result->num_rows===0) {
              //Si el resultado de la consulta = 0 mostrarme "LOGIN INVALIDO".
                echo "LOGIN INVALIDO";
              } else {
                //VALID LOGIN. SETTING SESSION VARS

                //Recuperamos el resultado de la consulta.
                $obj = $result->fetch_object();

                //Incluimos cada campo en session.
                //Incluimos en la $SESSION cada uno de los resultados del formulario.
                $_SESSION["id_usuario"] = $obj->id_usuario;
                $_SESSION["email"] = $obj->email;
                $_SESSION["nombre"] = $obj->nombre;
                $_SESSION["apellidos"] = $obj->apellidos;
                $_SESSION["dni"] = $obj->dni;
                $_SESSION["rol"] = $obj->rol;
                $_SESSION["language"]="es";

                header("Location: index.php");
                //Redireccion a index.php
              }
          } else {
            echo "Wrong Query";
          }

      }
    ?>

    <form action="login.php" method="post" autocomplete="off">

      <p><input name="email" required></p>
      <p><input name="clave" type="password" required></p>
      <p><input type="submit" value="Identificarme" name="login"></p>

    </form>
</div>



    <!-- Incluyendo la parte del código de la parte de abajo de la página. -->
    <?php include '../piepagina.php'; ?>
