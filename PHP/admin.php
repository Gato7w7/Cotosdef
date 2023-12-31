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

    if (isset($_POST['eliminar_registro'])) {
        $id_a_eliminar = $_POST['id_eliminar']; // El ID del registro a eliminar
        $eliminar_query = "DELETE FROM contactos where Residente_ID = $id_a_eliminar";
        if ($mysqli->query($eliminar_query)) {
            $query2 = "DELETE FROM residente where NumCasa = $id_a_eliminar";
            $mysqli->query($query2);
            echo '<script>alert("Residente eliminado exitosamente");window.location.href="/Awos/PHP/admin.php";</script>';
        } else {
            echo "Error al eliminar el registro: " . $mysqli->error;
        }
    }

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
                  <td>
                    <form method="post" action="">
                      <input type="hidden" name="id_eliminar" value="' . $row["NumCasa"] . '">
                      <input type="submit" name="eliminar_registro" value="Eliminar" 
                      style="background-color: #DDDFD1; color: #000000; border: none; 
                      border-radius: 5px; padding: 10px 20px; margin: 10px 0; font-size: 14px; 
                      cursor: pointer; transition: background-color 0.3s ease, color 0.3s ease; text-align: center;">
                    </form>
                  </td>

                  <td>
                  <form method="post" action="/Awos/PHP/modificar_registro.php" style="margin: 0;">
            <input type="hidden" name="id_modificar" value="<?php echo $field1name; ?>">
            <input type="submit" name="modificar_registro" value="Modificar"
                style="background-color: #DDDFD1; color: #000000; border: none; 
                border-radius: 5px; padding: 10px 20px; margin: 10px 0; font-size: 14px; 
                cursor: pointer; transition: background-color 0.3s ease, color 0.3s ease; text-align: center;">
        </form>
        </td>
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
        <a href="/Awos/PHP/agregar_cuenta.php">
            <button class="button, mover2" id="">Agregar Cuenta</button><br>
        </a>
        <a href="/Awos/PHP/registros_diarios.php">
            <button class="button, mover3" id="">Registros Diarios</button><br>
        </a>

    </div>
    <form method="post" action="" class="mover">
        <input class="cerrar" type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    </form>
    <form>
        <input class="container" placeholder="Buscar residente" id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>
</body>

</html>