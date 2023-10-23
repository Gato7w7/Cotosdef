<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
    <link rel="stylesheet" href="">
    <link rel="shortcut icon" href="/Awos/icono.ico">
</head>

<body>
    <script src="../JS/buscador.js"></script>
    <h1>Lista de Contactos</h1>
    <form>
        <input type="text" id="" placeholder="Generar PIN">
    </form>
    <div class="buttons">
        <button id="agregar-contacto">Agregar Contacto</button>
        <button id="generar-pin">Generar PIN</button>
        <button id="editar-contacto">Editar Contacto</button>
        <a href="/Awos/PHP/registros_residente.php">
            <button id="registros">Registros</button>
        </a>
    </div>

    <?php
    $username = "root";
    $password = "";
    $database = "hogardigital";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    session_start();
    $query = "SELECT c.PIN, c.Nombre, c.Apellido, c.Telefono from contactos c, residente r WHERE c.Residente_ID=r.NumCasa and r.Usuario like '$_SESSION[Sesion]';";

    if (isset($_POST['cerrar_sesion'])) {
        session_destroy();
        header("Location: /Awos/HTML/index.html");
        exit;

    }

    echo '<table id="datos"> 
      <tr> 
          <td> <font face="Arial">PIN</font> </td> 
          <td> <font face="Arial">Apellido</font> </td> 
          <td> <font face="Arial">Nombre</font> </td> 
          <td> <font face="Arial">Telefono</font> </td> 
      </tr>';

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["PIN"];
            $field2name = $row["Apellido"];
            $field3name = $row["Nombre"];
            $field4name = $row["Telefono"];

            echo '<tr> 
                  <td>' . $field1name . '</td> 
                  <td>' . $field2name . '</td> 
                  <td>' . $field3name . '</td> 
                  <td>' . $field4name . '</td>  
              </tr>
              <tr class="noSearch hide">
              <td colspan="5"></td>
              </tr>';
        }
        $result->free();
    }
    ?>

    <!-- Agrega imagen de Whatsapp -->
    <div class="buttons">
        <button id="">Notificacion Paqueteria</button>
        <button id="">Notificacion de invitado</button>
        <button id="">Notificacion de delivery</button>
    </div>
    <form method="post" action="">
        <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    </form>

    <form>
        Buscar contacto <input id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>

</body>

</html>