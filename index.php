<?php
session_start();
//Comienzo de la sesion.

if (!isset($_SESSION["email"])) {
//Si no existe el email.
  session_destroy();
  header("Location: login.php");
}
//Destruye la session y ademas redireccioname al login.php

echo "Se ha logado perfectamente.";
//Si existe el email, muestrame "Se ha logado perfectamente".

?>
