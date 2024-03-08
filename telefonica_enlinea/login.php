<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "telefonica_enlinea";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener las credenciales del formulario
$usuario = $_POST['username'];
$contrasena = $_POST['password'];

// Consultar la base de datos para verificar las credenciales
$sql = "SELECT * FROM registro_usuario WHERE (nombre_usuario = '$usuario' OR correo_usuario = '$usuario') AND password_usuario = '$contrasena' AND tipo_usuario='Agente'";
$sqldos = "SELECT * FROM registro_usuario WHERE (nombre_usuario = '$usuario' OR correo_usuario = '$usuario') AND password_usuario = '$contrasena' AND tipo_usuario='Cliente'";
$resultado = $conn->query($sql);
$resultadodos = $conn->query($sqldos);

// Verificar si se encontró un usuario con las credenciales proporcionadas
if ($resultado->num_rows > 0) {
    include 'plataforma.php';
    // Aquí puedes redirigir al usuario a otra página, establecer una sesión, etc.
} else if($resultadodos->num_rows > 0){
    include 'plataforma_restringida.php';
}else{
    echo "Usuario o contraseña incorrectos.";
}

// Cerrar la conexión
$conn->close();
?>