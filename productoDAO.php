<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . 'tic/model/producto.php');

class productoDAO {

	public static function ObtenerPorID($id)
	{
				$DBH = new PDO("mysql:host=127.0.0.1;dbname=database", "root", "");

				$query = 'SELECT * FROM productos WHERE id = :id';

				$STH = $DBH->prepare($query);
				$STH->setFetchMode(PDO::FETCH_ASSOC);


				$params = array
				(
					":id" => $id
				);

				$STH->execute($params);

				if ($STH->rowCount() > 0)
					{
						  while($row = $STH->fetch())
						  {
								$productoid = new producto();
								$productoid -> id = $id;
								$productoid -> codigo = $row['codigo'];
								$productoid -> nombre = $row['nombre'];
								$productoid -> precio = $row['precio'];

						  }
					}
				return $productoid;
    }


	   public static function ObtenerTodos()
	{
		$cont=0;
		$arrayproductos = array();
		$productoid = new producto();
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=database", "root", "");

		$query = 'SELECT * FROM productos';

		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);


		$STH->execute();
		if ($STH->rowCount() > 0)
		{
			while($row = $STH->fetch())
			{
				$productoid = new producto();
				$productoid -> id = $row['id'];
				$productoid -> codigo = $row['codigo'];
				$productoid -> nombre = $row['nombre'];
				$productoid -> precio = $row['precio'];

				$arrayproductos[$cont] = $productoid;

				$cont++;
			}
		}

		return $arrayproductos;

    }

	 public static function nuevo($productoid)
	{

			$DBH = new PDO("mysql:host=127.0.0.1;dbname=database", "root", "");

			$query = 'INSERT INTO productos (codigo,nombre,precio) values(:codigo,:nombre,:precio)';

			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);

			$params = array(
				":codigo" => $productoid -> codigo,
				":nombre" => $productoid -> nombre ,
				":precio" => $productoid -> precio
			);
			$STH->execute($params);
    }

    public static function modificar($productoid)
	{

			$DBH = new PDO("mysql:host=127.0.0.1;dbname=database", "root", "");

			$query = 'UPDATE productos SET codigo=:codigo, nombre=:nombre, precio=:precio WHERE id = :id';

			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);

			$params = array(
				":id" => $productoid -> id,
				":codigo" => $productoid -> codigo,
				":nombre" => $productoid -> nombre ,
				":precio" => $productoid -> precio
			);

			$STH->execute($params);
    }

	    public static function eliminar($id)
	{
		$id = $_GET['id'];
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=database", "root", "");

		$query = 'DELETE FROM productos WHERE id = :id';

		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);

		$params = array(
			":id" => $id
		);

		$STH->execute($params);
		echo 'Se eliminó el producto';
    }
	public static function validarCodigo($codigo)
		{
			$DBH = new PDO("mysql:host=127.0.0.1;dbname=database", "root", "");

			$query = 'SELECT * FROM productos WHERE codigo = :codigo';

			$params = array
			(
				":codigo" => $codigo
			);

			$STH = $DBH->prepare($query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);

			$STH->execute($params);
			if ($STH->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}

}
}

?>
