<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icono.ico">
    <title>Caceta</title>
</head>
<body>

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
   echo $_SESSION["Sesion"] ;
?>

    <div class="container">
        <div class="box">
            <form action="" id="">
                <h3>Verificador</h3>

                <button type="submit">Buscar PIN</button>
                <input type="text" placeholder="Codigo PIN" id="" required>
                <input type="text" placeholder="Nombre" id="" required>
                <input type="text" placeholder="Telefono" id="" required>
                <input type="text" placeholder="Apellido" id="" required>
                <input type="checkbox"> <label for="">Caminando</label>
                <input type="checkbox"> <label for="">Vehiculo</label>
                <input type="text" placeholder="Identificacion" id="" required>
                <button type="submit">Agregar Foto</button>
                <input type="text" placeholder="Direccion" id="" required>
                <input type="text" placeholder="No. de personas" id="" required>
                <input type="text" placeholder="Entrada 00:00" id="" required>
                <input type="checkbox">
                <input type="text" placeholder="Salida 00:00" id="" required>
                <input type="checkbox">

                <button type="submit">Guardar</button>
                
            </form>
        </div>
    </div>

    <form method="post" action="" class="mover">
        <input class="cerrar" type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    </form>

</body>
</html>