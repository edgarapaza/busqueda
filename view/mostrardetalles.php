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
				if($result = $mysqli->query("SELECT * FROM escriotor1 WHERE cod_inv = $codigo;"))
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