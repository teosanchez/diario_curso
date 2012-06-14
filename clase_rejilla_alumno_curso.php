<?php

class rejilla_alumno_curso {

    private $_datos; //array de datos a mostrar
    private $_formDestino; //formulario de edicion de cada fila
    private $_campoClave; // Clave primaria de la tabla
    private $_campoEnlace; //Campo que hara de enlace al form de edicion
    private $_origen; // Archivo al que tiene que va pulsando Volver en la rejilla
    private $_grupo_id; // Perfil del usuario

    public function __construct($datos, $formDestino, $campoClave, $campoEnlace, $origen, $grupo_id) {
        $this->_datos = $datos;
        $this->_formDestino = $formDestino;
        $this->_campoClave = strtoupper($campoClave);
        $this->_campoEnlace = strtoupper($campoEnlace);
        $this->_origen = strtoupper($origen);
        $this->_grupo_id = $grupo_id;
    }

    private function cabecera() {
        $salida = '<table id="example" class="display"><thead><tr>';
        $datos = $this->_datos;

        foreach ($datos[0] as $indice => $valor) {
            if ($indice <> "ID") /* Incluir en generador */ { /* Incluir en generador */
                $salida.="<th>" . $indice . "</th>";
            } /* Incluir en generador */
        }
        if ($this->_grupo_id == ADMINISTRADOR || $this->_grupo_id == SECRETARIA)
        {
            $salida.="<th>Modificar</th>";
            $salida.="<th>Eliminar</th>";
        }
        $salida.="</tr></thead>";
        return $salida;
    }

    private function enlazar($indice, $valor, $valorClave) {        
        $salida = $valor;
        return $salida;
    }

    public function pintar() {
        $procesar = substr_replace($this->_formDestino, "procesar", 17, 4);
        
        $datos = $this->_datos;

        $salida = $this->cabecera();

        $salida.="<tbody>";

        foreach ($datos as $fila) {
            $salida.="<tr>";
            foreach ($fila as $indice => $valor) {
                if ($indice <> "ID") /* Incluir en generador */ { /* Incluir en generador */
                    $clave = $fila[$this->_campoClave];
                    if($indice!="Suplente"){
                    $salida.="<td>" . $this->enlazar($indice, $valor, $clave) . "</td>";
            
                    }
                }/* Incluir en generador */
            }
            
            
             if($fila["Suplente"]==0)
                    {
                    $salida.="<td>Matriculado</td>";        
                    }
                else 
                    {
                    $salida.="<td>Reserva</td>";
                    }
            if ($this->_grupo_id == ADMINISTRADOR || $this->_grupo_id == SECRETARIA)
            {
                $salida.='<td class="td_imagen"><a class="img_rejilla" href="' . $this->_formDestino . 'ID=' . $clave . '&origen='.$this->_origen .'"><img class="a_img_rejilla" src="images/lapiz.png"/></a></td>';
                $salida.='<td class="td_imagen"><a class="img_rejilla" href="'.$procesar.'ID=' . $clave .'&origen='.$this->_origen . '&Borrar=Borrar"><img class="a_img_rejilla" src="images/borrar.png"/></a></td>';                    
            }
            $salida.="</tr>";
        }

        $salida.="</tbody>";
        $salida.=$this->pie();
        return $salida;
    }

    private function pie() {
        $salida = "</table>";
        return $salida;
    }

}

?>

