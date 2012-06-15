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
    
    if(sel[0].selectedIndex == 0)
    {
        if (!document.getElementById('div_provincia'))
        {
            //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
            //alert(sel[i].id);
            sel[0].style.borderColor="orange";
            fi = document.getElementById('MyForm'); // 1
            contenedor_provincia = document.createElement('div'); // 2
            contenedor_provincia .id = 'div_provincia'; // 3
            contenedor_provincia .setAttribute('class','formlyRequired formlyAlert');
            contenedor_provincia .setAttribute('style','display: block;');
            contenedor_provincia .innerHTML= "'Provincia' es un campo obligatorio."
            fi.appendChild(contenedor_provincia );   
        }
        else
            {
                fi.appendChild(contenedor_provincia);
            }
    }
    else
    {
        sel[0].style.borderColor="";
        fi.removeChild(contenedor_provincia);
    //alert("Sel ya no vale 0 y se debe de borrar el div");
    }
    
    
    if(sel[1].selectedIndex == 0)
    {
        if (!document.getElementById('div_municipio'))
        {
            //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
            //alert(sel[i].id);
            sel[1].style.borderColor="orange";
            fi = document.getElementById('MyForm'); // 1
            contenedor_municipio = document.createElement('div'); // 2
            contenedor_municipio .id = 'div_municipio'; // 3
            contenedor_municipio .setAttribute('class','formlyRequired formlyAlert');
            contenedor_municipio .setAttribute('style','display: block;');
            contenedor_municipio .innerHTML= "'Municipo' es un campo obligatorio."
            fi.appendChild(contenedor_municipio);   
        }
        else
            {
                fi.appendChild(contenedor_municipio);
            }
    }
    else
    {
        sel[1].style.borderColor="";
        fi.removeChild(contenedor_municipio);
    //alert("Sel ya no vale 0 y se debe de borrar el div");
    }
    
    
    if(sel[4].selectedIndex == 0)
    {
        if (!document.getElementById('div_nivel'))
        {
            //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
            //alert(sel[i].id);
            sel[4].style.borderColor="orange";
            fi = document.getElementById('MyForm'); // 1
            contenedor_nivel = document.createElement('div'); // 2
            contenedor_nivel .id = 'div_nivel'; // 3
            contenedor_nivel .setAttribute('class','formlyRequired formlyAlert');
            contenedor_nivel .setAttribute('style','display: block;');
            contenedor_nivel .innerHTML= "'Nivel de Estudios' es un campo obligatorio."
            fi.appendChild(contenedor_nivel);   
        }
        else
            {
                fi.appendChild(contenedor_nivel);
            }
    }
    else
    {
        sel[4].style.borderColor="";
        fi.removeChild(contenedor_nivel);
    //alert("Sel ya no vale 0 y se debe de borrar el div");
    }
}


function validarFormCurso()
{
    var sel = document.getElementsByTagName('select');//.selectedIndex;
    if(sel[0].selectedIndex == 0)
    {
        if (!document.getElementById('div_familia'))
        {
            //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
            //alert(sel[i].id);
            sel[0].style.borderColor="orange";
            fi = document.getElementById('MyForm'); // 1
            contenedor_familia = document.createElement('div'); // 2
            contenedor_familia .id = 'div_familia'; // 3
            contenedor_familia .setAttribute('class','formlyRequired formlyAlert');
            contenedor_familia .setAttribute('style','display: block;');
            contenedor_familia .innerHTML= "'Familia' es un campo obligatorio."
            fi.appendChild(contenedor_familia);   
        }
        else
        {
            fi.appendChild(contenedor_familia);
        }
    }
    else
    {
        sel[0].style.borderColor="";
        fi.removeChild(contenedor_familia);
    //alert("Sel ya no vale 0 y se debe de borrar el div");
    }


        
    if(sel[1].selectedIndex == 0)
    {
        if (!document.getElementById('div_especialidad'))
        {
            //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
            //alert(sel[i].id);
            sel[1].style.borderColor="orange";
            fi = document.getElementById('MyForm'); // 1
            contenedor_especialidad = document.createElement('div'); // 2
            contenedor_especialidad.id = 'div_especialidad'; // 3
            contenedor_especialidad.setAttribute('class','formlyRequired formlyAlert');
            contenedor_especialidad.setAttribute('style','display: block;');
            contenedor_especialidad.innerHTML= "'especialidad' es un campo obligatorio."
            fi.appendChild(contenedor_especialidad);   
        }
        else
        {
            fi.appendChild(contenedor_especialidad);
        }
    }
    else
    {
        sel[1].style.borderColor="";
        fi.removeChild(contenedor_especialidad);
    //alert("Sel ya no vale 0 y se debe de borrar el div");
    }
        
   
    if(sel[2].selectedIndex == 0)
    {
        if (!document.getElementById('div_nivel'))
        {
            //alert("No se ha seleccionado nigun elemento "+sel[i].selectedIndex);
            //alert(sel[i].id);
            sel[2].style.borderColor="orange";
            fi = document.getElementById('MyForm'); // 1
            contenedor_nivel = document.createElement('div'); // 2
            contenedor_nivel.id = 'div_nivel'; // 3
            contenedor_nivel.setAttribute('class','formlyRequired formlyAlert');
            contenedor_nivel.setAttribute('style','display: block;');
            contenedor_nivel.innerHTML= "'Nivel de Estudios' es un campo obligatorio."
            fi.appendChild(contenedor_nivel);   
        }
        else
            {
                fi.appendChild(contenedor_nivel);
            }
    }
    else
    {
        sel[2].style.borderColor="";
        fi.removeChild(contenedor_nivel);
    alert("Sel ya no vale 0 y se debe de borrar el div");
    }
    
}


/*function validarFormProfesor()
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
}*/


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


/*function validarFormProfesorCurso()
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
}*/

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

function validarFormMunicipios()
{ 
        var x = 1;
        var mensajes = new Array(2); 
        mensajes[0] = "Tiene que elegir una provincia";
        mensajes[1] = "Tiene que escribir un municipio";
        var sel = document.getElementById('ID_PROVINCIA');
        var inp = document.getElementById('NOMBRE');
        var form = document.getElementById("MyForm");
        
        //Valida el select con las provincias
   	if (sel.selectedIndex==0)
        { 
            alert(mensajes[0]);
            sel[0].focus();
            //return 0; 
            x=0;
   	} 

        //valido el nombre del municipio 
   	if (inp.value.length==0)
        { 
            alert(mensajes[1]);
            inp.focus();
            //return 0; 
            x=0;
   	} 
        
   	//el formulario se envia 
        if(x==0)
        {
            return x; 
        }
        else
        {
           //alert("Muchas gracias por enviar el formulario"); 
           form.submit(); 
        }
   	
        //parent.location='index.php?cuerpo=rejilla_municipio.php';
}

function validarFormModulo()
{ 
        var x = 1;
        var mensajes = new Array(1); 
        mensajes[0] = "Tiene que escribir un modulo";
        var inp = document.getElementById('NOMBRE');
        var form = document.getElementById("MyForm");
        
        //valido el nombre del modulo
   	if (inp.value.length==0)
        { 
            alert(mensajes[0]);
            inp.focus();
            //return 0; 
            x=0;
   	} 
        
   	//el formulario se envia 
        if(x==0)
        {
            return x; 
        }
        else
        {
           //alert("Muchas gracias por enviar el formulario"); 
           form.submit(); 
        }
   	
        //parent.location='index.php?cuerpo=rejilla_municipio.php';
}

function validarFormNacionalidad()
{ 
        var x = 1;
        var mensajes = new Array(1); 
        mensajes[0] = "Tiene que escribir una nacionalidad";
        var inp = document.getElementById('NOMBRE');
        var form = document.getElementById("MyForm");
              
   	if (inp.value.length==0)
        { 
            alert(mensajes[0]);
            inp.focus();
            //return 0; 
            x=0;
   	} 
        
   	//el formulario se envia 
        if(x==0)
        {
            return x; 
        }
        else
        {
           //alert("Muchas gracias por enviar el formulario"); 
           form.submit(); 
        }
   	
        //parent.location='index.php?cuerpo=rejilla_municipio.php';
}

function validarFormNivelEstudios()
{ 
        var x = 1;
        var mensajes = new Array(1); 
        mensajes[0] = "Tiene que escribir un nivel de estudios";
        var inp = document.getElementById('NOMBRE');
        var form = document.getElementById("MyForm");
              
   	if (inp.value.length==0)
        { 
            alert(mensajes[0]);
            inp.focus();
            //return 0; 
            x=0;
   	} 
        
   	//el formulario se envia 
        if(x==0)
        {
            return x; 
        }
        else
        {
           //alert("Muchas gracias por enviar el formulario"); 
           form.submit(); 
        }
   	
        //parent.location='index.php?cuerpo=rejilla_municipio.php';
}


function validarFormProfesor()
{ 
        var x = 1;
        var mensajes = new Array(8); 
        mensajes[0] = "Tiene que escribir un nombre";
        mensajes[1] = "Tiene que escribir un apellido";
        mensajes[2] = "Tiene que escribir un DNI";
        mensajes[3] = "Tiene que escribir un nombre de usuario";
        mensajes[4] = "Tiene que escribir una contraseña";
        mensajes[5] = "Tiene que seleccionar una provincia";
        mensajes[6] = "Tiene que seleccionar un municipio";
        mensajes[7] = "Tiene que escribir un telefono";
        mensajes[8] = "Tiene que escribir un email";
        var nombre = document.getElementById('NOMBRE');
        var apellidos = document.getElementById('APELLIDOS');
        var dni = document.getElementById('DNI');
        var username = document.getElementById('username');
        var password = document.getElementById('password');
        var provincias = document.getElementById('Provincias');
        var municipios = document.getElementById('Municipios');
        var email = document.getElementById('EMAIL');
        var telefono = document.getElementById('TELEFONO');
        var form = document.getElementById("MyForm");
              
   	if(nombre.value.length==0)
        { 
            alert(mensajes[0]);
            nombre.focus();
            //return 0; 
            x=0;
   	} 
        if(apellidos.value.length==0)
        { 
            alert(mensajes[1]);
            apellidos.focus();
            //return 0; 
            x=0;
   	}
        if(dni.value.length==0)
        { 
            alert(mensajes[2]);
            dni.focus();
            //return 0; 
            x=0;
   	}
        if(username.value.length==0)
        { 
            alert(mensajes[3]);
            username.focus();
            //return 0; 
            x=0;
   	}
        if(password.value.length==0)
        { 
            alert(mensajes[4]);
            password.focus();
            //return 0; 
            x=0;
   	}
        if(provincias.selectedIndex==0)
        { 
            alert(mensajes[5]);
            provincias.focus();
            //return 0; 
            x=0;
   	}
        if(municipios.selectedIndex==0)
        { 
            alert(mensajes[6]);
            municipios.focus();
            //return 0; 
            x=0;
   	}
        if(telefono.value.length==0)
        { 
            alert(mensajes[7]);
            telefono.focus();
            //return 0; 
            x=0;
   	}
        if(email.value.length==0)
        { 
            alert(mensajes[8]);
            email.focus();
            //return 0; 
            x=0;
   	}

   	//el formulario se envia 
        if(x==0)
        {
            return x; 
        }
        else
        {
           //alert("Muchas gracias por enviar el formulario"); 
           form.submit(); 
        }
}

function validarFormSeleccionCurso()
{ 
        var x = 1;
        var mensaje = "Tiene que elegir un curso";
        var sel = document.getElementById('ID_PROFESOR_CURSO');
        var form = document.getElementById('formulario_seleccion_curso');
        
        //Valida el select con los cursos
   	if (sel.selectedIndex==0)
        { 
            alert(mensaje);
            sel.focus();
        }
        
        //el formulario se envia 
        if(x==0)
        {
            return x; 
        }
        else
        {
           //alert("Muchas gracias por enviar el formulario"); 
           form.submit(); 
        }
}

function validarListaCursos()
{ 
   	//valida la provincia del select 
        //var prov = document.MyForm.Provincia;
        //alert(prov);
        var x = 1;
        var mensajes = new Array(2); 
        mensajes[0] = "Tiene que seleccionar un curso";        
        var sel = document.getElementById('Cursos');
        
        var form = document.getElementById("formNuevo");
        
   	if (sel.selectedIndex==0)
        { 
            alert(mensajes[0]);

            sel.focus();
            //return 0; 
            x=0;
   	} 

   	//el formulario se envia 
        if(x==0)
        {
            return x; 
        }
        else
        {
           //alert("Muchas gracias por enviar el formulario"); 
           form.submit(); 
        }
}

function validarFormProfesorCurso()
{ 
        var x = 1;
        var mensajes = "Tiene que escribir una fecha de alta";
        var inp = document.getElementById('FECHA_ALTA');
        var form = document.getElementById("MyForm");
              
   	if (inp.value.length==0)
        { 
            alert(mensajes);
            inp.focus();
            //return 0; 
            x=0;
   	} 
        
   	//el formulario se envia 
        if(x==0)
        {
            return x; 
        }
        else
        {
           //alert("Muchas gracias por enviar el formulario"); 
           form.submit(); 
        }
}

        