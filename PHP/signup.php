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

$sql = "SELECT * FROM residente WHERE Usuario = '$usuario' AND Contraseña = '$contraseña'";

$result = $conn->query($sql);

$sqlres = "SELECT NumCasa from residente where Usuario = '$usuario' AND Contraseña = '$contraseña';";
$resres = $conn->query($sqlres);
if ($resres){
    $fila = $resres -> fetch_assoc();
    $sesion = $fila['ID'];
}

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['Sesion'] = $usuario;
    $_SESSION['ID'] = $sesion;
    $_SESSION['Contrasena'] = $contraseña;
    header("Location: ../PHP/contactos_residente.php");
} else {
    echo '<script>alert("Datos erroneos, Vuelva a intentarlo");window.location.href="/Awos/HTML/login_residente.html";</script>';
}

$conn->close();
?>