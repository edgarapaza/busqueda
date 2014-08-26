<?php
include "header.php";
include "../coreapp/conection.php";

//Obtener el Numero de Escritura
$codigo_escritura = $_REQUEST['codigo_escritura'];

$consult2 = "SELECT cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol, cod_usu, proy_id FROM escrituras1 WHERE cod_sct = $codigo_escritura";
$query2 = $mysqli->query($consult2);
$dato2 = $query2->fetch_array();

$ver=array("Notario"=>$dato2[0],"Escritura"=>$dato2[1],"Distrito"=>$dato2[2],"Fecha"=>$dato2[3],"SubSerie"=>$dato2[4],"NBien"=>$dato2[5],"NumFolios"=>$dato2[6],"Protocolo"=>$dato2[7],"Obs"=>$dato2[8],"Folio"=>$dato2[9],"Usuario"=>$dato2[10],"Proyecto"=>$dato2[11]);

if($ver['Proyecto'] == 0){
  echo "-------------------------Proyecto 0-----------------------------------------------<br/>";
  echo "Notario:".$ver['Notario']."<br>";
  echo "Escritura:".$ver['Escritura']."<br>";
  echo "Distrito:".$ver['Distrito']."<br>";
  echo "Fecha:".$ver['Fecha']."<br>";
  echo "Sub Serie:".$ver['SubSerie']."<br>";
  echo "NOmbre Bien:".$ver['NBien']."<br>";
  echo "Numero Folios:".$ver['NumFolios']."<br>";
  echo "Protocolo:".$ver['Protocolo']."<br>";
  echo "Observaciones:".$ver['Obs']."<br>";
  echo "Folio:".$ver['Folio']."<br>";
  echo "usuario:".$ver['Usuario']."<br>";
  echo "Proyecto:".$ver['Proyecto']."<br>"; 
}
else
{
  echo "-------------------------Proyecto !=  0-----------------------------------------------<br/>";
  $query_proyecto = "SELECT * FROM proyectos";
  $result1 = $mysqli->query($query_proyecto);
  $proyecto = $result1->fetch_array();
  
  echo "Nombre de Proyecto: ".$proyecto['proy_nombre']."<br>";  
  echo "Codigo del Notario: ".$proyecto['not_id']."<br>";  
  echo "Numero de protocolo: ".$proyecto['num_protocolo']."<br>";  
  echo "Folio inicial: ".$proyecto['folio_inicial']."<br>";  
  echo "Folio Final: ".$proyecto['folio_final']."<br>";  
  echo "Escritura inicial".$proyecto['escritura_inicial']."<br>";  
  echo "Escritura final ".$proyecto['escritura_final']."<br>";  
  echo "Observaciones ".$proyecto['observaciones']."<br>";  
  echo "--------------------------------------------------------------------------------<br>";
  echo "Escritura:".$ver['Escritura']."<br>";
  
  echo "Fecha:".$ver['Fecha']."<br>";
  echo "Sub Serie:".$ver['SubSerie']."<br>";
  echo "NOmbre Bien:".$ver['NBien']."<br>";
  echo "Numero Folios:".$ver['NumFolios']."<br>";

  echo "Observaciones:".$ver['Obs']."<br>";
  echo "Folio:".$ver['Folio']."<br>";
  echo "usuario:".$ver['Usuario']."<br>";
  echo "Proyecto:".$ver['Proyecto']."<br>";
}


function convertir_Notario($codigo_notario)
{
  $query_proyecto = "";
  $result1 = $mysqli->query($query_proyecto);
  $proyecto = $result1->fetch_array();
}
?>
<h2 class="sub-header">Lista Detallada</h2>

<?php
include 'footer.php';
?>
