<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="prueba.php" method="post">
        <label for="codigo">Ingresa tu código:</label><br>
        <textarea name="codigo" rows="10" cols="30" required></textarea><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hogardigital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
if(isset($_POST['codigo'])) {
// Obtener el código del formulario
$codigo = $_POST['codigo'];

// Preparar la consulta SQL para insertar el código en la base de datos
$sql = "INSERT INTO pines (PIN) VALUES ('$codigo')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Código guardado con éxito.";
} else {
    echo "Error al guardar el código: " . $conn->error;
}}

// Cerrar la conexión
$conn->close();
?>
