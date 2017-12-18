<?php

	include_once ($_SERVER["DOCUMENT_ROOT"] . 'tic/dao/productoDAO.php');

	$id = $_GET['id'];

	productoDAO::eliminar($id);

	header("Location:index.php");
?>
