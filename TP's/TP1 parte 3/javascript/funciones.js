function AdministrarValidaciones() {
    var ret = true;
    ret = ValidarCamposVacios("apellido");
    ret = ValidarCamposVacios("nombre");
    var dni = +document.getElementById("txtDni").value;
    ret = ValidarRangoNumerico(dni, 1000000, 50000000);
    var legajo = +document.getElementById("txtLegajo").value;
    ret = ValidarRangoNumerico(legajo, 100, 550);
    var sexo = document.getElementById("cboSexo").value;
    ret = ValidarCombo(sexo, "Seleccione (---)");
    var auxTurno = "";
    auxTurno = ObtenerTurnoSeleccionado();
    //console.log(aux);
    var sueldoMax = ObtenerSueldoMaximo(auxTurno);
    //console.log(sueldoMax);
    var sueldo = +document.getElementById("txtSueldo").value;
    ret = ValidarRangoNumerico(sueldo, 8000, sueldoMax);
}
function ValidarCamposVacios(campo) {
    var ret = true;
    switch (campo) {
        case "txtDni":
            var dni = +document.getElementById(campo).value;
            if (!(dni >= 1000000 || dni <= 50000000)) {
                alert("DNI:Mal!");
                ret = false;
            }
            break;
        case "apellido":
            var apellido = document.getElementById(campo).value;
            if (apellido.length == 0) {
                alert("Apellido Vacio!");
                ret = false;
            }
            break;
        case "nombre":
            var nombre = document.getElementById(campo).value;
            if (nombre.length == 0) {
                alert("Nombre Vacio!");
                ret = false;
            }
            break;
        case "txtLegajo":
            var legajo = +document.getElementById(campo).value;
            if (!(legajo >= 100 || legajo <= 550)) {
                alert("Legajo:Mal!");
                ret = false;
            }
            break;
        default:
            alert("Esto nunca deberias poder verlo, alguna cagada hiciste");
            break;
    }
    return ret;
}
function ValidarRangoNumerico(valor, min, max) {
    var ret = false;
    if (valor >= min && valor <= max)
        ret = true;
    else
        alert("Respeta los rangos!");
    return ret;
}
function ValidarCombo(valor, noEste) {
    var ret = true;
    if (valor != noEste)
        console.log("Todo ok el sexo");
    else
        ret = false;
    return ret;
}
function ObtenerTurnoSeleccionado() {
    var turno = document.getElementsByName("rdoTurno");
    var valor = "";
    for (var index = 0; index < turno.length; index++) {
        if (turno[index].checked) {
            valor = turno[index].value;
            break;
        }
    }
    return valor;
}
function ObtenerSueldoMaximo(turno) {
    var sueldoMax = 0;
    switch (turno) {
        case "mañana":
            sueldoMax = 20000;
            break;
        case "tarde":
            sueldoMax = 18500;
            break;
        case "noche":
            sueldoMax = 25000;
            break;
        default:
            sueldoMax = -1;
            break;
    }
    return sueldoMax;
}
