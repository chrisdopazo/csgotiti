
<html>

	<head>
	</head>

	<body>

	<?php

	include_once ($_SERVER["DOCUMENT_ROOT"] . 'tic/dao/productoDAO.php');

	$arrayProductos = array();

	$arrayProductos = productoDAO::ObtenerTodos();

	?>

		<header>
		<h1> tic</h1>
		</header>

		<main>
		<h2>Listado de productos</h2>

		<table>
		  <tr>
		  
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Acciones</th>
			<th>Acciones</th>
		  </tr>
		  <?php

			foreach($arrayProductos as $item){
			?>
				   <tr>
				        <td><?php echo $item->id;?></td>
						<td><?php echo $item->codigo;?></td>
						<td><?php echo $item->nombre;?></td>
						<td><a href="Producto-Eliminar.php?id= <?php echo $item->id?>">Eliminar</a></td>
						<td><a href="producto-form.php?id=<?php echo $item->id?>">Modificar</a></td>
				   </tr>
				   <?php

			}

			?>
		</table>

		<a href="Producto-Form.php">Agregar nuevo producto</a>

		</main>

	</body>

</html>
