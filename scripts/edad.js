
function validarEdad() {
  var edad = document.getElementById("edad").value;
  if (edad < 18) {
    alert("El usuario debe ser mayor de edad");
    return false;
  }
  return true;
}