<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "hogardigital";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

$usuario = $_POST['Usuario'];
$contraseña = $_POST['Contraseña'];

$sql = "SELECT * FROM caseta WHERE Usuario = '$usuario' AND Contraseña = '$contraseña'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../HTML/caceta.html");
} else {
    echo '<script>alert("Datos erroneos, Vuelva a intentarlo");window.location.href="/Awos/HTML/login_caseta.html";</script>';
}

$conn->close();
?>