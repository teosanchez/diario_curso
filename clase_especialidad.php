<?php
 
        class especialidad

        {

            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_FAMILIA=null;
	 public $NOMBRE=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['ID'])?$this->ID=$arrayValores['ID']:$this->ID=null;
		 isset($arrayValores['ID_FAMILIA'])?$this->ID_FAMILIA=$arrayValores['ID_FAMILIA']:$this->ID_FAMILIA=null;
		 isset($arrayValores['NOMBRE'])?$this->NOMBRE=$arrayValores['NOMBRE']:$this->NOMBRE=null;
	}
}
?>