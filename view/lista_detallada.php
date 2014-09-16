<?php
include "header.php";
include "../coreapp/conection.php";

//Obtener el Numero de Escritura
$codigo_escritura = $_REQUEST['codigo_escritura'];

/*Verifica si se ha ingresado con Proyecto - Inicio del Poryecto de Julio 2014*/
$consult2 = "SELECT proy_id FROM escrituras1 WHERE cod_sct = $codigo_escritura;";
$query2   = $mysqli->query($consult2);
$dato2    = $query2->fetch_array();
/*Si es distinto de 0 es que Se realizó con un Proyecto, en caso contrario es de la forma anterior de ingreso*/
if($dato2 != 0){
  /*
    Consultas en general para obtener los datos en base a las tablas relacionadas
  */
  $detalle_con_proyecto = "SELECT cod_not,cod_sub,cod_usu,proy_id,num_sct,fec_doc,nom_bie,can_fol,cod_pro,obs_sct,num_fol,hra_ing FROM escrituras1 WHERE cod_sct = $codigo_escritura;";
  $queryDetalle    = $mysqli->query($detalle_con_proyecto);
  $exeDetalle    = $queryDetalle->fetch_array();

  $proyecto   = "SELECT num_protocolo FROM proyectos WHERE proy_id = $exeDetalle[3];";
  $notario    = "SELECT concat(nom_not,' ',pat_not,' ',mat_not) AS notario, provincia FROM notarios WHERE cod_not = (SELECT not_id FROM proyectos WHERE proy_id = $exeDetalle[3]);";
  $trabajador = "SELECT concat(nom_usu,' ',pat_usu,' ',mat_usu) AS trabajador FROM usuarios WHERE cod_usu = (SELECT cod_usu FROM escrituras1 WHERE cod_usu = $exeDetalle[2] limit 0,1);";
  $subserie   = "SELECT des_sub FROM subseries WHERE cod_sub = (SELECT cod_sub FROM escrituras WHERE cod_sub = $exeDetalle[1] limit 0,1);";

  
  $queryProyecto   = $mysqli->query($proyecto);
  $queryNotario    = $mysqli->query($notario);
  $queryTrabajador = $mysqli->query($trabajador);
  $querySubserie   = $mysqli->query($subserie);

  
  $exeProyeto    = $queryProyecto->fetch_array();
  $exeNotario    = $queryNotario->fetch_array();
  $exeTrabajador = $queryTrabajador->fetch_array();
  $exeSubSerie   = $querySubserie->fetch_array();
  /*  FIN DE LAS CONSULTAS*/

  /* MOSTRAR LOS RESULTADOS DE LAS CONSULTAS */

  echo "-------------------------Proyecto con PROYECTO-----------------------------------------------<br/>";
  echo "Notario:".$exeNotario["notario"]."<br>";
  echo "Escritura:".$exeDetalle["num_sct"]."<br>";
  echo "Distrito:".$exeNotario["provincia"]."<br>";
  echo "Fecha:".$exeDetalle["fec_doc"]."<br>";
  echo "Sub Serie:".$exeSubSerie["des_sub"]."<br>";
  echo "NOmbre Bien:".$exeDetalle["nom_bie"]."<br>";
  echo "Protocolo:".$exeDetalle["cod_pro"]."<br>";
  echo "Folio:".$exeDetalle["num_fol"]."<br>";
  echo "Numero Folios:".$exeDetalle["can_fol"]."<br>";
  echo "Observaciones:".$exeDetalle["obs_sct"]."<br>";
  echo "usuario:".$exeTrabajador["trabajador"]."<br>";
  echo "Proyecto:".$exeDetalle["proy_id"]."<br>"; 
  echo "Listado de Otorgantes";
  echo "Listado de Favorecidos";
}
else
{
  $detalle_sin_proyecto = "SELECT cod_not,cod_dst,cod_sub,cod_usu,proy_id,num_sct,fec_doc,nom_bie,can_fol,cod_pro,obs_sct,num_fol,hra_ing FROM escrituras1 WHERE cod_sct = $codigo_escritura;";
  echo "-------------------------Proyecto SIN PROYECTO-----------------------------------------------<br/>";
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
?>
<?php
include 'footer.php';
?>
