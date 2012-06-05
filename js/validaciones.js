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
                    indice = document.getElementById("Provincias").selectedIndex;
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
                        {
                            condicion =false;
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
                        if (comprobarSiBisisesto(anio)){
                            numDias=29
                        }else{
                            numDias=28
                        }
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

function limitaCaracteres(elemento, maximoCaracteres, minCaracteres) 
{
    validaCaracteres = true;
    var elem = document.getElementById(elemento);
    if(elem.value.length >= maximoCaracteres || elem.value.length < minCaracteres) 
    {
        validaCaracteres = false;
    }    
    return validaCaracteres;
}

function validarSelect(lista)
{
    var sel = document.getElementById(lista);//.selectedIndex;
    
    
    alert(sel.selectedIndex);
     
    if (sel.selectedIndex == 0)
    {
        alert("seleccione por lo menos uno de los alumnos de la lista " + lista);
        
    }
    else{
        
        alert("frm");
    }
}
 

  
function validaTxt2()
{
    elem=document.getElementById('Provincias');
    errores=document.getElementById("errores");
    if(elem.value=="0")
    {
        elem.style.borderColor="red";            
        errores.innerHTML="El campo Provincia es obligatorio";
        errores.style.backgroundColor="red";
    }
       
     
}
            
            
function validarSelect1()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    for (var i=0; i< sel.length;i++)
    {
        if (sel[i].selectedIndex == 0)
        {
            //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
            //alert(sel[i].id);
            sel[i].style.borderColor="orange";
            fi = document.getElementById('MyForm'); // 1
            contenedor = document.createElement('div'); // 2
            contenedor.id = 'div'+ i; // 3
            contenedor.setAttribute('class','formlyRequired formlyAlert');
            contenedor.setAttribute('style','display: block;');
            contenedor.innerHTML= sel[i].id +" es un campo obligatorio."
            fi.appendChild(contenedor);
        }
    }
    
}

function validarFormAlumno()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    
    if (sel[0].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[0].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_provincias'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Provincias' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
        
    if (sel[1].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[1].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_municipios'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Municipios' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
        
    if (sel[4].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[4].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_nivel'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Nivel de Estudios' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
}
    
function validarFormCurso()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    
    if (sel[0].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[0].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_familia'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Familia' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
        
    if (sel[1].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[1].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_especialidad'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Especialidad' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
        
    if (sel[2].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[2].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_nivel'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Nivel de Estudios' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
}

function validarFormProfesor()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    
    if (sel[0].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[0].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_provincias'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Provincias' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
        
    if (sel[1].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[1].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_municipios'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Municipios' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
}
function validarFormEspecialidad()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    
    if (sel[0].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[0].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_familia'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Familia' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
}

function validarFormMunicipio()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    
    if (sel[0].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[0].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_municipio'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Provincia' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
}

function validarFormAlumnoCurso()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    
    if (sel[0].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[0].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_alumno_curso'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Alumno' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
}  

function validarFormDireccion()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    
    if (sel[0].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[0].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_provincias'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Provincia' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
        
    if (sel[1].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[1].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_municipios'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Municipio' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
}

function validarFormProfesorCurso()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    
    if (sel[0].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[0].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_profesor'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Profesor' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
}

function validarFormAlumnoCurso2()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    
    
    
    if (sel[0].selectedIndex == 0)
    {
        //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
        //alert(sel[i].id);
        sel[0].style.borderColor="orange";
        fi = document.getElementById('MyForm'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div_alumno_curso'; // 3
        contenedor.setAttribute('class','formlyRequired formlyAlert');
        contenedor.setAttribute('style','display: block;');
        contenedor.innerHTML= "'Alumno' es un campo obligatorio."
        fi.appendChild(contenedor);
    }
}
