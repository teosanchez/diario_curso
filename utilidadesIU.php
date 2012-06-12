<?php

class utilidadesIU {

//<<<<<<< HEAD
    public function pinta_selection($datos, $nombre, $campoVisible, $seleccion = -1) {

        //$salida = '<select size="1" require="true" label="' . $nombre . '" id="' . $nombre . '" name="' . $nombre . '">';
//=======
        $salida= '<select size="1" label="'.$nombre.'" id="'.$nombre.'" name="'.$nombre.'">';
/*>>>>>>> 1cc1a9d483f3c8a82b86ed3329103813ef86a7d9*/
        $salida.='<option  value="0">Seleccione...</option>';
        while ($row = mysql_fetch_array($datos)) {
            if ($seleccion == $row['ID']) {
                $selected = " selected ";
            } else {
                $selected = '';
            }
            $salida.='<option require="true" ' . $selected . 'value="' . $row['ID'] . '">' . $row[$campoVisible] . '</option>';
        }
        $salida.= "</select>";
        return $salida;
    }

    public function pinta_selection2($datos, $nombre, $campoVisible, $seleccion = -1) {

        $salida = '<select size="1" name="' . $nombre . '">';
        $salida.='<option  value="0">Seleccione...</option>';
        while ($row = mysql_fetch_array($datos)) {
            if ($seleccion == $row['anio']) {
                $selected = " selected ";
            } else {
                $selected = '';
            }
            $salida.='<option  ' . $selected . 'value="' . $row['anio'] . '">' . $row[$campoVisible] . '</option>';
        }
        $salida.= "</select>";
        return $salida;
    }

    public function buscar_elemento($elemento, $lista) {
        $encontrado = false;
        $num_reg = count($lista);
        for ($i = 0; $i < $num_reg; $i++) {
            if ($elemento == $lista[$i]["ID_MODULO"]) {
                $encontrado = true;
                break;
            }
        }
        return $encontrado;
    }

    public function buscar_check($elemento, $lista) {
        $encontrado = false;
        $num_reg = count($lista);
        for ($i = 0; $i < $num_reg; $i++) {
            if ($elemento == $lista[$i]["ID_CHECK"]) {
                $encontrado = true;
                break;
            }
        }
        return $encontrado;
    }

    
    public function pinta_checkboxes($datos, $datos_selecc, $nombre, $campoVisible) {
        $salida = "";
        $num_reg_datos = count($datos);
//echo "num_reg_datos: ".$num_reg_datos."</br>";
        if ($num_reg_datos > 0) {
            $num_reg_datos_selecc = count($datos_selecc);
//echo "num_reg_datos_selecc:".$num_reg_datos_selecc;
            $salida.="<table>";
            for ($i = 0; $i < $num_reg_datos; $i+=2) {
                $checked = "";
                $salida.="<tr>";
                $salida.='<td><input type="checkbox" name="' . $nombre . '[]' . '" value="' . $datos[$i]["ID"] . '"';
                if ($num_reg_datos_selecc > 0) {
                    if ($this->buscar_elemento($datos[$i]["ID"], $datos_selecc)) {
                        $checked = "CHECKED";
                    }
                }
                $salida.=$checked;
                $salida.='>' . $datos[$i][$campoVisible] . '</td>';
                $checked = "";
                if (($i + 1) < $num_reg_datos) {
                    $salida.='<td><input type="checkbox" name="' . $nombre . '[]' . '" value="' . $datos[$i + 1]["ID"] . '"';
                    if ($num_reg_datos_selecc > 0) {
                        if ($this->buscar_elemento($datos[$i + 1]["ID"], $datos_selecc)) {
                            $checked = "CHECKED";
                        }
                    }
                    $salida.=$checked;
                    $salida.='>' . $datos[$i + 1][$campoVisible] . '</td>';
                }
                $salida.="</tr>";
            }
            $salida.="</table>";
        }
        return $salida;
    }

    public function pinta_checkboxes_marcados($datos, $datos_selecc, $nombre, $campoVisible) {
        $salida = "";
        $num_reg_datos = count($datos);
//echo "num_reg_datos: ".$num_reg_datos."</br>";
        if ($num_reg_datos > 0) {
            $num_reg_datos_selecc = count($datos_selecc);
//echo "num_reg_datos_selecc:".$num_reg_datos_selecc;
            $salida.="<table>";
            for ($i = 0; $i < $num_reg_datos; $i+=2) {
                $checked = "";
                $salida.="<tr>";
                $salida.='<td><input type="checkbox" name="' . $nombre . '[]' . '" value="' . $datos[$i]["ID_MODULO"] . '"';
                if ($num_reg_datos_selecc > 0) {
                    if ($this->buscar_check($datos[$i]["ID_MODULO"], $datos_selecc)) {
                        $checked = "CHECKED";
                    }
                }
                $salida.=$checked;
                $salida.='>' . $datos[$i][$campoVisible] . '</td>';
                $checked = "";
                if (($i + 1) < $num_reg_datos) {
                    $salida.='<td><input type="checkbox" name="' . $nombre . '[]' . '" value="' . $datos[$i + 1]["ID_MODULO"] . '"';
                    if ($num_reg_datos_selecc > 0) {
                        if ($this->buscar_check($datos[$i + 1]["ID_MODULO"], $datos_selecc)) {
                            $checked = "CHECKED";
                        }
                    }
                    $salida.=$checked;
                    $salida.='>' . $datos[$i + 1][$campoVisible] . '</td>';
                }
                $salida.="</tr>";
            }
            $salida.="</table>";
        }
        return $salida;
    }
    
    
    public function pinta_modulos($lista) {
        $salida = "";
        $num_reg = count($lista);
        if ($num_reg > 0) {
            for ($i = 0; $i < $num_reg; $i++) {
                $salida.=$lista[$i]["MODULO"] . "<br>";
            }
        }
        return $salida;
    }

    public function pinta_entradas($datos) {
        $salida = '';
        $bd = new bd();
        while ($row = mysql_fetch_array($datos)) {


            $salida.='<article class="post">';

            $salida.='<div class="primary">';

            $salida.='<h2>' . $row["TITULO"] . '</h2>';

            $salida.='<p class="post-info"><span>M&oacute;dulos:</span>';

            $checks = $bd->consultar("select MODULO from vw_diario_profesor_curso_nombre_check 
                where ID ='" . $row["ID"] . "'");

            if ($checks)
            {
                while ($row2 = mysql_fetch_array($checks)) 
                {
                     $salida.= '</br>' . $row2["MODULO"];
                }
            }
            
            $salida.='</p>';

            $salida.='<p>';
            $salida.=$row["ENTRADA"];
            $salida.='</p>';

            $salida.='<p><form><input type="button" value="Continuar leyendo &raquo;" /></form></p>';

            $salida.='</div>';

            $salida.='<aside>';

            $salida.='<p class="dateinfo">'.$row["FECHA"].'<span></span></p>';

            $salida.='<div class="post-meta">';
            $salida.='<h4>Post Info</h4>';
            $salida.='<ul>';
            $salida.=' <li class="user">Manolito</li>';
            $salida.='<li class="time">'.$row["HORA"].'</li>';
            $salida.='<td class="td_imagen"><a class="img_rejilla" href="index.php?cuerpo=form_diario.php&ID='.$row["ID"].'&ID_PROFESOR_CURSO='.$row["ID_PROFESOR_CURSO"].'"><img class="a_img_rejilla" src="images/lapiz.png"/></a></td>';
            $salida.='<td class="td_imagen"><a class="img_rejilla" href="index.php?cuerpo=procesar_diario.php&ID='.$row["ID"].'&ID_PROFESOR_CURSO='.$row["ID_PROFESOR_CURSO"].'&Borrar=Borrar"><img class="a_img_rejilla" src="images/borrar.png"/></a></td>';
            $salida.='</form></li>';
            $salida.='</ul>';
            $salida.='  </div>';

            $salida.='</aside>';

            $salida.='</article>';
        }
        return $salida;
    }

}

?>
