/*Funcion que notifica cuando el usuario ingreso incorrecamente su informacion*/
function mensajeIncorrecto() {
    var div = document.getElementById("alertIngresar");
    var node = document.createTextNode("Ingresa correctamente la informacion");
    div.setAttribute("class", "alert alert-danger");
    div.setAttribute("role", "alert");
    div.appendChild(node);
}
/*Funcion que notifica el registro exitoso*/
function registroExitoso() {
    var div = document.getElementById("alertUsuario");
    var node = document.createTextNode("¡Registro exitoso!");
    div.setAttribute("class", "alert alert-warning");
    div.setAttribute("role", "alert");
    div.appendChild(node);
}
/*Funcion que notifica un error en la base de datos*/
function registroFallido() {
    var div = document.getElementById("alertUsuario");
    var node = document.createTextNode("¡Error al registrar en base de datos!");
    div.setAttribute("class", "alert alert-danger");
    div.setAttribute("role", "alert");
    div.appendChild(node);
}
/*Funcion que notifica que un usuario ya existe*/
function usuarioExistente() {
    var div = document.getElementById("alertUsuario");
    var node = document.createTextNode("¡El nombre de usuario ya existe!");
    div.setAttribute("class", "alert alert-danger");
    div.setAttribute("role", "alert");
    div.appendChild(node);
}