<?php
 
        class modulo_curso

        {

            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_MODULO=null;
	 public $ID_CURSO=null;
	 public $HORAS=null;
	 public $DESCRIPCION=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['ID'])?$this->ID=$arrayValores['ID']:$this->ID=null;
		 isset($arrayValores['ID_MODULO'])?$this->ID_MODULO=$arrayValores['ID_MODULO']:$this->ID_MODULO=null;
		 isset($arrayValores['ID_CURSO'])?$this->ID_CURSO=$arrayValores['ID_CURSO']:$this->ID_CURSO=null;
		 isset($arrayValores['HORAS'])?$this->HORAS=$arrayValores['HORAS']:$this->HORAS=null;
		 isset($arrayValores['DESCRIPCION'])?$this->DESCRIPCION=$arrayValores['DESCRIPCION']:$this->DESCRIPCION=null;
	}
}
?>