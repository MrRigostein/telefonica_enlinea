<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Responder con un mensaje de éxito
echo "Sesión cerrada exitosamente";
?>