<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $numCasa = $_POST['num_casa'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];

    // Conectar a la base de datos
    $username = "root";
    $password = "";
    $database = "hogardigital";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    session_start();

    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    // Crear la consulta SQL de inserción
    $query = "INSERT INTO residente (NumCasa, Nombre_R, Apellido_R, Usuario, Contraseña, Telefono) 
              VALUES ('$numCasa', '$nombre', '$apellido', '$usuario', '$contrasena', '$telefono')";

    // Ejecutar la consulta de inserción
    if ($mysqli->query($query)) {
        echo '<script>alert("Residente agregado exitosamente");window.location.href="/Awos/PHP/admin.php";</script>';
    } else {
        echo "Error al registrar al residente: " . $mysqli->error;
    }

    // Cerrar la conexión a la base de datos
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../CSS/agr_cue.css"></head>
<body>
<a href="/Awos/PHP/admin.php" class="btn-regresar">Regresar</a>
    <div class="container">
        <div class="box">
            <form action="" method="post">
                <h3>Agregar Cuenta</h3>

                <input type="text" name="num_casa" placeholder="Num. Casa" required>
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="text" name="contrasena" placeholder="Contraseña" required>
                <input type="text" name="telefono" placeholder="Telefono" required>

                <button type="submit">Registrar</button>
            </form>
        </div>
    </div>
</body>
</html>
