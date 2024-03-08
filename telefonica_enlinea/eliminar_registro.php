<?php
// Verificar si se proporcionó un ID válido para eliminar el registro
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Establecer conexión a la base de datos
   // Conexión a la base de datos (ajusta según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "telefonica_enlinea";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}else{
    echo "Conexion Establecida";
}

    // Obtener el ID del registro a eliminar
    $id = $_GET['id'];

    // Consultar la base de datos para eliminar el registro
    $sql = "DELETE FROM registro_usuario WHERE codigo_usuario = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado satisfactoriamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de registro no proporcionado";
}
?>