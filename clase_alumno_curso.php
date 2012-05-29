<?php
 
        class alumno_curso

        {

            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_ALUMNO=null;
	 public $ID_CURSO=null;
	 public $FECHA_ALTA=null;
	 public $FECHA_BAJA=null;
	 public $SUPLENTE=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['ID'])?$this->ID=$arrayValores['ID']:$this->ID=null;
		 isset($arrayValores['ID_ALUMNO'])?$this->ID_ALUMNO=$arrayValores['ID_ALUMNO']:$this->ID_ALUMNO=null;
		 isset($arrayValores['ID_CURSO'])?$this->ID_CURSO=$arrayValores['ID_CURSO']:$this->ID_CURSO=null;
		 isset($arrayValores['FECHA_ALTA'])?$this->FECHA_ALTA=$arrayValores['FECHA_ALTA']:$this->FECHA_ALTA=null;
		 isset($arrayValores['FECHA_BAJA'])?$this->FECHA_BAJA=$arrayValores['FECHA_BAJA']:$this->FECHA_BAJA=null;
		 isset($arrayValores['SUPLENTE'])?$this->SUPLENTE=$arrayValores['SUPLENTE']:$this->SUPLENTE=null;
	}
}
?>