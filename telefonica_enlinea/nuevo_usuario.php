<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos_registro.css">
</head>
<body>
    <div class="registro-container">
        <h2>Registro</h2>
        <form action="registrar_usuario.php" method="post" onsubmit="return validarRegistro()">
            
            <div class="form-group">
                <label for="estatus">Estado:</label>
                <select id="estatus" name="estatus">
                    <option selected="true" value="" disabled>seleccione un estado</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rut">RUT:</label>
                <input type="text" id="rut" name="rut" required>
            </div>
            <div class="form-group">
                <label for="nombre_usuario">Nombre Usuario:</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            </div>
            <div class="form-group">
                <label for="password_usuario">Contraseña:</label>
                <input type="password" id="password_usuario" name="password_usuario" required>
            </div>
            <div class="form-group">
                <label for="nombre_personal">Nombre Completo:</label>
                <input type="text" id="nombre_personal" name="nombre_personal" required>
            </div>
            <div class="form-group">
                <label for="direccion_usuario">Dirección:</label>
                <input type="text" id="direccion_usuario" name="direccion_usuario" required>
            </div>
            <div class="form-group">
                <label for="correo_usuario">Correo Electrónico:</label>
                <input type="email" id="correo_usuario" name="correo_usuario" required>
            </div>
            <div class="form-group">
                <label for="teñefono_usuario">Telefono:</label>
                <input type="text" id="telefono_usuario" name="telefono_usuario" required>
            </div>
            <div class="form-group">
                <label for="tipo_usuario">Tipo de Usuario</label>
                <select id="tipo_usuario" name="tipo_usuario">
                    <option selected="true" value="" disabled>seleccione un tipo de usuario</option>
                    <option value="Agente">Agente</option>
                    <option value="Cliente">Cliente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="plan">Tipo de Plan</label>
                <select id="tipo_plan" name="tipo_plan">
                    <option selected="true" value="" disabled>seleccione un plan</option>
                    <option value="normal">Normal</option>
                    <option value="bueno">Bueno</option>
                    <option value="excelente">Excelente</option>
                    <option value="oferta">Oferta de Temporada</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_cambio">Tipo de Cambio</label>
                <select id="tipo_cambio" name="tipo_cambio">
                    <option selected="true" value="" disabled>seleccione un tipo de cambio</option>
                    <option value="datos_personales">Actualización de Datos Personales</option>
                    <option value="cambio_plan">Cambio de Plan</option>
                </select>
            </div>
            
            <button class="boton_registrar" type="submit">Registrarse</button></br>
            </br> <a href="plataforma.php" class="boton_cancelar">Cancelar</a>
        </form>
    </div>
    <script src="validacion.js"></script>
</body>
</html>