<?php $host="localhost";
    $bd="librería";
    $ususario="root";
    $contrasenia="";

    try {

        $conexion=new PDO("mysql:host=$host;dbname=$bd",$ususario,$contrasenia );
        if($conexion){
            //echo "Conectado... a sistema ";
        };

    } catch (Exception $ex) {
       
        echo $ex->getMessage();
    }

?>