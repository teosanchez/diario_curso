<?php
 
        class alumno

        {

            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_SITUACION=null;
	 public $ID_NACIONALIDAD=null;
	 public $ID_NIVEL_ESTUDIOS=null;
	 public $ID_DIRECCION=null;
	 public $NOMBRE=null;
	 public $APELLIDOS=null;
	 public $FECHA_NACIMIENTO=null;
	 public $SEXO=null;
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
		 isset($arrayValores['ID_SITUACION'])?$this->ID_SITUACION=$arrayValores['ID_SITUACION']:$this->ID_SITUACION=null;
		 isset($arrayValores['ID_NACIONALIDAD'])?$this->ID_NACIONALIDAD=$arrayValores['ID_NACIONALIDAD']:$this->ID_NACIONALIDAD=null;
		 isset($arrayValores['ID_NIVEL_ESTUDIOS'])?$this->ID_NIVEL_ESTUDIOS=$arrayValores['ID_NIVEL_ESTUDIOS']:$this->ID_NIVEL_ESTUDIOS=null;
		 isset($arrayValores['ID_DIRECCION'])?$this->ID_DIRECCION=$arrayValores['ID_DIRECCION']:$this->ID_DIRECCION=null;
		 isset($arrayValores['NOMBRE'])?$this->NOMBRE=$arrayValores['NOMBRE']:$this->NOMBRE=null;
		 isset($arrayValores['APELLIDOS'])?$this->APELLIDOS=$arrayValores['APELLIDOS']:$this->APELLIDOS=null;
                 


		 isset($arrayValores['FECHA_NACIMIENTO'])?$this->FECHA_NACIMIENTO=date("d-m-Y",strtotime($arrayValores['FECHA_NACIMIENTO'])):$this->FECHA_NACIMIENTO=null;
                 
                 
		 isset($arrayValores['SEXO'])?$this->SEXO=$arrayValores['SEXO']:$this->SEXO=null;
		 isset($arrayValores['DNI'])?$this->DNI=$arrayValores['DNI']:$this->DNI=null;
		 isset($arrayValores['TELEFONO'])?$this->TELEFONO=$arrayValores['TELEFONO']:$this->TELEFONO=null;
		 isset($arrayValores['EMAIL'])?$this->EMAIL=$arrayValores['EMAIL']:$this->EMAIL=null;
	}
}
?>