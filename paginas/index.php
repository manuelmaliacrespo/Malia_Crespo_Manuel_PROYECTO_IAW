<!-- Incluyendo la parte del código de la cabecera (principalmente menú)-->
<?php include '../cabecera.php'; ?>







<!-- Contenido de la pagina index -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>
  <!--Parte del carrusel -->
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img style="height:400px; width:100%;" src="../images/carrusel/montana.jpeg" alt="...">
      <div class="carousel-caption">
        Montaña
      </div>
    </div>
    <div class="item">
      <img style="height:400px; width:100%;" src="../images/carrusel/faro.jpg" alt="...">
      <div class="carousel-caption">
        Faro
      </div>
    </div>

    <div class="item">
      <img style="height:400px; width:100%;" src="../images/carrusel/noche.jpg" alt="...">
      <div class="carousel-caption">
        Noche
      </div>
    </div>

    <div class="item">
      <img style="height:400px; width:100%;" src="../images/carrusel/surf.png" alt="...">
      <div class="carousel-caption">
        Surf
      </div>
    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>









<!-- Incluyendo la parte del código de la parte de abajo de la página. -->
<?php include '../piepagina.php'; ?>
