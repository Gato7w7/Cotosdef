<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIN</title>
    <link rel="shortcut icon" href="../icono.ico">
    <link rel="stylesheet" href="../CSS/generador_pin.css">
</head>

<body>
    <a href="/Awos/PHP/contactos_residente.php" class="user-button">Regresar</a>
    <div class="container">
        <div class="box">
            <form action="" method="post">
                <h3>PIN</h3>
                <input class="container-input" type="text" name="pin" placeholder="Ingresa el PIN" required><br>
                <input type="date" name="date">
                <button type="submit">Guardar</button>
            </form>


            <?php
            // Conectar a la base de datos
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "hogardigital";
            session_start();

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $usu = $_SESSION['Sesion'];
            $con = $_SESSION['Contrasena'];

            $sqlcasa = "SELECT NumCasa from residente where Usuario = '$usu' AND Contraseña = '$con';";
            $rescasa = $conn->query($sqlcasa);

            // Verificar si la consulta se realizó correctamente
            if ($rescasa === false) {
                die("Error al obtener el número de casa: " . $conn->error);
            }

            // Obtener el valor específico de la consulta
            $row = $rescasa->fetch_assoc();
            $num = $row['NumCasa'];

            // Verificar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener el PIN del formulario
                $pin = $_POST['pin'];
                $date = $_POST['date'];
                // Insertar el PIN en la tabla 'pines'
                $sql = "INSERT INTO pines (PIN, NumCasa, Duracion) VALUES ('$pin', '$num', '$date')";

                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("PIN agregado exitosamente");window.location.href="/Awos/PHP/contactos_residente.php";</script>';
                } else {
                    echo "Error al guardar el PIN: " . $conn->error;
                }
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>