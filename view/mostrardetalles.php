<?php

include "header.php";
include "../coreapp/conection.php";

$codigo = $_GET['codigo'];

echo "Recibido: ".$codigo;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mostrar Detalles</title>
	<link rel="stylesheet" type="text/css" href="../css/detalles.css">
</head>
<body>
	<header>
		<h1></h1>
	</header>
	<br/>
	<section id="columna1" class="datagrid">
		<caption>Otorgantes</caption><br/>
		<table border="1" id="t_otorgantes">
			<thead>
				<tr>
					<th>Num</th>
					<th>Escrituras</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
				if($result_otorgante = $mysqli->query("SELECT * FROM escriotor1 WHERE cod_inv = $codigo;"))
				{
					echo "Numero de Resultados: ".$result_otorgante->num_rows;
					$i =1;	
					if($result_otorgante->num_rows > 0)
					{
						while($fila_otorgantes = $result_otorgante->fetch_array())
						{
						echo "<tr><td>"; 
								echo $i;
						echo "</td><td>";
							//Buscar los registros de la escritura a mostrar
							$sql_otorgante = "SELECT cod_sct, cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol FROM escrituras1 WHERE cod_sct =".$fila_otorgantes["cod_sct"]."";
							if($result1 = $mysqli->query($sql_otorgante))
							{
								if($result1->num_rows > 0)
								{
									$datos_escritura1 = $result1->fetch_array();

									//Buscar el nombre de la sub serie
									$sql_subserie1 = "call convertir_subseries(".$datos_escritura1["cod_sub"].");";
									$sub1 = $mysqli->query($sql_subserie1);
									$subserie1 = $sub1->fetch_array();
									echo $subserie1["des_sub"];
									echo "<br/>";
									echo $datos_escritura1["fec_doc"];
									echo "<br/>";
								}	
							}
								echo $fila_otorgantes["cod_sct"]; 
						echo "</td><td>"; 
								echo "<a href='mostrardetalles.php?codigo=". $fila_otorgantes["Cod_inv"] ."'>Mostrar Informacion</a>";
						echo "</td></tr>";

						$i++;
						}
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
	</section>

	<section id="columna2" class="datagrid">
		<caption>Favoritos</caption><br/>
		<table border="1" id="t_favorecidos">
			<thead>
				<tr>
					<th>Num</th>
					<th>Escrituras</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
				if($result = $mysqli->query("SELECT * FROM escrifavor1 WHERE cod_inv = $codigo;"))
				{
					echo "Numero de Resultados: ".$result->num_rows;
					$i =1;	
					if($result->num_rows > 0)
					{
						while($fila = $result->fetch_array())
						{
						echo "<tr><td>"; 
								echo $i;
						echo "</td><td>";
							//Buscar los registros de la escritura a mostrar
							$sql_favorecido = "SELECT cod_sct, cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol FROM escrituras1 WHERE cod_sct =".$fila["cod_sct"]."";
							if($result = $mysqli->query($sql_favorecido))
							{
								if($result->num_rows > 0)
								{
									$datos_escritura = $result->fetch_array();
									//Buscar el nombre de la sub serie
									$sql_subserie = "call convertir_subseries(".$datos_escritura["cod_sub"].");";
									$sub = $mysqli->query($sql_subserie);
									$subserie = $sub->fetch_array();
									echo $subserie["des_sub"];
							
									echo "<br/>";
									echo $datos_escritura["fec_doc"];
									echo "<br/>";
								}	
							}
							echo $fila["cod_sct"]; 
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
</body>
</html>
<?php
include "footer.php";
?>