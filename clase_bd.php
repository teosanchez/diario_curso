<?php
include_once ("constantes.php");
class bd
    {
    //Propiedades o atributos ------
    private $servidor, $bd, $usuario, $clave;
    //Metodos-----------
    public function __construct()
        {
        $this->servidor=SERVIDOR;
        $this->bd=BD;
        $this->usuario=USUARIO;
        $this->clave=PASSWORD;
        }
    /* public function insertar($consulta)
        {
        try
            {
            $link = mysql_connect($this->servidor,$this->usuario,$this->clave);
            mysql_select_db($this->bd, $link);

            $result = mysql_query($consulta, $link);
            if(! $result)
                {
                throw new Exception(mysql_error($link)); 
                }
            mysql_close();
            $result=mysql_insert_id($link);
            return $result;
            }
        catch (Exception $e)
            {
            throw new Exception ("Error de base de datos.<br>".$e->getMessage());
            }
        }
    */
    public function insertar($objeto)
        {
        $insert="";
        $valores="";
        $props=get_object_vars($objeto);
        $insert="insert into ".get_class($objeto)." (";
        foreach($props as $indice=>$valor)
            {
            if($valor<>null){
            $insert.=$indice.",";
            $valores.="'".$valor."',";
            }
            }
        $insert=substr($insert,0,strlen($insert)-1);
        $valores=substr($valores,0,strlen($valores)-1);
        $insert.=") values (".$valores.")";
        
        //return $this->consultar($insert);
        
        try
            {
            $link = mysql_connect($this->servidor,$this->usuario,$this->clave);
            mysql_select_db($this->bd, $link);
            $result = mysql_query($insert, $link);
            if(! $result)
                {
                throw new Exception(mysql_error($link)); 
                }
                $nuevoId=  mysql_insert_id($link);
            mysql_close();
            return $nuevoId;
            }
        catch (Exception $e)
            {
            throw new Exception ("Error de base de datos.<br>".$e->getMessage());
            }
         
        }
    public function borrar($objeto)
        {
        $id=get_object_vars($objeto);
        $borrar="delete from ".get_class($objeto)." where ID='".$id["ID"]."'";
        return $this->consultar($borrar);
        }
    public function actualizar($objeto)
        {
        $update="";
        $id="";
        $props=get_object_vars($objeto);
        $update="update ".get_class($objeto)." set ";
        $id=$props["ID"];
        foreach($props as $indice=>$valor)
            {
            if($indice!="ID" && isset($valor))
                {
                $update.=$indice."='". $valor."',";
                }
            }
        $update=substr($update,0,strlen($update)-1);
        $update.=" where ID='". $id."'";
        return $this->consultar($update);
        }
    public function buscar($objeto)
        {
        $select="";
        $id="";
        $props=get_object_vars($objeto);
        $select="select * from ".get_class($objeto). " where ";
        foreach($props as $indice=>$valor)
            {
            if(isset($valor))
                {
                $select.=$indice."='". $valor."' and ";
                }
            }
        $select=substr($select,0,strlen($select)-5);
        return $this->consultarArray($select);   
        }
    public function consultar($consulta)
        {
        try
            {
            $link = mysql_connect($this->servidor,$this->usuario,$this->clave);
            mysql_select_db($this->bd, $link);
            $result = mysql_query($consulta, $link);
            if(! $result)
                {
                throw new Exception(mysql_error($link)); 
                }
            mysql_close();
            return $result;
            }
        catch (Exception $e)
            {
            throw new Exception ("Error de base de datos.<br>".$e->getMessage());
            }
        }
    public function consultarArray($consulta)
        {
        $salida=null;
        $respuesta=$this->consultar($consulta);
        while ($fila = mysql_fetch_assoc($respuesta))
            {
            $salida[]=$fila;
            }
        return $salida;
        }
    }
?>
