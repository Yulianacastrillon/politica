<?php
include 'conexion.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql_delete = "DELETE FROM personas WHERE id_personas = $id";
    if (mysqli_query($conn, $sql_delete)) {
        echo "Registro eliminado correctamente.";
        header("Location: tabla.php");
        exit;
    } else {
        echo "Error al eliminar: " . mysqli_error($conn);
    }
} else {
    echo "No se recibió un ID válido.";
}
?>