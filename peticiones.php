<?php include_once "templates/header.php" ?>
<?php include_once "funciones/administrador.php" ?>

<nav class="navbar navbar-dark bg-dark">
	<div class="container">
		<a href="index.html" class="navbar-brand">ALEPH GROUP</a>
	</div>
</nav>

<?php
include 'funciones/conexion.php';

$sql="select * FROM trabajo_campo INNER JOIN empleados on trabajo_campo.id_empleado=empleados.id_empleados INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept";
$resultado = $conexion->query($sql);

$sql1="select * FROM horas_extras INNER JOIN empleados on horas_extras.id_empleado=empleados.id_empleados INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept";
$resultado1 = $conexion->query($sql1);

$sql2="select * from permiso_personal INNER JOIN empleados on permiso_personal.id_empleado=empleados.id_empleados INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept";
$resultado2 = $conexion->query($sql2);

$sql3="select * from compensacion_horas INNER JOIN empleados on compensacion_horas.id_empleado=empleados.id_empleados INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept";
$resultado3 = $conexion->query($sql3);

?>

<div class="btn-group btn-group-toggle" data-toggle="buttons">

    <label class="btn btn-secondary active">
        <a type="radio" name="options" id="option1" onclick="mostrarTrabajo();">TRABAJO EN CAMPO</a>
    </label>
    <label class="btn btn-secondary">
        <a type="radio" name="options" id="option2"  onclick="mostrarPermiso();">PERMISO PERSONAL</a>
    </label>
    <label class="btn btn-secondary active">
        <a type="radio" name="options" id="option1"  onclick="mostrarHoras();">HORAS EXTRAS</a>
    </label>
     <label class="btn btn-secondary active">
        <a type="radio" name="options" id="option1"  onclick="mostrarCompensacion();">COMPENSACION HORAS</a>
    </label>
</div>
<div class="container-mt5">
	<table class="table table-light" id="trabajo">
		<thead>
			<tr class="table-dark">
				<th>Empleado</th>
				<th>Departamento</th>
				<th>Salida</th>
				<TH>Servicio</TH>
				<TH>Tarea realizada</TH>
				<th>Retorno</th>
				<th>Comentario</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($filas = $resultado->fetch_assoc()):?>
			<tr>
				<td><?php echo $filas['nom_ape'] ?></td>
				<td><?php echo $filas['departamento']?></td>
				<td><?php echo $filas['fecha_salida'] ?></td>
				<td><?php echo $filas['servicio'] ?></td>
				<td><?php echo $filas['tareas_t'] ?></td>
				<td><?php echo $filas['fecha_retorno'] ?></td>
				<td><?php echo $filas['comenta_t'] ?></td>
				<td class="d-flex">
					<?php if (is_null($filas['estado'])):?>
					<form action="controlador/ControladorPeticiones.php" method="POST" >
						<input type="hidden" name="id" value="<?php echo $filas['id_trabajo_campo'] ?>">
						<input type="hidden" name="tipo" value="aceptar" >
						<input type="hidden" name="peticion" value="trabajo_campo">
						<button type="submit" class="btn btn-success">ACEPTAR</button>
					</form>
					<form action="controlador/ControladorPeticiones.php" method="POST" class="ms-2">
						<input type="hidden" name="tipo" value="eliminar" >
						<input type="hidden" name="id" value="<?php echo $filas['id_trabajo_campo'] ?>">
						<input type="hidden" name="peticion" value="trabajo_campo">
						<button type="submit" class="btn btn-danger">ELIMINAR</button>
					</form>
					<?php else: if ($filas['estado']==1):?>
						<span class="completada">PETICION COMPLETADA</span>
						<?php else: ?>
						<span class="rechazada">PETICION RECHAZADA</span>	
						<?php endif; ?>
					<?php endif;  ?>
				</td>			
			</tr>
		<?php endwhile?>	
		</tbody>
	</table>	

	<table class="table table-light" id="horas">
		<thead>
			<tr class="table-dark">
				<th>Empleado</th>
				<th>Departamento</th>
				<th>Otorgado por</th>
				<th>Tarea realizada</th>
				<th>Desde</th>
				<th>Hasta</th>
				<th>Fecha Programada</th>
				<th>Comentario</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($filas = $resultado1->fetch_assoc()):?>
			<tr>
				<td><?php echo $filas['nom_ape'] ?></td>
				<td><?php echo $filas['departamento']?></td>
				<td><?php echo $filas['otorgado_h']?></td>
				<td><?php echo $filas['tarea_h']?></td>
				<td><?php echo $filas['desde_h'] ?></td>
				<td><?php echo $filas['hasta_h'] ?></td>
				<td><?php echo $filas['fecha_program_h'] ?></td>
				<td><?php echo $filas['comenta_h'] ?></td>
				<td class="d-flex">
					<?php if (is_null($filas['estado'])):?>
					<form action="controlador/ControladorPeticiones.php" method="POST" >
						<input type="hidden" name="id" value="<?php echo $filas['id_horas_extras'] ?>">
						<input type="hidden" name="tipo" value="aceptar" >
						<input type="hidden" name="peticion" value="horas_extras">
						<button type="submit" class="btn btn-success">ACEPTAR</button>
					</form>
					<form action="controlador/ControladorPeticiones.php" method="POST" class="ms-2">
						<input type="hidden" name="tipo" value="eliminar" >
						<input type="hidden" name="id" value="<?php echo $filas['id_horas_extras'] ?>">
						<input type="hidden" name="peticion" value="horas_extras">
						<button type="submit" class="btn btn-danger">RECHAZAR</button>
					</form>
					<?php else: if ($filas['estado']==1):?>
						<span class="completada">PETICION COMPLETADA</span>
						<?php else: ?>
						<span class="rechazada">PETICION RECHAZADA</span>	
						<?php endif; ?>
					<?php endif;  ?>
				</td>
			</tr>		
		<?php endwhile?>	
		</tbody>
	</table>

	<table class="table table-light" id="permiso">
		<thead>
			<tr class="table-dark">
				<th>Empleado</th>
				<th>Departamento</th>
				<th>Otorgado por</th>
				<th>Desde</th>
				<th>Hasta</th>
				<th>Fecha Programada</th>
				<th>Justificacion</th>
				<th>Comentario</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($filas = $resultado2->fetch_assoc()):?>
			<tr>
				<td><?php echo $filas['nom_ape'] ?></td>
				<td><?php echo $filas['departamento']?></td>
				<td><?php echo $filas['otorgado_p']?></td>
				<td><?php echo $filas['desde_p'] ?></td>
				<td><?php echo $filas['hasta_p'] ?></td>
				<td><?php echo $filas['fecha_program_p'] ?></td>
				<td><?php echo $filas['justificacion_p']?></td>
				<td><?php echo $filas['comenta_p'] ?></td>
				<td class="d-flex">
					<?php if (is_null($filas['estado'])):?>
					<form action="controlador/ControladorPeticiones.php" method="POST" >
						<input type="hidden" name="id" value="<?php echo $filas['id_permiso_personal'] ?>">
						<input type="hidden" name="tipo" value="aceptar" >
						<input type="hidden" name="peticion" value="permiso_personal">
						<button type="submit" class="btn btn-success">ACEPTAR</button>
					</form>
					<form action="controlador/ControladorPeticiones.php" method="POST" class="ms-2">
						<input type="hidden" name="tipo" value="eliminar" >
						<input type="hidden" name="id" value="<?php echo $filas['id_permiso_personal'] ?>">
						<input type="hidden" name="peticion" value="permiso_personal">
						<button type="submit" class="btn btn-danger">RECHAZAR</button>
					</form>
					<?php else: if ($filas['estado']==1):?>
						<span class="completada">PETICION COMPLETADA</span>
						<?php else: ?>
						<span class="rechazada">PETICION RECHAZADA</span>	
						<?php endif; ?>
					<?php endif;  ?>
				</td>
			</tr>
			<?php endwhile?>

		<table class="table table-light" id="compensacion">
		<thead>
			<tr class="table-dark">
				<th>Empleado</th>
				<th>Departamento</th>
				<th>Otorgado por</th>
				<th>Desde</th>
				<th>Hasta</th>
				<th>Fecha Programada</th>
				<th>Justificacion</th>
				<th>Comentario</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($filas = $resultado3->fetch_assoc()):?>
			<tr>
				<td><?php echo $filas['nom_ape'] ?></td>
				<td><?php echo $filas['departamento']?></td>
				<td><?php echo $filas['otorgado_c']?></td>
				<td><?php echo $filas['desde_c'] ?></td>
				<td><?php echo $filas['hasta_c'] ?></td>
				<td><?php echo $filas['fecha_program_c'] ?></td>
				<td><?php echo $filas['justificacion_c']?></td>
				<td><?php echo $filas['comenta_c'] ?></td>
				<td class="d-flex">
					<?php if (is_null($filas['estado'])):?>
					<form action="controlador/ControladorPeticiones.php" method="POST" >
						<input type="hidden" name="id" value="<?php echo $filas['id_compensacion_horas'] ?>">
						<input type="hidden" name="tipo" value="aceptar" >
						<input type="hidden" name="peticion" value="compensacion_horas">
						<button type="submit" class="btn btn-success">ACEPTAR</button>
					</form>
					<form action="controlador/ControladorPeticiones.php" method="POST" class="ms-2">
						<input type="hidden" name="tipo" value="eliminar" >
						<input type="hidden" name="id" value="<?php echo $filas['id_compensacion_horas'] ?>">
						<input type="hidden" name="peticion" value="compensacion_horas">
						<button type="submit" class="btn btn-danger">RECHAZAR</button>
					</form>
					<?php else: if ($filas['estado']==1):?>
						<span class="completada">PETICION COMPLETADA</span>
						<?php else: ?>
						<span class="rechazada">PETICION RECHAZADA</span>	
						<?php endif; ?>
					<?php endif;  ?>
				</td>
			</tr>
		<?php endwhile?>	
		</tbody>
	</table>

<style type="text/css">
        #trabajo{
            display: none;
        }
</style>

<style type="text/css">
        #compensacion{
            display: none;
        }
</style>

<style type="text/css">
        #permiso{
            display: none;
        }
</style>
<style type="text/css">
        #horas{
            display: none;
        }
</style>
	<script type="text/javascript">
            function mostrarTrabajo() {
                document.getElementById('trabajo').style.display = 'block';
                document.getElementById('horas').style.display = 'none';
                document.getElementById('permiso').style.display ='none';
                document.getElementById('compensacion').style.display='none';
            }
            function mostrarHoras() {
                document.getElementById('horas').style.display = 'block';
                document.getElementById('trabajo').style.display = 'none';
                document.getElementById('permiso').style.display ='none';
                document.getElementById('compensacion').style.display='none';
            }
             function mostrarPermiso() {
                document.getElementById('permiso').style.display = 'block';
                document.getElementById('horas').style.display = 'none';
                document.getElementById('trabajo').style.display ='none';
                document.getElementById('compensacion').style.display='none';
            }
            function mostrarCompensacion() {
                document.getElementById('compensacion').style.display = 'block';
                document.getElementById('trabajo').style.display = 'none';
                document.getElementById('permiso').style.display ='none';
                document.getElementById('horas').style.display='none';
            }
			mostrarTrabajo();
	</script>
</div>
<?php include_once "templates/footer.php" ?>