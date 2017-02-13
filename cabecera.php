<?php
  session_start();
  //Siempre se ha de empezar con session start.
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Alquiler de viviendas</title>


    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">


    <link href="../css/navbar.css" rel="stylesheet">


    <script src="../js/ie-emulation-modes-warning.js"></script>


  </head>

  <body>

    <div class="container">


      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="../paginas/index.php">Cádizerestú</a>
            <!--Nombre de la web.-->
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="#">Contacto</a></li>

              <?php
                //Si el rol es admin, muestrame el boton Panel de Control (--).
                if (isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin") {
                  echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Panel Administración <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="../panel_administrador/usuarios.php">Usuarios</a></li>
                      <li><a href="../panel_administrador/viviendas.php">Viviendas</a></li>
                      <li><a href="#">Extras</a></li>
                    </ul>
                  </li>';
                }
              ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">


            <?php
            //Si existe email, lo mostramos y añadimos boton para deslogarse.
            //En caso contrario añadimos el boton login y registro.
            if (isset($_SESSION["email"])) {
              echo '<li><a href="">'.$_SESSION["email"].'</a></li>';
              echo '<li><a href="../paginas/logout.php">Deslogue</a></li>';
            } else {
              echo '<li><a href="login.php">Login</a></li>';
              echo '<li><a href="registro.php">Registro</a></li>';
            }

            ?>



            </ul>
          </div>
        </div>
      </nav>
