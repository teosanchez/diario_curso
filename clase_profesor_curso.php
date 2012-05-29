<?php

class profesor_curso {

    //Atributos de la tabla de la bd
    public $ID = null;
    public $ID_PROFESOR = null;
    public $ID_CURSO = null;
    public $FECHA_ALTA = null;
    public $FECHA_BAJA = null;

    public function cargar($arrayValores) {

        if (!is_array($arrayValores)) {
            throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");
        }
        isset($arrayValores['ID']) ? $this->ID = $arrayValores['ID'] : $this->ID = null;
        isset($arrayValores['ID_PROFESOR']) ? $this->ID_PROFESOR = $arrayValores['ID_PROFESOR'] : $this->ID_PROFESOR = null;
        isset($arrayValores['ID_CURSO']) ? $this->ID_CURSO = $arrayValores['ID_CURSO'] : $this->ID_CURSO = null;
        isset($arrayValores['FECHA_ALTA']) ? $this->FECHA_ALTA = date("d-m-Y", strtotime($arrayValores['FECHA_ALTA'])) : $this->FECHA_ALTA = null;
        isset($arrayValores['FECHA_BAJA']) ? $this->FECHA_BAJA = date("d-m-Y", strtotime($arrayValores['FECHA_BAJA'])) : $this->FECHA_BAJA = null;
    }

}

?>