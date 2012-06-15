<?php

class utilidadesIU {

    public function pinta_selection($datos, $nombre, $campoVisible, $seleccion = -1) {

        $salida = '<select size="1" label="' . $nombre . '" id="' . $nombre . '" name="' . $nombre . '">';

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
    
    public function pinta_selection_cursos($datos, $nombre, $campoVisible, $seleccion = -1) {

        $salida= '<select size="1" label="'.$nombre.'" id="'.$nombre.'" name="'.$nombre.'">';

        $salida.='<option  value="0">Seleccione...</option>';
        while ($row = mysql_fetch_array($datos)) {
            if ($seleccion == $row['ID_CURSO']) {
                $selected = " selected ";
            } else {
                $selected = '';
            }
            $salida.='<option require="true" ' . $selected . 'value="' . $row['ID_CURSO'] . '">' . $row[$campoVisible] . '</option>';
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

    public function pinta_entradas($datos, $grupo_id) {
        $salida = '';

        $bd = new bd();
        
        $contador = 1;
        while ($row = mysql_fetch_array($datos)) {
            
            $salida.='<article class="post">';

            $salida.='<div class="primary">';

            $salida.='<h2>' . $row["TITULO"] . '</h2>';

            $salida.='<p class="post-info"><span>M&oacute;dulos:</span>';

            $checks = $bd->consultar("select MODULO from vw_diario_profesor_curso_nombre_check 
                where ID ='" . $row["ID"] . "'");

            if ($checks) {
                while ($row2 = mysql_fetch_array($checks)) {
                    $salida.= '</br>' . $row2["MODULO"];
                }
            }

            $salida.='</p>';

            $salida.='<p id="texto_mostrar_'.$contador.'">';
            
            $salida.=$row["ENTRADA"];
            
            $salida.='</p>';
            
            $salida.='<p><form><input id="boton_mostrar_'.$contador.'" type="button" value="Continuar leyendo &raquo;" onclick="muestraOculta(\''.$contador.'\')"/></form></p>';
                        
            $salida.='</div>';

            $salida.='<aside>';

            $salida.='<span>' . $row["ANO"] . '</span>';

            switch ($row["MES"]) {
                case 1: $MES = "ENE"; break;  case 2: $MES = "FEB"; break; case 3: $MES = "MAR"; break;  case 4: $MES = "ABR"; break; case 5: $MES = "MAY"; break; case 6: $MES = "JUN"; break; case 7: $MES = "JUL"; break; case 8: $MES = "AGO"; break; case 9: $MES = "SEP"; break; case 10: $MES = "OCT"; break; case 11: $MES = "NOV"; break; case 12: $MES = "DIC"; break;
            }

            $salida.='<p class="dateinfo">' . $row["DIA"] . '<span>' . $MES . '</span></p>';

            $salida.='<div class="post-meta">';
            $salida.='<h4>Info Entrada</h4>';
            $salida.='<ul>';
            $salida.=' <li class="user">' . $row["PROFESOR"] . '</li>';
            $salida.='<li class="time">' . $row["HORA"] . '</li>';
            if ($grupo_id == PROFESOR) {
                $salida.='<td class="td_imagen"><a class="img_rejilla" id="editar" href="index.php?cuerpo=form_diario.php&ID=' . $row["ID"] . '&ID_PROFESOR_CURSO=' . $row["ID_PROFESOR_CURSO"] . '"><img class="a_img_rejilla" src="images/lapiz.png"/></a></td>';
                $salida.='<td class="td_imagen"><a class="img_rejilla" id="borrar" href="index.php?cuerpo=procesar_diario.php&ID=' . $row["ID"] . '&ID_PROFESOR_CURSO=' . $row["ID_PROFESOR_CURSO"] . '&Borrar=Borrar"><img class="a_img_rejilla" src="images/borrar.png"/></a></td>';
            }
            $salida.='</form></li>';
            $salida.='</ul>';
            $salida.='  </div>';

            $salida.='</aside>';

            $salida.='</article>';
            
            $contador++;
        }
        return $salida;
    }

    public function pinta_inicio($grupo_id) {
        $salida = "";

        // Caja de Administración de Cursos
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA) {
            $salida.='<a class="portfolio_item float alpha" href="index.php?cuerpo=rejilla_curso.php">';
            $salida.='<span>Administraci&oacute;n de Cursos</span>';
        } else {
            $salida.='<a class="portfolio_item float alpha" href="index.php?cuerpo=rejilla_curso.php">';
            $salida.='<span>Listado de Cursos</span>';
        }
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA) {
            $salida.='<img class="" src="images/curso.png"  alt=""/>';
        } else {
            $salida.='<img class="" src="images/curso.png"  alt=""/>';
        }
        $salida.='</a>';


        // Caja de Administración de Profesores de un curso

 
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA)
        {
            $salida.='<a class="portfolio_item float " href="index.php?cuerpo=rejilla_profesor_curso.php&origen=app_inicio.php">';

            $salida.='<span>Adm&oacute;n de Profesores de un Curso</span>';
        } else {
            $salida.='<a class="portfolio_item float " href="#">';
        }
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA) {
            $salida.='<span>Adm&oacute;n de Profesores de un Curso</span>';
        }
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA) {
            $salida.='<img class="" src="images/profesor.png"  alt=""/>';
        } else {
            $salida.='<img class="" src="images/profesor.png"  alt=""/>';
        }
        $salida.='</a>';


        // Caja de Administración de Alumnos de un curso

        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA)
        {
            $salida.='<a class="portfolio_item float " href="index.php?cuerpo=rejilla_alumno_curso.php&origen=app_inicio.php">';

            $salida.='<span>Adm&oacute;n de Alumnos de un Curso</span>';
        } else {
            $salida.='<a class="portfolio_item float " href="#">';
        }
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA) {
            $salida.='<img class="" src="images/alumno.png"  alt=""/>';
        } else {
            $salida.='<img class="" src="images/alumno.png"  alt=""/>';
        }
        $salida.='</a>';


        // Caja de Horarios y Calendarios
        $salida.='<a class="portfolio_item float omega" href="#">';
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA) {
            $salida.='<span>Adm&oacute;n. de Calendarios y Horarios</span>';
        } else {
            $salida.='<span>Calendarios y Horarios</span>';
        }
        $salida.='<img class="" src="images/calendario.png"  alt=""/>';
        $salida.='</a>';


        // Caja de Administración General
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA) {
            $salida.='<a class="portfolio_item float alpha" href="index.php?cuerpo=menu.php">';
        } else {
            $salida.='<a class="portfolio_item float alpha" href="#">';
        }
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA) {
            $salida.='<span>Administraci&oacute;n General</span>';
        }
        if ($grupo_id == ADMINISTRADOR || $grupo_id == SECRETARIA) {
            $salida.='<img class="" src="images/admin.png"  alt=""/>';
        } else {
            $salida.='<img class="" src="images/admin.png"  alt=""/>';
        }
        $salida.='</a>';


        // Caja de Diario de clase de un curso
        $salida.='<a class="portfolio_item float" href="index.php?cuerpo=rejilla_diario.php&origen=app_inicio.php">';
        $salida.='<span>Diario de clase</span>';
        $salida.='<img class="" src="images/diario.png"  alt=""/>';
        $salida.='</a>';


        // Caja de Informes y Estadísticas
        $salida.='<a class="portfolio_item float" href="index.php?cuerpo=rejilla_modulo_curso.php&origen=app_inicio.php">';
        $salida.='<span>Programa de un Curso</span>';
        $salida.='<img class="" src="images/estadisticas.png"  alt=""/>';
        $salida.='</a>';


        // Caja de Perfil de usuario
        $salida.='<a class="portfolio_item float omega" href="#">';
        $salida.='<span>Perfil de usuario</span>';
        $salida.='<img class="" src="images/conf_cuenta.png"  alt=""/>';
        $salida.='</a>';


        return $salida;
    }

}

?>
