<?php
 
        class direccion

        {

            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_MUNICIPIO=null;
	 public $CALLE=null;
	 public $NUMERO=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['ID'])?$this->ID=$arrayValores['ID']:$this->ID=null;
		 isset($arrayValores['ID_MUNICIPIO'])?$this->ID_MUNICIPIO=$arrayValores['ID_MUNICIPIO']:$this->ID_MUNICIPIO=null;
		 isset($arrayValores['CALLE'])?$this->CALLE=$arrayValores['CALLE']:$this->CALLE=null;
		 isset($arrayValores['NUMERO'])?$this->NUMERO=$arrayValores['NUMERO']:$this->NUMERO=null;
	}
}
?>