document
  .getElementById("cerrarSesionBtn")
  .addEventListener("click", function () {
    // Mostrar un mensaje de confirmación antes de cerrar sesión
    if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
      // Realizar una solicitud AJAX para cerrar sesión
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "cerrar_sesion.php", true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Redirigir a la página de inicio de sesión u otra página deseada después de cerrar sesión
          window.location.href = "index.php";
        }
      };
      xhr.send();
    }
  });
