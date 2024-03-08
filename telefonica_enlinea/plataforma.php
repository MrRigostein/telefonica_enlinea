<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_varios.css">
    <title>Plataforma</title>
</head>
<body>
    <div class="orden-bienvenido">
    <h1 class="bienvenido">Bienvenido, fuiste logueado exitosamente</h1>
    <button id="cerrarSesionBtn">Cerrar Sesion</button>
    </div>
    <div class="orden-agregar">
    <h2>Agregar nuevo usuario: </h2>
    <a id="agregarNuevo" href="nuevo_usuario.php">Nuevo Usuario</a>
    </div>
    <table id="tabla">
        <h3 class="titulo-registro-tabla">Tabla de registros en la base de datos</h3>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Estado</th>
                <th>Rut</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Tipo Usuario</th>
                <th>Tipo Plan</th>
                <th>Tipo Cambio</th>
            </tr>
        <tbody>
            <!-- Aquí se mostrarán los registros desde la base de datos -->
            <?php include 'mostrar_registros.php';?>
        </tbody>
        </thead>
    </table>
    <script src="cerrar_sesion.js" defer></script>
</body>
</html>