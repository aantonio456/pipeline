// JS vulnerable
function loginUser() {
    let user = document.getElementById("user").value;
    eval("console.log('Usuario: " + user + "')"); // Uso de eval: vulnerabilidad
}
