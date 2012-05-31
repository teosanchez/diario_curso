<?php
 
        class curso

        {
            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_ESPECIALIDAD=null;
	 public $ID_NIVEL_ESTUDIOS=null;
	 public $HORAS=null;
	 public $FECHA_INICIO=null;
	 public $FECHA_FIN=null;
         public $HORA_INICIO=null;
         public $HORA_FIN=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['ID'])?$this->ID=$arrayValores['ID']:$this->ID=null;
		 isset($arrayValores['ID_ESPECIALIDAD'])?$this->ID_ESPECIALIDAD=$arrayValores['ID_ESPECIALIDAD']:$this->ID_ESPECIALIDAD=null;
		 isset($arrayValores['ID_NIVEL_ESTUDIOS'])?$this->ID_NIVEL_ESTUDIOS=$arrayValores['ID_NIVEL_ESTUDIOS']:$this->ID_NIVEL_ESTUDIOS=null;
		 isset($arrayValores['HORAS'])?$this->HORAS=$arrayValores['HORAS']:$this->HORAS=null;
                 isset($arrayValores['FECHA_INICIO'])?$this->FECHA_INICIO=date("d-m-Y",strtotime($arrayValores['FECHA_INICIO'])):$this->FECHA_INICIO=null;
                 isset($arrayValores['FECHA_FIN'])?$this->FECHA_FIN=date("d-m-Y",strtotime($arrayValores['FECHA_FIN'])):$this->FECHA_FIN=null;
                 isset($arrayValores['HORA_INICIO'])?$this->HORA_INICIO=date("H:i",strtotime($arrayValores['HORA_INICIO'])):$this->HORA_INICIO=null;
                 isset($arrayValores['HORA_FIN'])?$this->HORA_FIN=date("H:i",strtotime($arrayValores['HORA_FIN'])):$this->HORA_FIN=null;
	}
}
?>