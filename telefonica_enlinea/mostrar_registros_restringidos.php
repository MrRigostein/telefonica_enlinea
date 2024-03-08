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
    echo " ";
}

// Obtener y mostrar registros
$sql = "SELECT * FROM registro_usuario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr id='fila_" . $row["codigo_usuario"] . "'>";
        echo "<td>" . $row["codigo_usuario"] . "</td>";
        echo "<td>" . $row["estado_usuario"] . "</td>";
        echo "<td>" . $row["rut_usuario"] . "</td>";
        echo "<td>" . $row["nombre_usuario"] . "</td>";
        echo "<td>" . $row["password_usuario"] . "</td>";
        echo "<td>" . $row["nombre_completo"] . "</td>";
        echo "<td>" . $row["direccion_usuario"] . "</td>";
        echo "<td>" . $row["correo_usuario"] . "</td>";
        echo "<td>" . $row["telefono_usuario"] . "</td>";
        echo "<td>" . $row["tipo_usuario"] . "</td>";
        echo "<td>" . $row["tipo_plan"] . "</td>";
        echo "<td>" . $row["tipo_cambio"] . "</td>";
        echo "<td>";
        echo "<button id='btnEditar' onclick=\"editarRegistro(" . $row["codigo_usuario"] . ")\">Editar</button>";
        echo "</td>";
        echo "</tr>";
        
    }
} else {
    echo "No hay registros";
}

// Cerrar la conexión

?>

<!-- Formulario de edición oculto -->

<div id="formularioEdicion" style="display: none;">
        <h2>Editar Registro</h2>
        <form id="formularioEdicion">
            <label for="registro">N° Registro:</label><input type="text" id="numeroRegistro" disabled><br><br>
            <label>Estado:</label><br><br>
                <select id="status" name="status" disabled>
                    <option selected="true" value="" disabled>seleccione un estado</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select><br><br>
            <label>Rut:</label><br><br>
            <input type="text" id="iduser"><br><br>
            <label>Nombre Usuario:</label><br><br>
            <input type="text" id="nameuser" disabled><br><br>
            <label>Contraseña Usuario:</label><br><br>
            <input type="text" id="passuser" disabled><br><br>
            <label>Nombre Personal:</label><br><br>
            <input type="text" id="nameperson"><br><br>
            <label>Dirección:</label><br><br>
            <input type="text" id="address"><br><br>
            <label>Correo:</label><br><br>
            <input type="text" id="email" readonly><br><br>
            <label>Telefono:</label><br><br>
            <input type="text" id="phone"><br><br>
            <label>Tipo Usuario:</label><br><br>
                <select id="tipouser" disabled>
                    <option selected="true" value="" disabled>seleccione un tipo usuario</option>
                    <option value="Agente">Agente</option>
                    <option value="Cliente">Cliente</option>
                </select><br><br>
                <label>Tipo Plan:</label><br><br>
                <select id="tipoplan">
                    <option selected="true" value="" disabled>seleccione un tipo plan</option>
                    <option value="normal">Normal</option>
                    <option value="bueno">Bueno</option>
                    <option value="excelente">Excelente</option>
                    <option value="oferta">Oferta de Temporada</option>
                </select><br><br>
                <label>Tipo Cambio:</label><br><br>
                <select id="tipocambio">
                    <option selected="true" value="" disabled>seleccione un tipo cambio</option>
                    <option value="datos_personales">Actualización de Datos Personales</option>
                    <option value="cambio_plan">Cambio de Plan</option>
                </select><br><br>
                <br>
                <div class="orden-boton">
                <input id="actualizarBTN" type="button" value="Actualizar" onclick="actualizarRegistro()">
                <input id="cancelarBTN" type="button" value="Cancelar" onclick="cancelarEdicion()">
                </div>
        </form>
    </div>

<script>
         var filaSeleccionadaId;

function editarRegistro(id) {
    // Guardar el ID de la fila seleccionada
    filaSeleccionadaId = id;

    // Obtener los valores de nombre y email de la fila seleccionada
    var registro = document.getElementById("fila_" + id).cells[0].innerText;
    var estado = document.getElementById("fila_" + id).cells[1].innerText;
    var rut = document.getElementById("fila_" + id).cells[2].innerText;
    var nombre_usuario = document.getElementById("fila_" + id).cells[3].innerText;
    var password_usuario = document.getElementById("fila_" + id).cells[4].innerText;
    var nombre = document.getElementById("fila_" + id).cells[5].innerText;
    var direccion = document.getElementById("fila_" + id).cells[6].innerText;
    var correo = document.getElementById("fila_" + id).cells[7].innerText;
    var telefono = document.getElementById("fila_" + id).cells[8].innerText;
    var tipouser = document.getElementById("fila_" + id).cells[9].innerText;
    var tipoplan = document.getElementById("fila_" + id).cells[10].innerText;
    var tipocambio = document.getElementById("fila_" + id).cells[11].innerText;
    // Rellenar el formulario de edición con los valores actuales
    document.getElementById("numeroRegistro").value = registro;
    document.getElementById("status").value = estado;
    document.getElementById("iduser").value = rut;
    document.getElementById("nameuser").value = nombre_usuario;
    document.getElementById("passuser").value = password_usuario;
    document.getElementById("nameperson").value = nombre;
    document.getElementById("address").value = direccion;
    document.getElementById("email").value = correo;
    document.getElementById("phone").value = telefono;
    document.getElementById("tipouser").value = tipouser;
    document.getElementById("tipoplan").value = tipoplan;
    document.getElementById("tipocambio").value = tipocambio;
    // Mostrar el formulario de edición
    document.getElementById("formularioEdicion").style.display = "block";

    document.getElementById("tabla").style.display = "none";
}

        function cancelarEdicion() {
            // Mostrar la tabla de registros y ocultar el formulario de edición
            document.getElementById("tabla").style.display = "block";
            document.getElementById("formularioEdicion").style.display = "none";
        }
        function actualizarRegistro() {
            // Obtener los nuevos valores de nombre y email del formulario
            var id = document.getElementById("numeroRegistro").value;
            var nuevoEstado = document.getElementById("status").value;
            var nuevoRut = document.getElementById("iduser").value;
            var nuevoUsuario = document.getElementById("nameuser").value;
            var nuevaPassword = document.getElementById("passuser").value;
            var nuevoNombre_personal = document.getElementById("nameperson").value;
            var nuevaDireccion = document.getElementById("address").value;
            var nuevoCorreo = document.getElementById("email").value;
            var nuevoTelefono = document.getElementById("phone").value;
            var nuevoTipo_user = document.getElementById("tipouser").value;
            var nuevoTipo_plan = document.getElementById("tipoplan").value;
            var nuevoTipo_cambio = document.getElementById("tipocambio").value;

            // Realizar una solicitud AJAX para actualizar el registro
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "actualizar_registro.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Recargar la página después de la actualización
                    location.reload();
                }
            };
            xhr.send("id=" + id + 
            "&estado=" + encodeURIComponent(nuevoEstado) + 
            "&rut=" + encodeURIComponent(nuevoRut)+
            "&usuario=" + encodeURIComponent(nuevoUsuario)+
            "&password=" + encodeURIComponent(nuevaPassword)+
            "&nombre=" + encodeURIComponent(nuevoNombre_personal)+
            "&direccion=" + encodeURIComponent(nuevaDireccion)+
            "&correo=" + encodeURIComponent(nuevoCorreo)+
            "&telefono=" + encodeURIComponent(nuevoTelefono)+
            "&tipouser=" + encodeURIComponent(nuevoTipo_user)+
            "&tipoplan=" + encodeURIComponent(nuevoTipo_plan)+
            "&tipocambio=" + encodeURIComponent(nuevoTipo_cambio));
            alert('Registro actualizado correctamente');
        }
    </script>