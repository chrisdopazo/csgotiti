<?php

	include_once ($_SERVER["DOCUMENT_ROOT"] . 'tic/dao/productoDAO.php');



	$productoid= new producto();

	if($_POST['id']!= '')
	{
		$item = new producto();
		$item = productoDAO::ObtenerPorID($_POST['id']);

		if($item->codigo==$_POST['codigo'])
		{
			$productoid -> id = $_POST['id'];
			$productoid -> codigo = $_POST['codigo'];
			$productoid -> nombre = $_POST['nombre'];
			$productoid -> precio = $_POST['precio'];

			productoDAO::modificar($productoid);
			echo "se modificó su preciado producto, BIEN FLAMA";
		}
		else
		{
			if(productoDAO::validarCodigo($_POST['codigo']))
			{
				echo "El codigo esta repetido";
			}
			else
			{
				$productoid -> id = $_POST['id'];
				$productoid -> codigo = $_POST['codigo'];
				$productoid -> nombre = $_POST['nombre'];
				$productoid -> precio = $_POST['precio'];

				productoDAO::modificar($productoid);
				echo "se modificó su preciado producto, BIEN FLAMA";
			}
		}
	}
	else
	{
		if(productoDAO::validarCodigo($_POST['codigo']))
		{
			echo "El codigo esta repetido";
		}
		else
		{
			$productoid -> id = $_POST['id'];
			$productoid -> codigo = $_POST['codigo'];
			$productoid -> nombre = $_POST['nombre'];
			$productoid -> precio = $_POST['precio'];

			productoDAO::nuevo($productoid);
			echo "se insertó  su preciado producto, BIEN FLAMA";
		}
	}


?>
