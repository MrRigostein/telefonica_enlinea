function validarRegistro() {
  var contrasena = document.getElementById("password_usuario").value;
  var expresionRegular = /^(?=.*[A-Z])(?=.*[\(\)\$\%\"\!\ /&=\"]).{8,}$/;

  if (!expresionRegular.test(contrasena)) {
    alert(
      "La contraseña debe tener al menos 8 caracteres, una mayúscula y un símbolo especial entre ( ) $ % ” !  / & ” = "
    );
    return false;
  }
  return true;
}
