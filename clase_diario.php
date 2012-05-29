<?php
 
        class diario

        {

            //Atributos de la tabla de la bd
	 public $ID=null;
	 public $ID_PROFESOR_CURSO=null;
	 public $FECHA=null;         
	 public $ENTRADA=null;
         public $TITULO=null;
         
	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['ID'])?$this->ID=$arrayValores['ID']:$this->ID=null;
		 isset($arrayValores['ID_PROFESOR_CURSO'])?$this->ID_PROFESOR_CURSO=$arrayValores['ID_PROFESOR_CURSO']:$this->ID_PROFESOR_CURSO=null;
		 isset($arrayValores['FECHA'])?$this->FECHA=$arrayValores['FECHA']:$this->FECHA=null;                 
		 isset($arrayValores['ENTRADA'])?$this->ENTRADA=$arrayValores['ENTRADA']:$this->ENTRADA=null;
                 isset($arrayValores['TITULO'])?$this->TITULO=$arrayValores['TITULO']:$this->TITULO=null;
	}
}
?>