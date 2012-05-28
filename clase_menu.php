<?php
 
        class menu

        {

            //Atributos de la tabla de la bd
	 public $id=null;
	 public $id_padre=null;
	 public $enlace=null;
	 public $texto=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
		 isset($arrayValores['id_padre'])?$this->id_padre=$arrayValores['id_padre']:$this->id_padre=null;
		 isset($arrayValores['enlace'])?$this->enlace=$arrayValores['enlace']:$this->enlace=null;
		 isset($arrayValores['texto'])?$this->texto=$arrayValores['texto']:$this->texto=null;
	}
}
?>