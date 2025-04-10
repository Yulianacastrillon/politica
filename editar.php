<?php
include 'conexion.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];


    $consulta = mysqli_query($conn, "SELECT * FROM personas WHERE id_personas = $id");
    $row = mysqli_fetch_assoc($consulta);
} else {
    die("ID no válido.");
}

if (isset($_POST['actualizar'])) {
    $tipo = $_POST['tipo'];
    $documento = $_POST['documento'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $nacimiento = $_POST['nacimiento'];
    $estrato = $_POST['estrato'];
    $barrio = $_POST['barrio'];
    $sexo = $_POST['sexo'];
    $departamento = $_POST['departamento'];
    $municipio = $_POST['municipio'];
    $direccion = $_POST['direccion'];
    $lider = $_POST['lider'];
    $lugar = $_POST['lugar'];
    $mesa = $_POST['mesa'];


    $sql_update = "UPDATE personas SET tipo='$tipo', documento='$documento', nombres='$nombres', apellidos='$apellidos', telefono='$telefono', email='$email', nacimiento='$nacimiento', estrato='$estrato', barrio='$barrio', sexo='$sexo', departamento='$departamento', municipio='$municipio', direccion='$direccion', lider='$lider', lugar='$lugar', mesa='$mesa' WHERE id_personas=$id";
    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Registro actualizado correctamente.');</script>";
        header("Location: tabla.php");
        exit;
    } else {
        echo "Error al actualizar: " . mysqli_error($conn);
    }
}

mysqli_close($conn); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar registro</title>
    <link rel="stylesheet" href="editar.css"> <!-- Opcional: tu archivo de estilos -->
</head>
<body>
<h2 class="editar-titulo">Editar Registro</h2>
    <form method="POST">
    <div class="form-editar">
    <div>
    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo" required>
        <option value="">Seleccione un tipo de documento</option>
        <option value="cc" <?php echo ($row['tipo'] == "cc") ? 'selected' : ''; ?>>Cédula de ciudadanía</option>
        <option value="ti" <?php echo ($row['tipo'] == "ti") ? 'selected' : ''; ?>>Tarjeta de identidad</option>
        <option value="ce" <?php echo ($row['tipo'] == "ce") ? 'selected' : ''; ?>>Cédula de extranjería</option>
    </select>
    </div>

        <div>
            <label for="documento">Documento:</label>
            <input type="number" name="documento" id="documento" value="<?php echo $row['documento']; ?>" required>
        </div>

        <div>
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" required>
        </div>

        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $row['apellidos']; ?>" required>
        </div>

        <div>
            <label for="telefono">Telefono:</label>
            <input type="number" name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>" required>
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="emil" name="email" id="email" value="<?php echo $row['email']; ?>" required>
        </div>

        <div>
        <label for="nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="nacimiento" name="nacimiento" value="<?php echo $row['nacimiento']; ?>" required>
        </div>

        <div>
    <label for="estrato">Estrato:</label>
    <select id="estrato" name="estrato" required>
        <option value="" <?php echo ($row['estrato'] == "") ? 'selected' : ''; ?>>Seleccione</option>
        <option value="1" <?php echo ($row['estrato'] == "1") ? 'selected' : ''; ?>>1</option>
        <option value="2" <?php echo ($row['estrato'] == "2") ? 'selected' : ''; ?>>2</option>
        <option value="3" <?php echo ($row['estrato'] == "3") ? 'selected' : ''; ?>>3</option>
        <option value="4" <?php echo ($row['estrato'] == "4") ? 'selected' : ''; ?>>4</option>
        <option value="5" <?php echo ($row['estrato'] == "5") ? 'selected' : ''; ?>>5</option>
        <option value="6" <?php echo ($row['estrato'] == "6") ? 'selected' : ''; ?>>6</option>
    </select>
        </div>

        <div>
        <label for="barrio">Barrio:</label>
        <input type="text" id="barrio" name="barrio" value="<?php echo $row['barrio']; ?>" required>
        </div>

        <div>
    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
        <option value="" <?php echo ($row['sexo'] == "") ? 'selected' : ''; ?>>Seleccione</option>
        <option value="masculino" <?php echo ($row['sexo'] == "masculino") ? 'selected' : ''; ?>>Masculino</option>
        <option value="femenino" <?php echo ($row['sexo'] == "femenino") ? 'selected' : ''; ?>>Femenino</option>
        <option value="otro" <?php echo ($row['sexo'] == "otro") ? 'selected' : ''; ?>>Otro</option>
    </select>
       </div>

       <div>
    <label for="departamento">Departamento:</label>
    <select id="departamento" name="departamento" required>
        <option value="" <?php echo ($row['departamento'] == "") ? 'selected' : ''; ?>>Seleccione un departamento</option>
        <option value="Amazonas" <?php echo ($row['departamento'] == "Amazonas") ? 'selected' : ''; ?>>Amazonas</option>
        <option value="Antioquia" <?php echo ($row['departamento'] == "Antioquia") ? 'selected' : ''; ?>>Antioquia</option>
        <option value="Arauca" <?php echo ($row['departamento'] == "Arauca") ? 'selected' : ''; ?>>Arauca</option>
        <option value="Atlantico" <?php echo ($row['departamento'] == "Atlantico") ? 'selected' : ''; ?>>Atlántico</option>
        <option value="Bolivar" <?php echo ($row['departamento'] == "Bolivar") ? 'selected' : ''; ?>>Bolívar</option>
        <option value="Boyaca" <?php echo ($row['departamento'] == "Boyaca") ? 'selected' : ''; ?>>Boyacá</option>
        <option value="Caldas" <?php echo ($row['departamento'] == "Caldas") ? 'selected' : ''; ?>>Caldas</option>
        <option value="Caqueta" <?php echo ($row['departamento'] == "Caqueta") ? 'selected' : ''; ?>>Caquetá</option>
        <option value="Casanare" <?php echo ($row['departamento'] == "Casanare") ? 'selected' : ''; ?>>Casanare</option>
        <option value="Cauca" <?php echo ($row['departamento'] == "Cauca") ? 'selected' : ''; ?>>Cauca</option>
        <option value="Cesar" <?php echo ($row['departamento'] == "Cesar") ? 'selected' : ''; ?>>Cesar</option>
        <option value="Choco" <?php echo ($row['departamento'] == "Choco") ? 'selected' : ''; ?>>Chocó</option>
        <option value="Cordoba" <?php echo ($row['departamento'] == "Cordoba") ? 'selected' : ''; ?>>Córdoba</option>
        <option value="Cundinamarca" <?php echo ($row['departamento'] == "Cundinamarca") ? 'selected' : ''; ?>>Cundinamarca</option>
        <option value="Guainia" <?php echo ($row['departamento'] == "Guainia") ? 'selected' : ''; ?>>Guainía</option>
        <option value="Guaviare" <?php echo ($row['departamento'] == "Guaviare") ? 'selected' : ''; ?>>Guaviare</option>
        <option value="Huila" <?php echo ($row['departamento'] == "Huila") ? 'selected' : ''; ?>>Huila</option>
        <option value="La Guajira" <?php echo ($row['departamento'] == "La Guajira") ? 'selected' : ''; ?>>La Guajira</option>
        <option value="Magdalena" <?php echo ($row['departamento'] == "Magdalena") ? 'selected' : ''; ?>>Magdalena</option>
        <option value="Meta" <?php echo ($row['departamento'] == "Meta") ? 'selected' : ''; ?>>Meta</option>
        <option value="Nariño" <?php echo ($row['departamento'] == "Nariño") ? 'selected' : ''; ?>>Nariño</option>
        <option value="Norte de Santander" <?php echo ($row['departamento'] == "Norte de Santander") ? 'selected' : ''; ?>>Norte de Santander</option>
        <option value="Putumayo" <?php echo ($row['departamento'] == "Putumayo") ? 'selected' : ''; ?>>Putumayo</option>
        <option value="Quindio" <?php echo ($row['departamento'] == "Quindio") ? 'selected' : ''; ?>>Quindío</option>
        <option value="Risaralda" <?php echo ($row['departamento'] == "Risaralda") ? 'selected' : ''; ?>>Risaralda</option>
        <option value="San Andres y Providencia" <?php echo ($row['departamento'] == "San Andres y Providencia") ? 'selected' : ''; ?>>San Andrés y Providencia</option>
        <option value="Santander" <?php echo ($row['departamento'] == "Santander") ? 'selected' : ''; ?>>Santander</option>
        <option value="Sucre" <?php echo ($row['departamento'] == "Sucre") ? 'selected' : ''; ?>>Sucre</option>
        <option value="Tolima" <?php echo ($row['departamento'] == "Tolima") ? 'selected' : ''; ?>>Tolima</option>
        <option value="Valle del Cauca" <?php echo ($row['departamento'] == "Valle del Cauca") ? 'selected' : ''; ?>>Valle del Cauca</option>
        <option value="Vaupes" <?php echo ($row['departamento'] == "Vaupes") ? 'selected' : ''; ?>>Vaupés</option>
        <option value="Vichada" <?php echo ($row['departamento'] == "Vichada") ? 'selected' : ''; ?>>Vichada</option>
    </select>
</div>

        <div>
        <label for="municipio">Municipio:</label>
        <input type="text" id="municipio" name="municipio" value="<?php echo $row['municipio']; ?>" required>
        </div>

        <div>
        <label for="direccion">Direccion de Residencia:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>" required>
        </div>

        <div>
        <label for="lider">Nombre del Líder:</label>
<select id="lider" name="lider" required>
    <option value="" <?php echo ($row['lider'] == "") ? 'selected' : ''; ?>>Seleccione</option>
    <option value="elvia-milena" <?php echo ($row['lider'] == "elvia-milena") ? 'selected' : ''; ?>>Elvia Milena Sanjuán Dávila</option>
    <option value="nubia-carolina" <?php echo ($row['lider'] == "nubia-carolina") ? 'selected' : ''; ?>>Nubia Carolina Córdoba Curí</option>
    <option value="erasmo-elias" <?php echo ($row['lider'] == "erasmo-elias") ? 'selected' : ''; ?>>Erasmo Elías Zuleta Bechara</option>
    <option value="carlos-alberto" <?php echo ($row['lider'] == "carlos-alberto") ? 'selected' : ''; ?>>Carlos Alberto Posada</option>
    <option value="oscar-enrique" <?php echo ($row['lider'] == "oscar-enrique") ? 'selected' : ''; ?>>Óscar Enrique Sánchez Guerrero</option>
</select>
        </div>

        <div>
        <label for="lugar">Lugar de Votacion:</label>
        <input type="text" id="lugar" name="lugar" value="<?php echo $row['lugar']; ?>" required>
        </div>

        <div class="field-container">
    <label for="mesa">Mesa de Votación:</label>
    <select id="mesa" name="mesa" required>
        <option value="" <?php echo ($row['mesa'] == "") ? 'selected' : ''; ?>>Seleccione</option>
        <option value="1" <?php echo ($row['mesa'] == "1") ? 'selected' : ''; ?>>1</option>
        <option value="2" <?php echo ($row['mesa'] == "2") ? 'selected' : ''; ?>>2</option>
        <option value="3" <?php echo ($row['mesa'] == "3") ? 'selected' : ''; ?>>3</option>
        <option value="4" <?php echo ($row['mesa'] == "4") ? 'selected' : ''; ?>>4</option>
        <option value="5" <?php echo ($row['mesa'] == "5") ? 'selected' : ''; ?>>5</option>
        <option value="6" <?php echo ($row['mesa'] == "6") ? 'selected' : ''; ?>>6</option>
        <option value="7" <?php echo ($row['mesa'] == "7") ? 'selected' : ''; ?>>7</option>
        <option value="8" <?php echo ($row['mesa'] == "8") ? 'selected' : ''; ?>>8</option>
        <option value="9" <?php echo ($row['mesa'] == "9") ? 'selected' : ''; ?>>9</option>
        <option value="10" <?php echo ($row['mesa'] == "10") ? 'selected' : ''; ?>>10</option>
        <option value="11" <?php echo ($row['mesa'] == "11") ? 'selected' : ''; ?>>11</option>
        <option value="12" <?php echo ($row['mesa'] == "12") ? 'selected' : ''; ?>>12</option>
    </select>
</div>


        <button type="submit" name="actualizar">Actualizar</button>
</div>
    </form>
</body>
</html>