<?php
// Conexión a la base de datos
$servidor = "localhost"; 
$usuario = "root";
$password = "1234567890";
$basededatos = "negociocomida";
$table = "mensajes";

$conexion = mysqli_connect($servidor, $usuario, $password, $basededatos);

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Verificar si el formulario de contacto se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact-name']) && isset($_POST['contact-email']) && isset($_POST['message'])) {
    $nombre = $_POST['contact-name'];
    $email = $_POST['contact-email'];
    $mensaje = $_POST['message'];

    $sql = "INSERT INTO mensajes (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if (mysqli_query($conexion, $sql)) {
        echo "Tu mensaje ha sido enviado. Nos pondremos en contacto contigo pronto.";
    } else {
        echo "Hubo algún error al enviar tu mensaje: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
