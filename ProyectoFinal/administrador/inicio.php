<?php include('template/cabecera.php'); ?>
        <div class="col-md-12">
            

  <div class="jumbotron">
    <h1 class="display-3">Bienvenido <?php echo $nombreUsuario; ?></h1>
    <p class="lead">Administrar los libros y autores del sitio web</p>
    <hr class="my-2">
    <p>Usuario: admin</p>
    <p>Contraseña: 1234</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="seccion/libros.php" role="button">Administrar libros</a>
        <a class="btn btn-primary btn-lg" href="seccion/autores.php" role="button">Administrar autores</a>
    </p>

  </div>

  </div>

  <?php include('template/pie.php'); ?>