<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tabla.css"> <!-- Enlace para tus estilos personalizados -->
    <title>Tabla de Registros</title>
</head>

<body>
<?php
include 'conexion.php';
echo "<table border='1' class='table table-striped table-bordered tabla'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>E-mail</th>
            <th>Nacimiento</th>
            <th>Estrato</th>
            <th>Bario</th>
            <th>Sexo</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Direccion</th>
            <th>Lider</th>
            <th>Lugar</th>
            <th>Mesa</th>
            <th>Autorizo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
      </thead>";
echo "<tbody>";

$consulta = mysqli_query($conn, "SELECT id_personas, tipo, documento, nombres, apellidos, telefono, email, nacimiento, estrato, barrio, sexo, departamento, municipio, direccion, lider, lugar, mesa, autorizo FROM personas");

if ($consulta && mysqli_num_rows($consulta) > 0) {
    while ($row = mysqli_fetch_assoc($consulta)) {
        echo "<tr>";
        echo "<td>" . $row['id_personas'] . "</td>";
        echo "<td>" . $row['tipo'] . "</td>";
        echo "<td>" . $row['documento'] . "</td>";
        echo "<td>" . $row['nombres'] . "</td>";
        echo "<td>" . $row['apellidos'] . "</td>";
        echo "<td>" . $row['telefono'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['nacimiento'] . "</td>";
        echo "<td>" . $row['estrato'] . "</td>";
        echo "<td>" . $row['barrio'] . "</td>";
        echo "<td>" . $row['sexo'] . "</td>";
        echo "<td>" . $row['departamento'] . "</td>";
        echo "<td>" . $row['municipio'] . "</td>";
        echo "<td>" . $row['direccion'] . "</td>";
        echo "<td>" . $row['lider'] . "</td>";
        echo "<td>" . $row['lugar'] . "</td>";
        echo "<td>" . $row['mesa'] . "</td>";
        echo "<td>" . $row['autorizo'] . "</td>";
        echo "<td><a href='editar.php?id=" . $row['id_personas'] . "' class='boton-editar'>Editar</a></td>";
        echo "<td><a href='eliminar.php?id=" . $row['id_personas'] . "' class='boton-eliminar' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\");'>Eliminar</a></td>";
        echo "</tr>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay registros</td></tr>";
}

echo "</tbody>";
echo "</table>";

mysqli_close($conn);

?>
</body>
</html>