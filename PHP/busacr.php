<?php
$conn = new mysqli("localhost", "root", "", "hogardigital");
session_start();
$pins = $_POST['pin'];
$busqe = "SELECT Nombre from contactos WHERE Pin = '$pins';";

$salida= $conn->query($busqe);

$rows = $salida -> fetch_assoc();
if(isset($rows['Nombre'])){
    $nom =$rows['Nombre'];
    echo '<script>

    function cambiaValores() {
        var inputNombre = document.getElementById("nombre_contacto");
        inputNombre.value = "$nom";
    }

    </script>';
}
?>