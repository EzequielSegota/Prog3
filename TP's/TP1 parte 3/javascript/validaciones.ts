function AdministrarValidaciones() {
    let ret:boolean=true;
    
    ret=ValidarCamposVacios("apellido");
    ret=ValidarCamposVacios("nombre");


    let dni:number= +(<HTMLInputElement> document.getElementById("txtDni")).value;
    ret=ValidarRangoNumerico(dni,1000000,50000000);

    let legajo:number= +(<HTMLInputElement> document.getElementById("txtLegajo")).value;
    ret=ValidarRangoNumerico(legajo,100,550);

    

    let sexo:string=(<HTMLInputElement> document.getElementById("cboSexo")).value;
    ret=ValidarCombo(sexo,"Seleccione (---)");
   

    let auxTurno:string="";
    auxTurno=ObtenerTurnoSeleccionado();
    //console.log(aux);
    let sueldoMax=ObtenerSueldoMaximo(auxTurno);
    //console.log(sueldoMax);

    let sueldo:number=+ (<HTMLInputElement> document.getElementById("txtSueldo")).value;

    ret=ValidarRangoNumerico(sueldo,8000,sueldoMax);


    

}

function ValidarCamposVacios(campo:string) :boolean  {
    let ret:boolean=true;

    switch (campo) {
        case "txtDni":
            let dni:number= +(<HTMLInputElement> document.getElementById(campo)).value;
            if(!(dni>=1000000 || dni <=50000000))
            {
                alert("DNI:Mal!");
                ret=false;
            }
            break;
        case "apellido":
            let apellido:string=(<HTMLInputElement> document.getElementById(campo)).value;
            if(apellido.length==0)
            {
                
                alert("Apellido Vacio!");
                ret=false;
            }
            break;
        case "nombre":
            let nombre:string=(<HTMLInputElement> document.getElementById(campo)).value;
            if(nombre.length==0)
            {
                alert("Nombre Vacio!");
                ret=false;
            }
            break;
        case "txtLegajo":
            let legajo:number= +(<HTMLInputElement> document.getElementById(campo)).value;
            if(!(legajo>=100 || legajo <=550))
            {
                alert("Legajo:Mal!");
                ret=false;
            }
            break;
        default:
            alert("Esto nunca deberias poder verlo, alguna cagada hiciste");
            break;
    }

    return ret;
}

function ValidarRangoNumerico(valor:number,min:number,max:number):boolean {
    let ret:boolean=false;
    

    if(valor>=min && valor<=max)
        ret=true;
    else
        alert("Respeta los rangos!");

    return ret;
}

function ValidarCombo(valor:string,noEste:string):boolean {
    let ret=true;

    if(valor!=noEste)
        console.log("Todo ok el sexo");
    else
        ret=false;
    return ret;
}

function ObtenerTurnoSeleccionado():string {
    let turno=document.getElementsByName("rdoTurno");
    let valor:string="";
    
    for (let index = 0; index < turno.length; index++) {
        if((<HTMLInputElement> turno[index]).checked)
        {
            valor=(<HTMLInputElement> turno[index]).value;
            break;
        }
    }

    return valor;
}

function ObtenerSueldoMaximo(turno:string):number {
    let sueldoMax:number=0;
    
    switch (turno) {
        case "mañana":
            sueldoMax=20000;
            break;
        case "tarde":
            sueldoMax=18500;
            break;
        case "noche":
            sueldoMax=25000;
            break;
        default:
            sueldoMax=-1;
            break;
    }

    return sueldoMax;
}