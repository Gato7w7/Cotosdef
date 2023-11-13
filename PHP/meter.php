<?php
$username = "root";
$password = "";
$database = "hogardigital";
$mysqli = new mysqli("localhost", $username, $password, $database);
session_start();

$nombre = $_POST['nombre'];
$apellido = $_POST['ape'];
$numero = $_POST['numero'];
$Redi = $_SESSION['ID'];

$query = "INSERT INTO contactos (Nombre, Apellido, Telefono, Resdidente_ID) VALUES ('$nombre', '$apellido', '$numero', $Redi)";
$result = $mysqli->query($query);

if ($mysqli->query($query)) {
    echo "Residente registrado con éxito.";
} else {
    echo "Error al registrar al residente: " . $mysqli->error;
}

// Cerrar la conexión a la base de datos
$mysqli->close();

?>