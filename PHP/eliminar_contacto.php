<?php
 $username = "root";
 $password = "";
 $database = "hogardigital";
 $mysqli = new mysqli("localhost", $username, $password, $database);
 session_start();

if (isset($_POST['eliminar_contacto'])) {
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    // Aquí debes construir una consulta SQL para eliminar el contacto basado en los datos proporcionados.
    // Ten en cuenta que esta consulta es solo un ejemplo y debe ser adaptada según la estructura de tu base de datos.

    $query = "DELETE FROM contactos WHERE Apellido = '$apellido' AND Nombre = '$nombre' AND Telefono = '$telefono'";

    if ($mysqli->query($query)) {
        echo '<script>alert("Contacto eliminado exitosamente");window.location.href="/Awos/PHP/contactos_residente.php";</script>';
    } else {
        echo "Error al eliminar el contacto: " . $mysqli->error;
    }
}

// Redirige de nuevo a la página de lista de contactos después de eliminar
//header("Location: /Awos/PHP/contactos_residente.php");
exit;
?>
