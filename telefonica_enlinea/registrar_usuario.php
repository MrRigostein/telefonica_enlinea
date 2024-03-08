<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "telefonica_enlinea";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
  die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recupera los datos del formulario
$estado = $_POST['estatus'];
$rut = $_POST['rut'];
$nombre_usuario = $_POST['nombre_usuario'];
$password_usuario = $_POST['password_usuario'];
$nombre_personal = $_POST['nombre_personal'];
$direccion = $_POST['direccion_usuario'];
$correo = $_POST['correo_usuario'];
$telefono = $_POST['telefono_usuario'];
$tipo_usuario = $_POST['tipo_usuario'];
$tipo_plan = $_POST['tipo_plan'];
$tipo_cambio = $_POST['tipo_cambio'];

// Inserta los datos en la base de datos con un campo autoincrementable
$sql = "INSERT INTO registro_usuario(estado_usuario, rut_usuario, nombre_usuario, password_usuario, nombre_completo, direccion_usuario, correo_usuario, telefono_usuario, tipo_usuario, tipo_plan, tipo_cambio)
        VALUES ('$estado','$rut', '$nombre_usuario', '$password_usuario', '$nombre_personal', '$direccion','$correo','$telefono','$tipo_usuario','$tipo_plan','$tipo_cambio')";

if ($conn->query($sql) === TRUE) {
  echo "Registro exitoso </br>";
  echo "<a href='plataforma.php'><button>Volver</button></a>";
} else {
  echo "Error al registrar los datos: " . $conn->error;
}

$conn->close();
?>