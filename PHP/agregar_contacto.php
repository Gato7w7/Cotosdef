
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = "root";
    $password = "";
    $database = "hogardigital";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    session_start();

    $nom = $_POST['nombre'];
    $ape = $_POST['ape'];
    $tele = $_POST['numero'];
    $ses = $_SESSION['ID'];

    $queraso = "SELECT NumCasa FROM residente WHERE NumCasa = '$ses'";
    $resultQueraso = $mysqli->query($queraso);

    if ($resultQueraso) {
        // Verificar si se obtuvo algún resultado
        if ($resultQueraso->num_rows > 0) {
            echo "No se encontró el número de casa. Valor de \$_SESSION['ID']: {$_SESSION['ID']}";


        } else {
            $row = $resultQueraso->fetch_assoc();
            // Obtener el valor de NumCasa
            $numCasa = $row['NumCasa'];
    
            // Ahora puedes utilizar $numCasa en tu consulta INSERT
            $query = "INSERT INTO contactos (Nombre, Apellido, Telefono, Residente_ID) VALUES ('$nom', '$ape', '$tele', '$numCasa')";
            $mysqli->query($query);
            
            // Resto del código...
            echo '<script>alert("Contacto agregado exitosamente");window.location.href="/Awos/PHP/contactos_residente.php";</script>';

        }
    } else {
        echo "Error en la consulta: " . $mysqli->error;
    }

    // Cerrar la conexión a la base de datos
    $mysqli->close();

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Contacto</title>
    <link rel="stylesheet" href="/Awos/CSS/agregarcon.css">
    <link rel="shortcut icon" href="../icono.ico">
</head>

<body>
    <a href="/Awos/PHP/contactos_residente.php" class="btn-regresar">Regresar</a>
    <div class="container">
        <div class="box">
            <form action="" method="post">
                <h3>Agregar Contacto</h3>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Nombre" name="nombre" required>

                <label for="numero">Número de Teléfono</label>
                <input type="text" placeholder="Número de Teléfono" name="numero" required>

                <label for="ape">Apellido</label>
                <input type="text" placeholder="Apellido" name="ape" required>

                <button type="submit" class="btn-agregar">Agregar Contacto</button>
            </form>
        </div>
    </div>
</body>

</html>
