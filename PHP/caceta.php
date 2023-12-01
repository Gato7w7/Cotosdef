<?php
$conn = new mysqli("localhost", "root", "", "hogardigital");
echo ' <script>
document.getElementById("vus").addEventListener("submit", function(event) {
    event.preventDefault();
});
</script>';

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
session_start();

if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header("Location: /Awos/index.html");
    exit;

}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["foto"]["name"])) {               
    $tipo_t = $_POST['tipo_t'];
    $cantidad_p = $_POST['cantidad_p'];
    $nombre_contacto = $_POST['nombre_contacto'];
    $hora_entrada = $_POST['hora_entrada'];
    $hora_salida = $_POST['hora_salida'];
    
    $foto_name = $_FILES["foto"]["name"];
    $foto_tmp = $_FILES["foto"]["tmp_name"];



    $foto_data = file_get_contents($foto_tmp);
    $foto_name = mysqli_real_escape_string($conn, $foto_name);
    $foto_data = mysqli_real_escape_string($conn, $foto_data);


    $query = "INSERT INTO registros (`Tipo_T`, `Cantidad_P`, `Nombre_Contacto`, `Hora_Entrada`, `Hora_Salida`, `Foto`)
              VALUES ('$tipo_t', '$cantidad_p', '$nombre_contacto', '$hora_entrada', '$hora_salida', '$foto_data')";

    $result = $conn->query($query);

    if ($result) {
        echo "Registro creado correctamente.";
        // Puedes realizar otras acciones aquí si es necesario
    } else {
        echo "Error al cargar el registro: " . $conn->error;
    }

}
$pins = $_POST['pin'];
    $busqe = "SELECT Nombre from contactos WHERE Pin = '$pins';";
    
    $salida= $conn->query($busqe);
    
    $rows = $salida -> fetch_assoc();
    if(isset($rows['Nombre'])){
        $nom =$rows['Nombre'];
        echo ' <script>
        function cambiaValores() {
        document.getElementById("nombre_contacto").value = "'.$nom.'";

    }
        </script>';
    }
    $conn ->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Awos/CSS/.css">
    <title>caceta</title>
</head>
<body>

    <form action="" method="post" id="vus">
    <label for="pin">Ingresar PIN:</label>
        <input type="submit" name="bus" value="Buscar" onclick="cambiaValores()">
        <input type="text" name="pin" required><br>
    </form>


    <form action="" method="post" enctype="multipart/form-data">

        <label for="tipo_t">Transporte:</label>
        <select name="tipo_t" required>
            <option value="Auto">Auto</option>
            <option value="A pie">A pie</option>
        </select><br>

        <label for="cantidad_p">Cantidad de Personas:</label>
        <input type="number" name="cantidad_p" required><br>

        <label for="nombre_contacto">Nombre de Contacto:</label>
        <input type="text" name="nombre_contacto" id="nombre_contacto" required><br>

        <label for="hora_entrada">Hora de Entrada:</label>
        <input type="time" name="hora_entrada" required><br>

        <label for="hora_salida">Hora de Salida:</label>
        <input type="time" name="hora_salida" required><br>

        <label for="foto">Foto</label>
        <input type="file" name="foto" accept="image/*" required><br>

   <!-- Botón para subir datos -->
<input type="submit" name="submit" value="Subir Datos">

    </form>
    <form method="post" action="" class="mover">
        <input class="cerrar" type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    </form>

</body>
</html>