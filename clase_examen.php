<?php
 
        class examen

        {

            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_CURSO=null;
	 public $ID_PROFESOR=null;
	 public $ID_ALUMNO=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['ID'])?$this->ID=$arrayValores['ID']:$this->ID=null;
		 isset($arrayValores['ID_CURSO'])?$this->ID_CURSO=$arrayValores['ID_CURSO']:$this->ID_CURSO=null;
		 isset($arrayValores['ID_PROFESOR'])?$this->ID_PROFESOR=$arrayValores['ID_PROFESOR']:$this->ID_PROFESOR=null;
		 isset($arrayValores['ID_ALUMNO'])?$this->ID_ALUMNO=$arrayValores['ID_ALUMNO']:$this->ID_ALUMNO=null;
	}
}
?>