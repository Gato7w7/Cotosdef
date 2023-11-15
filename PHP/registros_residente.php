<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Entradas y Salidas</title>
    <link rel="stylesheet" href="/Awos/CSS/registros.css">
    <link rel="shortcut icon" href="/Awos/icono.ico">
</head>

<body>
    <script src="/Awos/JS/buscador.js"></script>
    <a href="contactos_residente.php" class="back-button">Regresar</a>
    <h3>Registro de Entradas y Salidas</h3>

    <?php
    $username = "root";
    $password = "";
    $database = "hogardigital";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    session_start();
    $query = "SELECT * FROM registros, residente WHERE NumCasa = NumCasa
    AND Usuario = '$_SESSION[Sesion]';";

    echo '<table id="datos"> 
<tr> 
    <td> <font face="Arial">Nombre de Contacto</font> </td> 
    <td> <font face="Arial">Cantidad de Personas</font> </td> 
    <td> <font face="Arial">Tipo de Transporte</font> </td> 
    <td> <font face="Arial">Hora de entrada</font> </td> 
    <td> <font face="Arial">Hora de salida</font> </td> 
</tr>';

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["Nombre_Contacto"];
            $field2name = $row["Cantidad_P"];
            $field4name = $row["Tipo_T"];
            $field5name = $row["Hora_Entrada"];
            $field6name = $row["Hora_Salida"];

            echo '<tr> 
            <td>' . $field1name . '</td> 
            <td>' . $field2name . '</td> 
            <td>' . $field4name . '</td>  
            <td>' . $field5name . '</td>  
            <td>' . $field6name . '</td>  
            </tr>
            <tr class="noSearch hide">
              <td colspan="5"></td>
              </tr>';
        }
        $result->free();
    }
    ?>
    <form>
        Buscar registro <input id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>
</body>

</html>