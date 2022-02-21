<?php include_once "templates/header.php" ?>
<?php include_once "funciones/administrador.php" ?>

<nav class="navbar navbar-dark bg-dark">
	<div class="container">
		<a href="index.php" class="navbar-brand">ALEPH GROUP</a>
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
                <TH>Servicio</TH>
                <th>Hora inicial ESTIMADA</th>
                <th>Hora final ESTIMADA</th>
				<th>Hora inicial REAL</th>
				<th>Hora final REAL</th>
                <th>Diferencia</th>
				<TH>Tarea realizada</TH>
				<th>Comentario</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($filas = $resultado->fetch_assoc()):?>
			<tr>
				<td><?php echo $filas['nom_ape'] ?></td>
                <td><?php echo $filas['servicio'] ?></td>
                <td><?php echo $filas['fecha_salida'];?></td>
                <td><?php echo $filas['fecha_retorno']?></td>
				<td><?php echo $filas['hora_retorno'] ?></td>
				<td><?php echo $filas['hora_salida'] ?></td>
                <td>
                <?php
	            $Hora1=$filas['hora_retorno'];
	            $Hora2=$filas['hora_salida'];	
                // Esta hora la  establecí fija: debe variarse según el index!!!
	            $Hora1_Ok = new DateTime($Hora1);	
                // ---------CONVERSIÓN DE LAS HORAS EN OBJETOS PARA PODERLAS RESTAR!!!
	            $Hora2_Ok = new DateTime($Hora2);	
                // ---------CONVERSIÓN DE LAS HORAS EN OBJETOS PARA PODERLAS RESTAR!!!
		        $intervalo = $Hora1_Ok->diff($Hora2_Ok);	
                // ---------OPERACIÓN DE RESTA DE LAS HORAS!!!
                // ---------DUMP INDISPENSABLE PARA PODER IMPRIMIR LOS VALORES!!!
	            echo "El intervalo de TIEMPO entre HORAS es: ".$intervalo->format('%H:%i')." Horas/minutos..."."<br />";
                ?>
                </td>
				<td><?php echo $filas['tareas_t'] ?></td>
				<td><?php echo $filas['comenta_t'] ?></td>		
			</tr>
		<?php endwhile?>	
		</tbody>
	</table>	

	<table class="table table-light" id="horas">
		<thead>
			<tr class="table-dark">
				<th>Empleado</th>
				<th>Otorgado por</th>
				<TH>Tarea realizada</TH>				
                <th>Fecha Programada</th>
				<th>Hora Inicial ESTIMADA</th>
				<th>Hora Final ESTIMADA</th>
				<TH>Hora Inicial REAL</TH>
				<TH>Hora Final REAL</TH>
                <th>Diferencia</th>
				<th>Comentario</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($filas = $resultado1->fetch_assoc()):?>
			<tr>
				<td><?php echo $filas['nom_ape'] ?></td>
				<td><?php echo $filas['otorgado_h']?></td>
				<td><?php echo $filas['tarea_h']?></td>				
                <td><?php echo $filas['fecha_program_h'] ?></td>
                <td><?php echo $filas['desde_h'] ?></td>
				<td><?php echo $filas['hasta_h'] ?></td>
                <td><?php echo $filas['hora_retorno_h']?>;</td>
                <td><?php echo $filas['hora_salida_h']?></td>
				
                <td>
                <?php
	            $Hora1=$filas['hora_salida_h'];
	            $Hora2=$filas['hora_retorno_h'];	
                // Esta hora la  establecí fija: debe variarse según el index!!!
	            $Hora1_Ok = new DateTime($Hora1);	
                // ---------CONVERSIÓN DE LAS HORAS EN OBJETOS PARA PODERLAS RESTAR!!!
	            $Hora2_Ok = new DateTime($Hora2);	
                // ---------CONVERSIÓN DE LAS HORAS EN OBJETOS PARA PODERLAS RESTAR!!!
		        $intervalo = $Hora1_Ok->diff($Hora2_Ok);	
                // ---------OPERACIÓN DE RESTA DE LAS HORAS!!!
                // ---------DUMP INDISPENSABLE PARA PODER IMPRIMIR LOS VALORES!!!
	            echo "El intervalo de TIEMPO entre HORAS es: ".$intervalo->format('%H:%i')." Horas/minutos..."."<br />";
                ?>
                </td>
				<td><?php echo $filas['comenta_h'] ?></td>
			</tr>		
		<?php endwhile?>	
		</tbody>
	</table>

	<table class="table table-light" id="permiso">
		<thead>
			<tr class="table-dark">
				<th>Empleado</th>
				<th>Otorgado por</th>				
                <th>Fecha Programada</th>
                <TH>Hora Inicial ESTIMADA</TH>
                <th>Hora Final ESTIMADA</th>
				<th>Hora Inicial REAL</th>
				<th>Hora Final REAL</th>
                <th>Diferencia</th>
				<th>Justificacion</th>
				<th>Comentario</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($filas = $resultado2->fetch_assoc()):?>
			<tr>
				<td><?php echo $filas['nom_ape'] ?></td>
				<td><?php echo $filas['otorgado_p']?></td>
                <td><?php echo $filas['fecha_program_p'] ?></td>
				<td><?php echo $filas['desde_p'] ?></td>
				<td><?php echo $filas['hasta_p'] ?></td>
				<td><?php echo $filas['hora_salida_p'];?></td>
				<td><?php echo $filas['hora_retorno_p'];?></td>
                <td>
                <?php
	            $Hora1=$filas['hora_salida_p'];
	            $Hora2=$filas['hora_retorno_p'];	
                // Esta hora la  establecí fija: debe variarse según el index!!!
	            $Hora1_Ok = new DateTime($Hora1);	
                // ---------CONVERSIÓN DE LAS HORAS EN OBJETOS PARA PODERLAS RESTAR!!!
	            $Hora2_Ok = new DateTime($Hora2);	
                // ---------CONVERSIÓN DE LAS HORAS EN OBJETOS PARA PODERLAS RESTAR!!!
		        $intervalo = $Hora1_Ok->diff($Hora2_Ok);	
                // ---------OPERACIÓN DE RESTA DE LAS HORAS!!!
                // ---------DUMP INDISPENSABLE PARA PODER IMPRIMIR LOS VALORES!!!
	            echo "El intervalo de TIEMPO entre HORAS es: ".$intervalo->format('%H:%i')." Horas/minutos..."."<br />";
                ?>
                </td>
				<td><?php echo $filas['justificacion_p']?></td>
				<td><?php echo $filas['comenta_p'] ?></td>
			</tr>
			<?php endwhile?>

		<table class="table table-light" id="compensacion">
		<thead>
			<tr class="table-dark">
				<th>Empleado</th>
				<th>Tipo de Compensacion</th>
				<th>Otorgado por</th>
                <th>Fecha Programada</th>
				<th>Hora Inicial ESTIMADA</th>
				<th>Hora Final ESTIMADA</th>
				<TH>Hora Inicial REAL</TH>
				<th>Hora Final REAL</th>
                <th>Diferencia</th>
                <th>Justificacion</th>
				<th>Comentario</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($filas = $resultado3->fetch_assoc()):?>
			<tr>
				<td><?php echo $filas['nom_ape'] ?></td>
                <td><?php echo $filas['tipo_compensacion'] ?></td>
        		<td><?php echo $filas['otorgado_c']?></td>		
                <td><?php echo $filas['fecha_program_c'] ?></td>
				<td><?php echo $filas['desde_c'] ?></td>
				<td><?php echo $filas['hasta_c'] ?></td>
				<TD><?PHP echo $filas['hora_salida_c']?></TD>
				<td><?php echo $filas['hora_retorno_c']?></td>
                <td>
                <?php
	            $Hora1=$filas['hora_salida_c'];
	            $Hora2=$filas['hora_retorno_c'];	
                // Esta hora la  establecí fija: debe variarse según el index!!!
	            $Hora1_Ok = new DateTime($Hora1);	
                // ---------CONVERSIÓN DE LAS HORAS EN OBJETOS PARA PODERLAS RESTAR!!!
	            $Hora2_Ok = new DateTime($Hora2);	
                // ---------CONVERSIÓN DE LAS HORAS EN OBJETOS PARA PODERLAS RESTAR!!!
		        $intervalo = $Hora1_Ok->diff($Hora2_Ok);	
                // ---------OPERACIÓN DE RESTA DE LAS HORAS!!!
                // ---------DUMP INDISPENSABLE PARA PODER IMPRIMIR LOS VALORES!!!
	            echo "El intervalo de TIEMPO entre HORAS es: ".$intervalo->format('%H:%i')." Horas/minutos..."."<br />";
                ?>
                </td>
                <td><?php echo $filas['justificacion_c'] ?></td>
				<td><?php echo $filas['comenta_c'] ?></td>
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