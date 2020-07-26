
// Se captura el evento del boton para inciar sesión
$('#formlogin').submit(function(event){
    event.preventDefault();
    ingresar();
});

// Petición ajax para ingresar al sistema
function ingresar(){
    $.ajax({
        type: "POST",
        url: "Estadisticas/Login/login.php",
        data: { USER: $("#usuario").val(), PASSWORD: $("#contrasenia").val() },
        datatype: "html",
        success: function(r){
            if (r == 1) {
                Admin(1);
                $("#msj-error").hide();
            }
            else{
                $("#msj-error").removeAttr("hidden");
            }
        }
    })
}
