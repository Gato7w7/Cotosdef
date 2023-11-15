<?php
$username = "root";
$password = "";
$database = "hogardigital";
$mysqli = new mysqli("localhost", $username, $password, $database);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <!-- Agrega tus estilos o enlaces CSS necesarios aquí -->
</head>

<body>
    <a href="admin.php" class="back-button">Regresar</a>
    <!-- Agrega tu formulario de modificación aquí -->
    <h1>Modificar Registro</h1>
    <form method="post" action="">
        <!-- Campo oculto para almacenar el ID del registro -->
        <input type="hidden" name="id_modificar" value="<?php echo htmlspecialchars($_POST["id_modificar"]); ?>">

        <!-- Campos para los nuevos valores del registro (puedes agregar más campos según sea necesario) -->
        <label for="nuevo_nombre">Nuevo Nombre:</label>
        <input type="text" name="nuevo_nombre" required>

        <label for="nuevo_apellido">Nuevo Apellido:</label>
        <input type="text" name="nuevo_apellido" required>

        <label for="nuevo_telefono">Nuevo Teléfono:</label>
        <input type="text" name="nuevo_telefono" required>

        <!-- Botón de submit para enviar el formulario -->
        <input type="submit" name="modificar_registro" value="Guardar Cambios">
    </form>
</body>

</html>