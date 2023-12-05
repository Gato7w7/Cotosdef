<?php
$username = "root";
$password = "";
$database = "hogardigital";
$mysqli = new mysqli("localhost", $username, $password, $database);
session_start();

// Verificar conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM registros";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Awos/CSS/Registros_dia.css">
    <link rel="shortcut icon" href="/Awos/icono.ico">

    <title>Tabla de Registros</title>
</head>
<body>
<button class="back-button" onclick="history.go(-1)">Regresar</button>

    <table>
        <tr>
            <th>Tipo_T</th>
            <th>Cantidad_P</th>
            <th>Nombre_Contacto</th>
            <th>Hora_Entrada</th>
            <th>Hora_Salida</th>
            <th>Foto</th>
        </tr>

        <?php
        // Verificar si hay resultados y mostrarlos
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["Tipo_T"] . "</td>
                        <td>" . $row["Cantidad_P"] . "</td>
                        <td>" . $row["Nombre_Contacto"] . "</td>
                        <td>" . $row["Hora_Entrada"] . "</td>
                        <td>" . $row["Hora_Salida"] . "</td>
                        <td>";

                // Verificar si hay una foto
                if ($row["Foto"] !== null) {
                    // Mostrar la foto en la tabla
                    $imagenBase64 = base64_encode($row['Foto']);

                    if ($imagenBase64 !== false) {
                        echo "<img src='data:image/png;base64," . $imagenBase64 . "' alt='Imagen'/>";
                    } else {
                        echo "Error al decodificar la imagen";
                    }
                } else {
                    echo "No hay foto disponible";
                }

                echo "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='7'>0 resultados</td></tr>";
        }
        ?>

    </table>

    <?php
    // Cerrar conexión
    $mysqli->close();
    ?>

</body>
</html>
