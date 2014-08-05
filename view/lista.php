<?php
include "header.php";
?>
<link rel="stylesheet" type="text/css" href="../css/cuerpo.css">
<h1>Listado de Personas</h1>

	<section class="datagrid">
		<form method="get">
			<input type="text" name="nombre" placeholder="Nombre" />
			<input type="text" name="paterno" placeholder="Apellido Paterno" />
			<input type="text" name="materno" placeholder="Apellido Materno" />
			<button value="Buscar Nombre" type="submit" name="buscar">Buscar</button>
		</form>

		<table border ="1" width="1024">
			<tr>
				<th>Numero</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Operaciones</th>
			</tr>
			<tbody>
			<?php
				include "../coreapp/conection.php";

				@$nombre  = $_GET['nombre'];
				@$paterno = $_GET['paterno'];
				@$materno = $_GET['materno'];

				echo "<span id='nombre'>Nombre Buscado: ".$nombre." ".$paterno." ".$materno."</span><br>";
				function timequery(){
				   static $querytime_begin;
				   list($usec, $sec) = explode(' ',microtime());
				    
				       if(!isset($querytime_begin))
				      {   
				         $querytime_begin= ((float)$usec + (float)$sec);
				      }
				      else
				      {
				         $querytime = (((float)$usec + (float)$sec)) - $querytime_begin;
				         echo sprintf('<br />La consulta tardó %01.5f segundos.- <br />', $querytime);
				      }
				}

				timequery();
			if(isset($_GET['buscar']))
			{
				if($result = $mysqli->query("SELECT Cod_inv, Nom_inv, Pat_inv, Mat_inv FROM involucrados1 WHERE Nom_inv LIKE '%$nombre%' AND Pat_inv LIKE '%$paterno%' AND Mat_inv LIKE '%$materno%';"))
				{
					echo "Numero de Resultados: ".$result->num_rows;
					$i =1;	
					if($result->num_rows > 0)
					{
						while($fila = $result->fetch_array())
						{
						echo "<tr><th>"; 
								echo $i;
						echo "</th><th>";
								echo $fila["Coh_inv"]; 
						echo "</th><th>";
								echo $fila["Nom_inv"]; 
						echo "</th><th>"; 
								echo $fila["Pat_inv"]; 
						echo "</th><th>"; 
								echo $fila["Mat_inv"]; 
						echo "</th><th>"; 
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
				timequery();
			}
				mysqli_close();
				?>
			</tbody>
		</table>
	</section>

</body>
</html>
				
<?php
include "footer.php";
?>