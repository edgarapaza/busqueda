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
					<th>Sub-Serie</th>
					<th>Nombre Persona</th>
					<th>Nombre Bien</th>
					<th>Fecha</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			<?php

				if($result_otorgantes = $mysqli->query("SELECT * FROM escriotor1 WHERE cod_inv = $codigo;"))
				{
					echo "Numero de Resultados: ".$result_otorgantes->num_rows;
					$i =1;	
					if($result_otorgantes->num_rows > 0)
					{
						while($fila = $result_otorgantes->fetch_array())
						{
						echo "<tr><td>"; 
								echo $i;

							$query1 = "select * from escrituras1 where cod_sct = ".$fila["cod_sct"];
							if($escrituras = $mysqli->query($query1))
								{
								if($escrituras->num_rows > 0)
								{
									$escritura = $escrituras->fetch_array();
						echo "</td><td>";
									$query2 = "select des_sub from subseries WHERE cod_sub =".$escritura[0];
									$exe_query2 = $mysqli->query($query2);
									$subserie1 = $exe_query2->fetch_array();

									echo $subserie1[0];
							
								
						echo "</td><td>";
									echo $escritura[1];
						echo "</td><td>";
									echo $escritura[4];			
						echo "</td><td>";
									echo $escritura[6];			
								}
							}	
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

	<!--     FAVORECIDOS     -->

	<section id="columna2" class="datagrid">
		<caption>Favoritos</caption><br/>
		<table border="1" id="t_favorecidos">
			<thead>
				<tr>
					<th>Num</th>
					<th>Sub-Serie</th>
					<th>Nombre Persona</th>
					<th>Nombre Bien</th>
					<th>Fecha</th>
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

							$query3 = "select * from escrituras1 where cod_sct = ".$fila2["cod_sct"];
							if($escrituras2 = $mysqli->query($query3))
								{
								if($escrituras2->num_rows > 0)
								{
									$escritura2 = $escrituras2->fetch_array();
						echo "</td><td>";
									$query4 = "select des_sub from subseries WHERE cod_sub =".$escritura2[0];
									$exe_query2 = $mysqli->query($query4);
									$subserie2 = $exe_query2->fetch_array();

									echo $subserie2[0];
							
								
						echo "</td><td>";
									echo $escritura2[1];
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
</body>
</html>
<?php
include "footer.php";
?>