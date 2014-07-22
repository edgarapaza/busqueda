<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Vista de productos</title>
</head>
<body>
	<h1>Listado de productos</h1>
	<?php

		include "../core/conection.php";

		if($result = $mysqli->query("SELECT * FROM productos ORDER BY categoria asc;"))
		{

			if($result->num_rows > 0 )
			{
				echo "<table border='1' cellpadding='10'>";
					echo "
						<tr>
							<th>
								Categoria
							</th>
							<th>
								Nombre
							</th>
							<th>
								Descripcion
							</th>
							<th>
								Precio
							</th>
						</tr>";

					while($row = $result->fetch_array())
					{
						echo "<tr>";
						echo "<td>".  $row["categoria"]  ."</td>";
						echo "<td>".  $row["nombre"]  ."</td>";
						echo "<td>".  $row["descripcion"]  . "</td>";
						echo "<td>".  $row["precio"]   ."</td>";
						echo "</tr>";
					}

				echo "</table>";
			}

		}
		else
		{
			echo "Error: ".$mysqli->error();
		}

		$mysqli->close();
	?>
</body>
</html>