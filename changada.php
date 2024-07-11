<?php
// Conexión a la base de datos
$servidor = "localhost"; 
$usuario = "root";
$password = "1234567890";
$basededatos = "negociocomida";
$table = "ordenes";

$conexion = mysqli_connect($servidor, $usuario, $password, $basededatos);

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Verificar si el formulario de orden se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['order'])) {
    $nombre = $_POST['name'];
    $telefono = $_POST['phone'];
    $orden = $_POST['order'];

    $sql = "INSERT INTO ordenes (nombre, telefono, orden) VALUES ('$nombre', '$telefono', '$orden')";

    if (mysqli_query($conexion, $sql)) {
        echo "Tu orden ha sido enviada. Te contactaremos cuando esté lista.";
    } else {
        echo "Hubo algún error al enviar tu orden: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
