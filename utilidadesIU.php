<?php

class utilidadesIU 
{
    
     public function pinta_selection($datos,$nombre,$campoVisible,$seleccion=-1)
    {

        $salida= '<select size="1" id="'.$nombre.'" name="'.$nombre.'">';
        $salida.='<option  value="0">Seleccione...</option>';
        while($row = mysql_fetch_array($datos))
        {    
                if($seleccion==$row['ID'])
                {
                    $selected=" selected ";
                }
                else
                {
                    $selected='';
                }
                $salida.='<option  '.$selected.'value="'.$row['ID'].'">'.$row[$campoVisible].'</option>';
        }
        $salida.= "</select>";
        return $salida;

    }
    


     public function pinta_selection2($datos,$nombre,$campoVisible,$seleccion=-1)
    {

        $salida= '<select size="1" name="'.$nombre.'">';
        $salida.='<option  value="0">Seleccione...</option>';
        while($row = mysql_fetch_array($datos))
        {    
                if($seleccion==$row['anio'])
                {
                    $selected=" selected ";
                }
                else
                {
                    $selected='';
                }
                $salida.='<option  '.$selected.'value="'.$row['anio'].'">'.$row[$campoVisible].'</option>';
        }
        $salida.= "</select>";
        return $salida;

    }

     public function buscar_elemento($elemento,$lista)
    {
        $encontrado=false;
        $num_reg=count($lista);
        for ($i=0; $i<$num_reg;$i++)
        {
            if ($elemento==$lista[$i]["ID_MODULO"])
            {
                $encontrado=true;
                break;
            }
        }
        return $encontrado;
    }

     public function pinta_checkboxes($datos,$datos_selecc,$nombre,$campoVisible)
    {
        $salida="";
        $num_reg_datos = count($datos);
        //echo "num_reg_datos: ".$num_reg_datos."</br>";
        if ($num_reg_datos>0)
        {
            $num_reg_datos_selecc = count($datos_selecc);
            //echo "num_reg_datos_selecc:".$num_reg_datos_selecc;
            $salida.="<table>";
            for ($i=0;$i<$num_reg_datos;$i+=2)
            {
               $checked="";
               $salida.="<tr>";
               $salida.='<td><input type="checkbox" name="'.$nombre.'[]'.'" value="'.$datos[$i]["ID"].'"';
               if ($num_reg_datos_selecc>0)
               {
                   if ($this->buscar_elemento($datos[$i]["ID"],$datos_selecc))
                   {
                       $checked="CHECKED";
                   }
                   
               }
               $salida.=$checked;
               $salida.='>'.$datos[$i][$campoVisible].'</td>';
               $checked="";
               if (($i+1)<$num_reg_datos)
               {
                    $salida.='<td><input type="checkbox" name="'.$nombre.'[]'.'" value="'.$datos[$i+1]["ID"].'"';
                    if ($num_reg_datos_selecc>0)
                       {
                           if ($this->buscar_elemento($datos[$i+1]["ID"],$datos_selecc))
                           {
                               $checked="CHECKED";
                           }
                       }
               $salida.=$checked;
               $salida.='>'.$datos[$i+1][$campoVisible].'</td>';
               }
               $salida.="</tr>";
            }
            $salida.="</table>";
        }
        return $salida;
    }
    
    public function pinta_modulos($lista)
    {
        $salida="";
        $num_reg=count($lista);
        if ($num_reg>0)
        {
            for ($i=0;$i<$num_reg;$i++)
            {
                $salida.=$lista[$i]["MODULO"]."<br>";
            }
        }
        return $salida;
    }
        
               
    
}
?>
