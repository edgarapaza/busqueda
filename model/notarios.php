<?php
include "../coreapp/conection.php";

class notarios{

	public function convertir_Notario($codigo_notario)
	{
	  	return $codigo_notario;
	}
}

$fra = new notarios();
echo $fra->convertir_Notario(112);
?>