var index = 0;
function iniciar() {
    var ip = location.host;
    var correo = document.getElementById("entrada1").value;
    var pass = document.getElementById("entrada2").value;
    if (correo != "" && pass != "") {
        var ula = "http://" + ip + "/login/php/sesion.php?correo=" + correo + "&contra=" + pass;
        console.log(ula);
        var JSON = $.ajax({
            url: ula,
            type: 'POST',
            dataType: 'json',
            async: false
        }).responseText;
        var res = jQuery.parseJSON(JSON);
        if (res.server != 'Ok') {
            alert("Error del servidor");
        } else {
            if (res.access != 'Ok') {
                alert("Contraseña o correo incorrectos")
            } else {
                alert("Exito");
                location.reload(true);
            }
        }
    } else {
        alert("Campos vacios");
    }
}
