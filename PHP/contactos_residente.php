<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
    <link rel="stylesheet" href="/Awos/CSS/reg_res.css">
    <link rel="shortcut icon" href="../icono.ico">
</head>

<body>
    <!-- Formulario para cerrar sesión -->
    <form method="post" style="text-align: right; padding: 10px;">
        <button type="submit" name="cerrar_sesion" class="cerrar-sesion-button">Cerrar Sesión</button>
    </form>

    <script src="/Awos/JS/buscador.js"></script>
    <h1>Lista de Contactos</h1>

    <!-- Barra de búsqueda -->
    <form style="display: flex; justify-content: flex-end; padding: 10px; margin-bottom: 10px;">
        Buscar contacto <input id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>

    <div class="buttons">
        <a href="/Awos/PHP/agregar_contacto.php">
            <button id="agregar-contacto">Agregar Contacto</button>
        </a>
        <a href="/Awos/PHP/generador_pin.php">
            <button id="generar-pin">Generar PIN</button>
        </a>
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
    $query = "SELECT  c.Nombre, c.Apellido, c.Telefono from contactos c, residente r WHERE c.Residente_ID=r.NumCasa and r.Usuario like '$_SESSION[Sesion]';";

    if (isset($_POST['cerrar_sesion'])) {
        session_destroy();
        header("Location: /Awos/index.html");
        exit;
    }

    // ...

echo '<table id="datos"> 
<tr> 
    <td> <font face="Arial">Apellido</font> </td> 
    <td> <font face="Arial">Nombre</font> </td> 
    <td> <font face="Arial">Telefono</font> </td> 
    <td> <font face="Arial">Acciones</font> </td> 
</tr>';

if ($result = $mysqli->query($query)) {
  while ($row = $result->fetch_assoc()) {
      $field2name = $row["Apellido"];
      $field3name = $row["Nombre"];
      $field4name = $row["Telefono"];

      echo '<tr> 
            <td>' . $field2name . '</td> 
            <td>' . $field3name . '</td> 
            <td>' . $field4name . '</td>
            <td><form method="post" action="eliminar_contacto.php">
                <input type="hidden" name="apellido" value="' . $field2name . '">
                <input type="hidden" name="nombre" value="' . $field3name . '">
                <input type="hidden" name="telefono" value="' . $field4name . '">
                <button type="submit" name="eliminar_contacto">Eliminar</button>
            </form></td>
        </tr>
        <tr class="noSearch hide">
        <td colspan="5"></td>
        </tr>';
  }
  $result->free();
}

// ...

    
    ?>

    <!-- Agrega imagen de Whatsapp -->
    <div class="buttons">
        <button onclick="enviarWhatsApp()" id="whatsapp-link" class="whatsapp-button">Notificar de entrega</button>
    </div>

    <script>
        const whatsappLink = document.getElementById('whatsapp-link');
        function enviarWhatsApp() {
            var numero = "4492788601";
            var mensaje = "Buen dia! Le informo que el dia de hoy recibire un paquete/delivery a mi domicilio, le pedire que este atento por favor.";
            var url = "https://api.whatsapp.com/send?phone=" + numero + "&text=" + encodeURIComponent(mensaje);
            window.open(url, "_blank");
        }
    </script>

</body>

</html>