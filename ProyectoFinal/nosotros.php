<?php include("template/cabecera.php"); ?>

<?php

    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
    $txtFecha=(isset($_POST['txtFecha']))?$_POST['txtFecha']:"";
    $txtAsunto=(isset($_POST['txtAsunto']))?$_POST['txtAsunto']:"";
    $txtComentario=(isset($_POST['txtComentario']))?$_POST['txtComentario']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    include("administrador/config/bd.php");

    switch ($accion) {

        case "Enviar":
            $sentenciaSQL= $conexion->prepare("INSERT INTO contacto (nombre, correo, fecha, asunto, comentario) VALUES (:nombre,:correo,:fecha,:asunto,:comentario);");
            $sentenciaSQL->bindParam(':nombre',$txtNombre);
            $sentenciaSQL->bindParam(':correo',$txtCorreo);
            $sentenciaSQL->bindParam(':fecha',$txtFecha);
            $sentenciaSQL->bindParam(':asunto',$txtAsunto);
            $sentenciaSQL->bindParam(':comentario',$txtComentario);
            $sentenciaSQL->execute();

            header("Location:nosotros.php");

            break;

    }

?>


<div class="card">

    <div class="card-header">
    <h2>Contacto:</h2> 
    
</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtNombre">Nombre:</label>
    <input type="txt" required class="form-control"  name="txtNombre" id="txtNombre" >
    <br>
    </div>

    <div class = "form-group">
    <label for="txtCorreo">Correo:</label>
    <input type="email" required class="form-control" name="txtCorreo" id="txtCorreo" >
    <br>
    </div>

    <div class = "form-group">
    <label for="txtFecha">Fecha:</label>
    <input type="date" required class="form-control"  name="txtFecha" id="txtFecha" >
    <br>
    </div>

    <div class = "form-group">
    <label for="txtAsunto">Asunto:</label>
    <input type="txt" required class="form-control"  name="txtAsunto" id="txtAsunto" >
    <br>
    </div>

    <div class = "form-group">
    <label for="txtComentario">Comentario:</label>
    <input type="txt" required class="form-control" name="txtComentario" id="txtComentario"  >
    <br>
    </div>


    <div class="btn-group" role="group" aria-label="">
        <button type="submit" required name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""?> value="Enviar" class="btn btn-success" style="background-color: #0069D9;">Enviar</button>
    </div>

</form>

</div>
</div>


<?php include("template/pie.php"); ?>
