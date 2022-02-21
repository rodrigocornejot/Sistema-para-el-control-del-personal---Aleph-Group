<?php include_once "templates/header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
	<h1 class="titulo"> AUTORIZACION TRABAJO CAMPO, PERMISOS, SOLICITUD DE HORAS O COMPENSACIONES</h1>
	<h2> Seleccione el tipo de formulario que va realizar:</h2>
	<div class="contenedor"></div>
	<div class="link link-trabajoencampo">
		<a href="trabajocampo.php">AUTORIZACION PARA TRABAJO EN CAMPO</a>
	</div>
	<div class="link link-horasextras">
		<a href="horasextras.php">HORAS EXTRAS</a>
	</div>
	<div class="link link-permisopersonal">
		<a href="permisopersonal.php">PERMISO PERSONAL</a>
	</div>
	<div class="link link-compensacion">
		<a href="compensacionhoras.php">COMPENSACION DE HORAS EXTRAS</a>
	</div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>