<?php

class rejilla_alumno_curso {

    private $_datos; //array de datos a mostrar
    private $_formDestino; //formulario de edicion de cada fila
    private $_campoClave; // Clave primaria de la tabla
    private $_campoEnlace; //Campo que hara de enlace al form de edicion

    public function __construct($datos, $formDestino, $campoClave, $campoEnlace) {
        $this->_datos = $datos;
        $this->_formDestino = $formDestino;
        $this->_campoClave = strtoupper($campoClave);
        $this->_campoEnlace = strtoupper($campoEnlace);
    }

    private function cabecera() {
        $salida = '<table id="example" class="display"><thead><tr>';
        $datos = $this->_datos;

        foreach ($datos[0] as $indice => $valor) {
            if ($indice <> "ID") /* Incluir en generador */ { /* Incluir en generador */
                $salida.="<th>" . $indice . "</th>";
            } /* Incluir en generador */
        }
        $salida.="<th>Modificar</th>";
        $salida.="<th>Eliminar</th>";
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
            $salida.='<td class="td_imagen"><a class="img_rejilla" href="' . $this->_formDestino . 'ID=' . $clave . '"><img class="a_img_rejilla" src="images/lapiz.png"/></a></td>';
            $salida.='<td class="td_imagen"><a class="img_rejilla" href="'.$procesar.'ID=' . $clave . '&Borrar=Borrar"><img class="a_img_rejilla" src="images/borrar.png"/></a></td>';
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

