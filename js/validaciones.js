function validacion() 
{
    var respuesta = true;
    
    valor = document.getElementById("NOMBRE").value;
    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) 
    {
        alert('ERROR: El campo NOMBRE debe contener caracteres.');
        respuesta = false;
    }
    else 
    {    
        valor = document.getElementById("APELLIDOS").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) 
        {
            alert('ERROR: El campo APELLIDOS debe contener caracteres.');
            respuesta = false;
        }
        else
        {
            valor = document.getElementById("CALLE").value;
            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) 
            {
                alert('ERROR: El campo CALLE debe contener caracteres.');
                respuesta = false;
            }
            else
            {
                valor = document.getElementById("NUMERO").value;
                if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) 
                {
                    alert('ERROR: El campo NUMERO debe contener caracteres.');
                    respuesta = false;
                }
                else
                {
                    indice = document.getElementsByTagName(select)("Provincias").selectedIndex;
                    if( indice == null || indice == 0 ) 
                    {
                        alert('ERROR: Tiene que seleccionar una Provincia.');
                        respuesta = false;
                    }
                    else
                    {
                        indice = document.getElementById("Municipios").selectedIndex;
                        if( indice == null || indice == 0 ) 
                        {
                            alert('ERROR: Tiene que seleccionar un Municipio.');
                            respuesta = false;
                        }
                        else
                        {condicion =false;
                            valor = document.getElementById("FECHA_NACIMIENTO").value;
                            if (!esFechaValida(valor))
                            {
                                respuesta = false;
                            }
                            else
                            {
                                opciones = document.getElementsByName("SEXO");
                                if (!seleccionado_radio_buttom(opciones))
                                {
                                    alert('ERROR: Tiene que seleccionar el Sexo.');
                                    respuesta = false;
                                }
                                else
                                {
                                    valor = document.getElementById("DNI").value;
                                    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
                                    if( !(/^\d{8}[A-Z]$/.test(valor)) ) 
                                    {
                                        alert('ERROR: El DNI tiene que ser 8 números seguidos de una letra.');
                                        respuesta = false;
                                    }
                                    else
                                    {
                                        if (valor.charAt(8) != letras[(valor.substring(0, 8))%23]) 
                                        {
                                            alert('ERROR: La letra del DNI no es válida.');
                                            respuesta = false;
                                        }
                                        else
                                        {
                                            indice = document.getElementById("ID_SITUACION").selectedIndex;
                                            if( indice == null || indice == 0 ) 
                                            {
                                                alert('ERROR: Tiene que seleccionar una Situación Laboral.');
                                                respuesta = false;
                                            }
                                            else
                                            {
                                                indice = document.getElementById("ID_NACIONALIDAD").selectedIndex;
                                                if( indice == null || indice == 0 ) 
                                                {
                                                    alert('ERROR: Tiene que seleccionar una Nacionalidad.');
                                                    respuesta = false;
                                                }
                                                else
                                                {
                                                    indice = document.getElementById("ID_NIVEL_ESTUDIOS").selectedIndex;
                                                    if( indice == null || indice == 0 ) 
                                                    {
                                                        alert('ERROR: Tiene que seleccionar un Nivel de Estudios.');
                                                        respuesta = false;
                                                    }
                                                    else
                                                    {
                                                        valor = document.getElementById("TELEFONO").value;
                                                        if( !(/^\d{9}$/.test(valor)) ) 
                                                        {
                                                            alert('ERROR: El Teléfono tiene que ser 9 dígitos consecutivos sin espacios ni guiones.');
                                                            respuesta = false;
                                                        }
                                                        else
                                                        {
                                                           /* valor = document.getElementById("EMAIL").value;
                                                            
                                                            if( !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(valor)) )
                                                            //if ( !(/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/))
                                                            {
                                                                alert('ERROR: La dirección de Email no es válida.');
                                                                respuesta = false;
                                                            }*/
                                                            
                                                         }
                                                      }
                                                   }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    return respuesta;
}
    




function esFechaValida(fecha)
{
    var resp=true;
    
    if (fecha == undefined && fecha.value == "")
        {
            alert("ERROR: Introduzca una Fecha de Nacimiento.");
            resp=false;
        }
    else
        {
            if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value))
            {
                alert("ERROR: Formato de fecha no válido (dd/mm/aaaa).");
                resp=false;
            }
            else
            {
                var dia  =  parseInt(fecha.value.substring(0,2),10);
                var mes  =  parseInt(fecha.value.substring(3,5),10);
                var anio =  parseInt(fecha.value.substring(6),10);
                
                if (dia>numDias || dia==0)
                {
                    alert("ERROR: Fecha introducida errónea (Día no válido)");
                    resp= false;
                }
                else
                {
                    switch(mes)
                    {
                        case 1:
                        case 3:
                        case 5:
                        case 7:
                        case 8:
                        case 10:
                        case 12:
                            numDias=31;
                            break;
                        case 4: case 6: case 9: case 11:
                            numDias=30;
                            break;
                        case 2:
                            if (comprobarSiBisisesto(anio)){numDias=29}else{numDias=28}
                            break;
                        default:
                            alert("ERROR: Fecha introducida errónea (Més no válido)");
                            resp=false;
                    }
                }
                fecha_actual = new Date();
                if (esMayor(fecha,fecha_actual))
                {
                    alert("ERROR: Fecha de Nacimiento no puede ser mayor que Fecha de Hoy.");
                    resp=false;
                }
            }
        }
        
        
    return resp;
}
 
function comprobarSiBisisesto(anio){
if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
    return true;
    }
else {
    return false;
    }
}

function esMayor(fecha1, fecha2)  
{
    var resp = false;
    
    var mes1 = fecha1.substring(3, 5);  
    var dia1 = fecha1.substring(0, 2);  
    var anno1= fecha1.substring(6,10); 
    
    var mes2 = fecha2.substring(3, 5);  
    var dia2 = fecha2.substring(0, 2);  
    var anno2= fecha2.substring(6,10);  
    
    if (anno1 > anno2)  
    {  
        resp = true;
    }  
    else  
    {  
        if ((anno1 == anno2))
        {
            if (mes1 > mes2)
            {
                resp = true;
            }
        }  
        else  
        {   
            if (mes1 == mes2)  
            {  
                if (dia1 >= dia2)  
                {
                    resp = true;
                } 
            }
        }
    }
}  

function seleccionado_radio_buttom(opciones)
{
    var seleccionado = false;
    for(var i=0; i<opciones.length; i++) 
    {	
        if(opciones[i].checked) 
        {
            seleccionado = true;
            break;
        }
    }
    return seleccionado;
}

function limitaCaracteres(elemento, maximoCaracteres, minCaracteres) {
    validaCaracteres = true;
    var elem = document.getElementById(elemento);
    if(elem.value.length >= maximoCaracteres || elem.value.length < minCaracteres) {
        validaCaracteres = false;
    }    
    return validaCaracteres;
}