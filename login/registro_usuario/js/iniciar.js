function registrar(){
    var ip = location.host;
    var correo = document.getElementById("entrada2").value;
    if(correo != ""){
        var ula = "http://"+ip+"/login/registro_usuario/php/sesion.php?correo="+correo;
        console.log(ula);
        var JSON =$.ajax({
            url: ula,
            type: 'POST',
            dataType: 'json',
            async: false}).responseText;
        var res=jQuery.parseJSON(JSON);
        console.log(res);
        if(res.correo != "existe"){
            var datos ={
                "nombre"   : document.getElementById("entrada1").value,
                "correo"   : document.getElementById("entrada2").value,
                "contra"   : document.getElementById("entrada3").value,
                "contra2"  : document.getElementById("entrada4").value,
                "apellido" : document.getElementById("entrada5").value
            }
            console.log(datos);
            if(datos.contra == datos.contra2 && datos.nombre != "" &&  datos.apellido != ""){
                var ula = "http://"+ip+"/login/registro_usuario/php/registro.php?corre=";
                ula += datos.correo;
                ula += "&nom=" + datos.nombre;
                ula += "&ape=" + datos.apellido;
                ula += "&pass=" + datos.contra;
                console.log(ula);
                JSON =$.ajax({
                    url: ula,
                    type: 'POST',
                    dataType: 'json',
                    async: false}).responseText;
                res=jQuery.parseJSON(JSON);
                if(res.registro == "ok"){
                    alert("Informacion guardada con exito");
                    location.reload(true);
                }else{
                    alert("Error al registrar")
                }
            }else{
                alert("Las contraseñas no son iguales o tal vez un campo vacio...");
            }
        }else{
            alert("Ese correo ya existe")
        }
    }
}
