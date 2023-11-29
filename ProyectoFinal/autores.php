<?php include("template/cabecera.php"); ?>

<?php
include("administrador/config/bd.php");
$sentenciaSQL= $conexion->prepare("SELECT * FROM autores");
$sentenciaSQL->execute();
$listaAutores=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaAutores as $autor) { ?>

<div class="col-md-2">
    <div class="card">
    <img class="card-img-top" src="./img/<?php echo $autor['imagen']; ?>" height="200" alt="">
    <div class="card-body">
        <h4 class="card-title"><?php echo $autor['nombre']; ?></h4>
        <h6><?php echo $autor['descripcion']; ?></h6>
        <a name="" id="" class="btn btn-primary" href="#" role="button">Ver más</a>
    </div>
    </div>
</div>

<?php }?>


<?php include("template/pie.php"); ?>