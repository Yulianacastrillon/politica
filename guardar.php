<?php
require_once 'conexion.php';

mysqli_set_charset($conn, "utf8mb4");

$id_personas=trim($_POST['id_personas']);
$tipo=trim($_POST['tipo']);
$documento=trim($_POST['documento']);
$nombres=trim($_POST['nombres']);
$apellidos=trim($_POST['apellidos']);
$telefono=trim($_POST['telefono']);
$email=trim($_POST['email']);
$nacimiento=trim($_POST['nacimiento']);
$estrato=trim($_POST['estrato']);
$barrio=trim($_POST['barrio']);
$sexo=trim($_POST['sexo']);
$departamento=trim($_POST['departamento']);
$municipio=trim($_POST['municipio']);
$direccion=trim($_POST['direccion']);
$lider=trim($_POST['lider']);
$lugar=trim($_POST['lugar']);
$mesa=trim($_POST['mesa']);
$autorizo=trim($_POST['autorizo']);


$consulta = mysqli_query($conn, "SELECT * FROM personas WHERE LOWER(documento)=LOWER('$documento')");


if(mysqli_num_rows($consulta)==0) {
   
    $query = "INSERT INTO personas(id_personas,tipo,documento,nombres,apellidos,telefono,email,nacimiento,estrato,barrio,sexo,departamento,municipio,direccion,lider,lugar,mesa,autorizo) VALUES('$id_personas','$tipo','$documento','$nombres','$apellidos','$telefono','$email','$nacimiento','$estrato','$barrio','$sexo','$departamento','$municipio','$direccion','$lider','$lugar','$mesa','$autorizo')";

    if (mysqli_query($conn,$query)) {
        echo "Datos fueron guardados exitosamente.";
    } else {
        echo "Error, datos No guardados: " . mysqli_error($conn);
    }
} else {
    echo "Los datos no fueron guardados, ya existe un registro con el mismo documento..";
}

mysqli_close($conn);

?>