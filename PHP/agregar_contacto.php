<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Contacto</title>
    <link rel="stylesheet" href="/Awos/CSS/agregarcon.css">
    <link rel="shortcut icon" href="../icono.ico">
</head>
<body>
    <a href="/Awos/PHP/contactos_residente.php" class="btn-regresar">Regresar</a>
    <div class="container">
        <div class="box">
            <form action="#" id="addContactForm">
                <h3>Agregar Contacto</h3>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Nombre" id="nombre" required>

                <label for="numero">Número de Teléfono</label>
                <input type="tel" placeholder="Número de Teléfono" id="numero" required>

                <label for="alias">Usuario</label>
                <input type="text" placeholder="Usuario" id="alias" required>

                <button type="submit" class="btn-agregar">Agregar Contacto</button>
            </form>
        </div>
    </div>
</body>
</html>