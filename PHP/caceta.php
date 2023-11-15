<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icono.ico">
    <link rel="stylesheet" href="../CSS/caceta.css">
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
?>
    <div class="cuadrado"></div>
    <div >
        <div class="box">
            <form action="" id="">
                <h3 class="cuadh3">Verificador</h3>

                <button class="mover-bus" type="submit">Buscar PIN</button>
                <input class="mover-input" type="text" placeholder="Codigo PIN" id="" required>
                <input class="mover2" type="text" placeholder="Nombre" id="" required>
                <input class="mover3" type="text" placeholder="Telefono" id="" required>
                <input class="mover4" type="text" placeholder="Apellido" id="" required>
                <input class="mover12" type="checkbox"> <label class="mover6" for="">Caminando</label>
                <input class="mover13" type="checkbox"> <label class="mover7" for="">Vehiculo</label>
                <input class="mover8" type="text" placeholder="Identificacion" id="" required>
                <button class="mover17" type="submit">Agregar Foto</button>
                <input class="mover5" type="text" placeholder="Direccion" id="" required>
                <input class="mover9" type="text" placeholder="No. de personas" id="" required>
                <input class="mover10" type="text" placeholder="Entrada 00:00" id="" required>
                <input class="mover14" type="checkbox">
                <input class="mover11" type="text" placeholder="Salida 00:00" id="" required>
                <input class="mover15" type="checkbox">

                <button class="mover16" type="submit">Guardar</button>
                
            </form>
        </div>
    </div>

    <form method="post" action="">
        <input class="cerrar" type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    </form>

</body>
</html>