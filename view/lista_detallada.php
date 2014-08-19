<?php
include "header.php";
include "../coreapp/conection.php";

//Obtener el Numero de Escritura
$codigo_escritura = $_REQUEST['codigo_escritura'];

$consult2 = "SELECT cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol, cod_usu, proy_id FROM escrituras1 WHERE cod_sct = $codigo_escritura";
$query2 = $mysqli->query($consult2);
$dato2 = $query2->fetch_array();

$ver=array("Notario"=>$dato2[0],"Escritura"=>$dato2[1],"Distrito"=>$dato2[2],"Fecha"=>$dato2[3],"SubSerie"=>$dato2[4],"NBien"=>$dato2[5],"NumFolios"=>$dato2[6],"Protocolo"=>$dato2[7],"Obs"=>$dato2[8],"Folio"=>$dato2[9],"Usuario"=>$dato2[10],"Proyecto"=>$dato2[11]);

?>
<h2 class="sub-header">Lista Detallada</h2>


<?php
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
?>





<?php
include 'footer.php';
?>