<?php
include "header.php";
include "../coreapp/conection.php";
$codigo = $_GET['codigo'];
//echo "Recibido: ".$codigo;
?>

	<h2 class="sub-header">Zona Otorgantes</h2>
          <div class="table-responsive">
            <table class="table table-striped">
				<thead>
					<tr>
						<th>Num</th>
						<th>Escritura</th>
						<th>Fecha Documento</th>
						<th>Nombre bien</th>
						<th>Cantidad folios</th>
						<th>Opciones</th>
					</tr>
				</thead>
	<tbody>
<?php

if($result_otorgantes = $mysqli->query("select cod_sct from escriotor1 where cod_inv  = $codigo;"))
{
	echo "Numero de Resultados: ".$result_otorgantes->num_rows;
	$i=1;	
	if($result_otorgantes->num_rows > 0)
	{
		while($fila = $result_otorgantes->fetch_array())
		{
            $datosOtorgantes = $mysqli->query("select num_sct,fec_doc,nom_bie,can_fol,cod_pro,obs_sct,num_fol,hra_ing from escrituras1 where cod_sct = $fila[0];");
            $result222 = $datosOtorgantes->fetch_array();
			echo "<tr><td>";
				echo $i;
					echo "</td><td>";
                        echo $result222["num_sct"];
					echo "</td><td>";
						echo $result222["fec_doc"];
					echo "</td><td>";
						//fecha
						echo $result222["nom_bie"];
					echo "</td><td>";
						//Nombre del bien
						echo $result222["can_fol"];
			
			echo "</td><td>";
			echo "<a href='lista_detallada.php?codigo_escritura=". $fila["cod_sct"] ."'>Mostrar + Detalles</a>";
			echo "</td></tr>";
			$i++;
		}
	}
	else {
		echo "<br/>No hay escrituras que mostrar";
	}
	}
	else
	{
	echo $mysqli->error();
}
//mysqli_close();
?>
		</tbody>
	</table>	
</div>

<h2 class="sub-header">Zona Favorecidos</h2>
          <div class="table-responsive">
            <table class="table table-striped">

			<thead>
				<tr>
					<th>Num</th>
					<th>Sub-Serie</th>
					<th>Notario</th>
					<th>Fecha</th>
					<th>Nombre Bien</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
<?php
if($result_favorecidos = $mysqli->query("SELECT * FROM escrifavor1 WHERE cod_inv = $codigo;"))
{
	echo "Numero de Resultados: ".$result_favorecidos->num_rows;
	$i =1;	
	if($result_favorecidos->num_rows > 0)
	{
		while($fila2 = $result_favorecidos->fetch_array())
			{
			echo "<tr><td>";
			echo $i;
				$query3 = "SELECT * FROM escrituras1 WHERE cod_sct = ".$fila2["cod_sct"];
				if($escrituras2 = $mysqli->query($query3))
				{
					if($escrituras2->num_rows > 0)
					{
					$escritura2 = $escrituras2->fetch_array();
					echo "</td><td>";
						$query4 = "SELECT des_sub FROM subseries WHERE cod_sub =".$escritura2[0];
						$exe_query2 = $mysqli->query($query4);
						$subserie2 = $exe_query2->fetch_array();
						echo $subserie2[0];
					echo "</td><td>";
						$querynotario = "SELECT notario, provincia FROM lista_notarios WHERE cod_not = ".$escritura2[1];
						$exe_notario = $mysqli->query($querynotario);
						$notario = $exe_notario->fetch_array(); 
						echo $notario[0];
						
					echo "</td><td>";
					echo $escritura2[4];
					echo "</td><td>";
					echo $escritura2[6];
					}
				}
			echo "</td><td>";
			echo "<a href='mostrardetalles.php?codigo=". $fila["Cod_inv"] ."'>Mostrar Informacion</a>";
			echo "</td></tr>";
			$i++;
			}
		}
	}
else
{
echo $mysqli->error();
}
mysqli_close();
?>
</tbody>
</table>
</section>


<!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


<?php
include "footer.php";
?>