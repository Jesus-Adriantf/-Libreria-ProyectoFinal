<?php include("../template/cabecera.php"); ?>

<?php

    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
    $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    include("../config/bd.php");

    switch ($accion) {

        case "Agregar":
            $sentenciaSQL= $conexion->prepare("INSERT INTO autores (nombre, descripcion, imagen) VALUES (:nombre,:descripcion,:imagen);");
            $sentenciaSQL->bindParam(':nombre',$txtNombre);
            $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            if($tmpImagen!=""){
                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
            }

            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->execute();

            header("Location:autores.php");

            break;
        
        case "Modificar":
        // Modificar Nombre
            $sentenciaSQL= $conexion->prepare("UPDATE autores SET nombre=:nombre WHERE id=:id");
            $sentenciaSQL->bindParam(':nombre',$txtNombre);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

        // Modificar Descripcion
            $sentenciaSQL= $conexion->prepare("UPDATE autores SET descripcion=:descripcion WHERE id=:id");
            $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

        // Modificar Imagen
           if ($txtDescripcion!="") {

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $autor=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($autor["imagen"]) &&($autor["imagen"]!="imagen.jpg")){
                
                if(file_exists("../../img/".$autor["imagen"])){
                    
                    unlink("../../img/".$autor["imagen"]);
                }
            }

             $sentenciaSQL= $conexion->prepare("UPDATE autores SET imagen=:imagen WHERE id=:id");
             $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
             $sentenciaSQL->bindParam(':id',$txtID);
             $sentenciaSQL->execute();
             
           }

           header("Location:autores.php");

          //  echo "Presionado boton Modificar";
            break;

        case "Cancelar":
            
            header("Location:autores.php");

            break;


        case "Seleccionar":

            $sentenciaSQL= $conexion->prepare("SELECT * FROM autores WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $autor=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $txtNombre=$autor['nombre'];
            $txtDescripcion=$autor['descripcion'];
            $txtImagen=$autor['imagen'];
          //  echo "Presionado boton Seleccionar";
            break;

        case "Borrar":

            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM autores WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $autor=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($autor["imagen"]) &&($autor["imagen"]!="imagen.jpg")){
                
                if(file_exists("../../img/".$autor["imagen"])){
                    
                    unlink("../../img/".$autor["imagen"]);
                }
            }

           $sentenciaSQL= $conexion->prepare("DELETE FROM autores WHERE id=:id");
           $sentenciaSQL->bindParam(':id',$txtID);
           $sentenciaSQL->execute();

           header("Location:autores.php");

            break;
        
        default:
            
            break;
    }

$sentenciaSQL= $conexion->prepare("SELECT * FROM autores");
$sentenciaSQL->execute();
$listaAutores=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-5">

    <div class="card">

        <div class="card-header">
            Datos del Autor
        </div>

        <div class="card-body">

        <form method="POST" enctype="multipart/form-data">

        <div class = "form-group">
        <label for="txtID">ID:</label>
        <input type="txt"  required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID"  placeholder="ID">
        </div>

        <div class = "form-group">
        <label for="txtNombre">Nombre:</label>
        <input type="txt" required class="form-control" value="<?php echo $txtNombre; ?>"  name="txtNombre" id="txtNombre"  placeholder="Nombre del libro">
        </div>

        <div class = "form-group">
        <label for="txtPrecio">Descripcion:</label>
        <input type="txt" required class="form-control" value="<?php echo $txtDescripcion; ?>"  name="txtDescripcion" id="txtDescripcion"  placeholder="Descripcion del autor">
        </div>

        <div class = "form-group">
        <label for="txtImagen">Imagen:</label>

            <?php if($txtImagen!=""){ ?>

                <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen;?>" width="50" alt="" srcset="">

            <?php } ?>

             <input type="file" class="form-control" name="txtImagen" id="txtImagen"  placeholder="Nombre del autor>
             
        </div>

        <div class="btn-group" role="group" aria-label="">
            <br>
            <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":"" ?> value="Agregar" class="btn btn-success">Agregar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"" ?> value="Modificar" class="btn btn-warning">Modificar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"" ?> value="Cancelar" class="btn btn-info">Cancelar</button>
        </div>

        </form>

        </div>
    </div>


    
</div>

<div class="col-md-7">
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomre</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($listaAutores as $autores) {   ?>
            <tr>
                <td><?php echo $autores['id']; ?></td>
                <td><?php echo $autores['nombre']; ?></td>
                <td><?php echo $autores['descripcion']; ?></td>
                <td>
                    
                <img class="img-thumbnail rounded" src="../../img/<?php echo $autores['imagen']; ?>" width="60" alt="" srcset="">
                
                </td>

                <td>

                <form method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $autores['id']; ?>">

                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>

                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>

                </form>

                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>

</div>

<?php include("../template/pie.php"); ?>