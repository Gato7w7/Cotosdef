<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Administrador</title>
    <link rel="stylesheet" href="/Awos/CSS/adm.css"> <!-- Enlaza el archivo CSS -->
    <link rel="shortcut icon" href="/Awos/icono.ico">
</head>
<body>
    <script src="../JS/buscador.js"></script>
    <h1 class="cuadh1">Panel de Administrador</h1>
    <?php
    $username = "root";
    $password = "";
    $database = "hogardigital";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    session_start();
    $query = "SELECT * from residente";

    if (isset($_POST['cerrar_sesion'])) {
        session_destroy();
        header("Location: /Awos/index.html");
        exit;

    }
    
    echo '<div> <table id="datos"> 
      <tr> 
          <td> <font face="Arial">Numero de Casa</font> </td> 
          <td> <font face="Arial">Nombre de Residente</font> </td> 
          <td> <font face="Arial">Apellido</font> </td> 
          <td> <font face="Arial">Telefono</font> </td> 
          <td> <font face="Arial">Usuario</font> </td> 
          <td> <font face="Arial">Contraseña</font> </td> 
      </tr> </div>';

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
    <div class="cuadrado"></div>
    <div class="mover">
        <button class="button, mover2" id="">Agregar Cuenta</button><br>
        <a href="/Awos/PHP/registros_admin.php">
        <button class="button, mover3" id="">Registros Diarios</button><br>
        </a>
        <button class="button, mover4" id="">Modificar</button><br>
        <button class="button, mover5" id="">Eliminar</button><br>
    </div>
    <form method="post" action="" class="mover">
        <input class="cerrar" type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    </form>
    <form>
        <input class="container" placeholder="Buscar residente" id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>
</body>
</html>