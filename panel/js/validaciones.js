function validarfecha(e) {
    var date = e.value.replace("T", " ").trim().toString();
    if (date == "") {
        date = "2017-01-01 00:00"
    }
    var myRegExp = /^\d{4}-[0-1][0-2]-[0-3]\d\s[0-2][0-3]:[0-5]\d$/;
    if (date.match(myRegExp) == null) {
        alert("formato no válido, ingrese una fecha en formato 'aaaa-mm-dd hh:mm'");
        e.value = "";
    }
}

function validarcorreo(e){
    var valor = e.value;
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(valor)){
        alert("el email introducido no es válido");
        e.value="";
    }
}

function validarletras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function validarnumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
