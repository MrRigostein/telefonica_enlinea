<?php
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
    echo "conexion establecida";
}
// Obtener el ID del registro a actualizar
$id = $_POST['id'];
$estado = $_POST['estado'];
$rut = $_POST['rut'];
$usuario = $_POST['usuario'];
$pass = $_POST['password'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$tipo_user = $_POST['tipouser'];
$tipo_plan = $_POST['tipoplan'];
$tipo_cambio = $_POST['tipocambio'];

$sql = "UPDATE registro_usuario SET estado_usuario='$estado', rut_usuario='$rut', nombre_usuario='$usuario', password_usuario='$pass', nombre_completo='$nombre', direccion_usuario='$direccion', correo_usuario='$correo', telefono_usuario='$telefono', tipo_usuario='$tipo_user', tipo_plan='$tipo_plan',tipo_cambio='$tipo_cambio' WHERE codigo_usuario=$id";

if ($conn->query($sql) === TRUE) {
    echo "<a href='plataforma.php'><button>Volver</button></a>";
} else {
    echo "Error al actualizar el registro: " . $conexion->error;
}
echo "<script>alert('Registro actualizado Correctamente');</script>";
// Cerrar la conexión
$conexion->close();
?>