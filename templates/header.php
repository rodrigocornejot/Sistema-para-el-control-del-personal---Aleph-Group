<?php require_once 'funciones/sesion.php';
include_once "funciones/conexion.php";?>
<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta charset="utf-8">
	<link href="css/menu.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<title>PERMISOS</title>
</head>

<body>
	<div class="header .bg-white">
		<div class="sliderbar"><a class="btn btn-secondary dropdown-toggle position-relative" onclick="myFunction()" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
		<i class="fas fa-bars"></i></a>
		   <div class="barra" id="barra">
		<h2>Menu </h2>
		<ul>
			<li><a href="index.php">Inicio</a></li>
			<li><a href="vigilancia.php">Vigilancia</a></li>
			<li><a href="resumen.php">Historico</a></li>
			<li><a href="descuentos.php">Resumen de Autorizaciones por mes</a></li>
			<li><a href="crud.php">Registro de empleados</a></li>
		</ul>
		</div>
		<script>
			function myFunction() {
    		var x = document.getElementById('barra');
    		if (x.style.display === 'none') {
        		x.style.display = 'block';
    		} else {
        		x.style.display = 'none';
    		}
			}
		</script>
	</div>
		<div class="container d-flex align-items-center justify-content-between" style="height : 100%">
			<a href="index.php">
				<img src="imagenes/aleph.jpg" width="200">
			</a>
			<div class="text-primary fs-1">
				Bienvenido <?php echo $_SESSION['nom_ape'] ?>
			</div>
			<?php if ($_SESSION['admin']==1): ?>
			<div class="dropdown bg-dark">
				<a class="btn btn-secondary dropdown-toggle position-relative" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="fas fa-bell"></i>
				</a>
				<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
						<?php $sql = "SELECT COUNT(*) as cant FROM notificaciones where visto = 1 HAVING COUNT(visto);";
							$result = $conexion->query($sql);
							$cant = $result->fetch_assoc()['cant'];
							echo $cant;?>
						<span class="visually-hidden">unread messages</span>
					</span>
				<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
					<li><a class="dropdown-item" href="peticiones.php">Peticion</a></li>
				</ul>
			</div>
			<?php endif; ?>
			<form action="controlador/ControladorLogin.php" method="POST" class="d-flex justify-content-end">
				<input type="hidden" name="tipo" value="logout">
				<button type="submit" class="btn btn-danger">Cerrar sesion</button>
			</form>
		</div>
	</div>