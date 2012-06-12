<?php
 
        class profesor

        {

            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_DIRECCION=null;
	 public $NOMBRE=null;
	 public $APELLIDOS=null;
	 public $DNI=null;
	 public $TELEFONO=null;
         public $EMAIL=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['ID'])?$this->ID=$arrayValores['ID']:$this->ID=null;
		 isset($arrayValores['ID_DIRECCION'])?$this->ID_DIRECCION=$arrayValores['ID_DIRECCION']:$this->ID_DIRECCION=null;
		 isset($arrayValores['NOMBRE'])?$this->NOMBRE=$arrayValores['NOMBRE']:$this->NOMBRE=null;
		 isset($arrayValores['APELLIDOS'])?$this->APELLIDOS=$arrayValores['APELLIDOS']:$this->APELLIDOS=null;
		 isset($arrayValores['DNI'])?$this->DNI=$arrayValores['DNI']:$this->DNI=null;
		 isset($arrayValores['TELEFONO'])?$this->TELEFONO=$arrayValores['TELEFONO']:$this->TELEFONO=null;
                 isset($arrayValores['EMAIL'])?$this->EMAIL=$arrayValores['EMAIL']:$this->EMAIL=null;
	}
}
?>