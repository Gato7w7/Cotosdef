<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Entradas y Salidas</title>
    <link rel="stylesheet" href="/Awos/CSS/registros.css">
    <link rel="shortcut icon" href="../icono.ico">
</head>
<body>
    <script src="../JS/buscador.js"></script>
    <div class="container">
        <a href="admin.php" class="back-button">Regresar</a>
        <h3>Registro de Entradas y Salidas</h3>

        <?php
        $username = "root";
        $password = "";
        $database = "hogardigital";
        $mysqli = new mysqli("localhost", $username, $password, $database);
        session_start();
        $query = "SELECT * from registros";

        echo '<table id="datos"> 
      <tr> 
          <td> <font face="Arial">Nombre de contacto</font> </td> 
          <td> <font face="Arial">Cantidad de personas</font> </td> 
          <td> <font face="Arial">Tipo de transporte</font> </td> 
          <td> <font face="Arial">PIN</font> </td> 
          <td> <font face="Arial">Acceso</font> </td> 
          <td> <font face="Arial">Hora de entrada</font> </td> 
          <td> <font face="Arial">Hora de salida</font> </td> 
          <td> <font face="Arial">Foto identificacion</font> </td> 
          </tr>';

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["Nombre_Contacto"];
            $field2name = $row["Cantidad_P"];
            $field3name = $row["Tipo_T"];
            $field4name = $row["PIN"];
            $field5name = $row["Acceso"];
            $field6name = $row["Hora_Entrada"];
            $field7name = $row["Hora_Salida"];
            $field8name = $row["Foto"];

            echo '<tr> 
                  <td>' . $field1name . '</td> 
                  <td>' . $field2name . '</td> 
                  <td>' . $field3name . '</td> 
                  <td>' . $field4name . '</td>
                  <td>' . $field5name . '</td>
                  <td>' . $field6name . '</td>
                  <td>' . $field7name . '</td>  
                  <td>' . $field8name . '</td>
              </tr>
              <tr class="noSearch hide">
              <td colspan="5"></td>
              </tr>';
        }
        $result->free();
    }
        ?>

    </div>
    <form>
        Buscar registro <input id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>
</body>
</html>
