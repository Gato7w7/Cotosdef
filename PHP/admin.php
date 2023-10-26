<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Administrador</title>
    <link rel="stylesheet" href="/Awos/CSS/admin.css"> <!-- Enlaza el archivo CSS -->
    <link rel="shortcut icon" href="../icono.ico">
</head>
<body>
    <script src="../JS/buscador.js"></script>
    <h1>Panel de Administrador</h1>
    <?php
    $username = "root";
    $password = "";
    $database = "hogardigital";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    session_start();
    $query = "SELECT * from residente";

    if (isset($_POST['cerrar_sesion'])) {
        session_destroy();
        header("Location: ../index.html");
        exit;

    }

    echo '<table id="datos"> 
      <tr> 
          <td> <font face="Arial">Numero de Casa</font> </td> 
          <td> <font face="Arial">Nombre de Residente</font> </td> 
          <td> <font face="Arial">Apellido</font> </td> 
          <td> <font face="Arial">Telefono</font> </td> 
          <td> <font face="Arial">Usuario</font> </td> 
          <td> <font face="Arial">Contraseña</font> </td> 
      </tr>';

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["NumCasa"];
            $field2name = $row["Nombre_R"];
            $field3name = $row["Apellido_R"];
            $field4name = $row["Telefono"];
            $field5name = $row["Usuario"];
            $field6name = $row["Contraseña"];

            echo '<tr> 
                  <td>' . $field1name . '</td> 
                  <td>' . $field2name . '</td> 
                  <td>' . $field3name . '</td> 
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
    <div class="buttons">
        <button id="">Agregar Cuenta</button>
        <a href="../PHP/registros_admin.php">
        <button id="">Registros Diarios</button>
        </a>
        <button id="">Modificar</button>
        <button id="">Eliminar</button>
    </div>
    <form method="post" action="">
        <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
        </form>
        <form>
        Buscar residente <input id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>
</body>
</html>