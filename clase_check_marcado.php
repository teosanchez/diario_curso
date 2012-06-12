<?php
 
        class check_marcados

        {

            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_CHECK=null;
	 public $ID_DIARIO=null;         
         
	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['ID'])?$this->ID=$arrayValores['ID']:$this->ID=null;
		 isset($arrayValores['ID_CHECK'])?$this->ID_CHECK=$arrayValores['ID_CHECK']:$this->ID_CHECK=null;
		 isset($arrayValores['ID_DIARIO'])?$this->ID_DIARIO=$arrayValores['ID_DIARIO']:$this->ID_DIARIO=null;                 
	}
}
?>