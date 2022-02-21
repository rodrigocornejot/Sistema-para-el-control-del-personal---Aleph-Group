<?php include_once "templates/header.php" ?>
<?php include_once "funciones/administrador.php" ?>


<nav class="navbar navbar-dark bg-dark">
	<div class="container">
		<a href="index.php" class="navbar-brand">ALEPH GROUP</a>
	</div>
</nav>

<?php

include 'funciones/conexion.php';
$sql = "select * from empleados";
$resultado = $conexion->query($sql);
?>
<div class="container mt-5">

	<a href="agregar.php" class="btn btn-success my-2">Nuevo</a>
	<table class="table table-light">
		<thead>
			<tr class="table-dark">
				<th>Id</th>
				<th>Nombre y apellido</th>
				<th>DNI</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($filas = $resultado->fetch_assoc()):?>
				<tr>
					<td><?php echo $filas['id_empleados'] ?></td>
					<td><?php echo $filas['nom_ape'] ?></td>
					<td><?php echo $filas['dni'] ?></td>
					<td class="d-flex">
						<form action="editar.php" method="POST" >
							<input type="hidden" name="id" value="<?php echo $filas['id_empleados'] ?>">
							<input type="hidden" name="tipo" value="actualizar" >
							<button type="submit" class="btn btn-warning">Editar</button>
						</form>
						<form action="controlador/ControladorUsuario.php" method="POST" class="ms-2">
							<input type="hidden" name="tipo" value="eliminar" >
							<input type="hidden" name="id" value="<?php echo $filas['id_empleados'] ?>">
							<button type="submit" class="btn btn-danger">Eliminar</button>
						</form>
					</td>
				</tr>
			<?php endwhile?>
		</tbody>
	</table>
</div>
<?php include_once "templates/footer.php" ?>