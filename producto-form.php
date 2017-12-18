
<html>

	<head>
		<script type="text/javascript" src="jquery-3.2.1.min.js"></script>

		<script>

			function validar()
			{
				var errores = 0;

				var nombre= $("#nombre").val();
				var precio= $("#precio").val();
				var errores = 0;


				if(nombre=='')
				{
					errores++;
				}

				if(precio=='')
				{
					errores++;
				}

				if (errores==0)
				{
					$.ajax({
                    async:true,
                    type: "POST",
                    url: "validacionPROD.php",
                    data:$('#formprincipal').serialize(),
                    beforeSend:function(){
                        alert('Se están procesando los datos...');
                    },
                    success:function(resultado) {

                        alert(resultado);
												if(resultado=="se insertó  su preciado producto, BIEN FLAMA")
												{
													window.location = 'index.php';
												}
												else
												{
													if(resultado=="se modificó su preciado producto, BIEN FLAMA")
													{
														window.location = 'index.php';
													}
													else
													{
														if (resultado=="El codigo esta repetido")
														{
															window.location = 'index.php';
														}
													}
												}
                        return true;
                    },
                    timeout:180000,
                    error:function(){
                        alert('ERROR');
                        return false;
                    }
                });

				}
				else
				{
					alert("error");
				}


			}
		</script>
	</head>

	<body>

	<?php

	include_once ($_SERVER["DOCUMENT_ROOT"] . 'tic/dao/productoDAO.php');

	$productoid = new producto();

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$productoid = productoDAO::ObtenerPorID($id);
	}

	?>

		<header>
		<h1>tic</h1>

		
		</header>

		<main>

		<form action="validacionPROD.php" id="formprincipal" method="post">

			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php echo $productoid->nombre;?>"/>
			<br/>
			<br/>


			<input type="hidden" name="id" id="id" value="<?php echo $productoid->id;?>"/>


			<br/>
			<br/>

			<label for="codigo">Codigo</label>
			<textarea name="codigo" id="codigo"><?php echo $productoid->codigo; ?></textarea>
			<br/>
			<br/>
			
			<label for="precio">Precio</label>
			<input type="text" name="precio" id="precio" value="<?php echo $productoid->precio;?>"/>
			<br/>
			<br/>

			<input type="button" id="btnvalidar" name="btnvalidar" value="Validar" onclick="validar();"/>
		</form>

	</main>

	</body>

</html>
