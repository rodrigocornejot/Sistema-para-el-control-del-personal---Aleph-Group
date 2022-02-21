<?php include_once "templates/header.php" ?>
<?php include_once "funciones/administrador.php" ?>

<?php
include 'funciones/conexion.php';

/*$sql="select * FROM trabajo_campo 
INNER JOIN empleados on trabajo_campo.id_empleado=empleados.id_empleados 
INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept 
INNER JOIN vigilancia on vigilancia.id_empleado=empleados.id_empleados";*/
// select empleados.nom_ape,departamento.departamento,trabajo_campo.id_trabajo_campo,trabajo_campo.fecha_salida,trabajo_campo.comenta_t,trabajo_campo.estado,vigilancia.hora_salida,vigilancia.hora_regreso FROM trabajo_campo INNER JOIN empleados on trabajo_campo.id_empleado=empleados.id_empleados INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept INNER JOIN vigilancia on empleados.id_empleados=vigilancia.id_empleado;

$sql = "select empleados.nom_ape,departamento.departamento,trabajo_campo.id_trabajo_campo,trabajo_campo.fecha_salida,trabajo_campo.comenta_t,trabajo_campo.estado,trabajo_campo.hora_salida,trabajo_campo.hora_retorno FROM trabajo_campo 
INNER JOIN empleados on trabajo_campo.id_empleado=empleados.id_empleados 
INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept";

$resultado = $conexion->query($sql);

$sql1 = "select empleados.nom_ape,departamento.departamento,horas_extras.id_horas_extras,horas_extras.tarea_h,horas_extras.otorgado_h,horas_extras.desde_h,horas_extras.comenta_h,horas_extras.estado,horas_extras.hasta_h,horas_extras.hora_retorno_h,horas_extras.hora_salida_h FROM horas_extras 
INNER JOIN empleados on horas_extras.id_empleado=empleados.id_empleados 
INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept";

$resultado1 = $conexion->query($sql1);

$sql2 = "select empleados.nom_ape,departamento.departamento,permiso_personal.id_permiso_personal,permiso_personal.otorgado_p,permiso_personal.desde_p,permiso_personal.hasta_p,permiso_personal.comenta_p,permiso_personal.estado,permiso_personal.hora_salida_p,permiso_personal.hora_retorno_p,permiso_personal.justificacion_p FROM permiso_personal 
INNER JOIN empleados on permiso_personal.id_empleado=empleados.id_empleados 
INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept";

$resultado2 = $conexion->query($sql2);

$sql3 = "select empleados.nom_ape,departamento.departamento,compensacion_horas.id_compensacion_horas,compensacion_horas.desde_c,compensacion_horas.hasta_c,compensacion_horas.otorgado_c,compensacion_horas.comenta_c,compensacion_horas.estado,compensacion_horas.hora_salida_c,compensacion_horas.hora_retorno_c FROM compensacion_horas 
INNER JOIN empleados on compensacion_horas.id_empleado=empleados.id_empleados 
INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept";

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
<div class="navCard">
    <div class="container">
        <h5>Panel de estados Vigilante | Hoy</h5>
    </div>

<div class="navCard">
    <div class="container">
        <table class="table table-dark table-striped" id="trabajo">
            <thead>
            <tr>
                <th scope="col">Empleados</th>
                <th scope="col">Departamento</th>
                <th scope="col">Descrip.</th>
                <th scope="col">Estado</th>
                <th scope="col">Hora inicial permitida</th>
                <th scope="col">Marcado Inicial</th>
                <th scope="col">Marcado Final</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
		<tbody>
			<?php while ($filas = $resultado->fetch_assoc()):?>
				<tr>
					<td><?php echo $filas['nom_ape'] ?></td>
                    <td><?php echo $filas['departamento']?></td>
                    <td><?php echo $filas['comenta_t'] ?></td>
                    <td><?php echo $filas['estado'] ?></td>
                    <td><?php echo $filas['fecha_salida'] ?></td>
                    <td><?php echo $filas['hora_salida'] ?></td>
                    <td><?php echo $filas['hora_retorno'] ?></td>
                    <td class="d-flex">
                    <?php
                    date_default_timezone_set('America/Lima');
                    $time=date("H:i");
                    ?>
                    <form action="controlador/marcarhora.php" method="post" accept-charset="utf-8">
                        <input type="hidden" name="tcampo" value="salida">
                        <input type="hidden" name="salida">
                        <input type="hidden" name="id_trabajo_campo" value="<?php echo $filas['id_trabajo_campo'] ?>">
                        <label>Hora de salida: <br><input type="datetime" name="hora_salida" value="<?= $time?>"></label><br>
                        <br>
                        <input type="submit" value="MARCAR">
                    </form>
                    <form action="controlador/marcarhora.php" method="post" accept-charset="utf-8">
                        <input type="hidden" name="tcampo" value="retorno">
                        <input type="hidden" name="retorno">
                        <input type="hidden" name="id_trabajo_campo" value="<?php echo $filas['id_trabajo_campo'] ?>">
                        <label>Hora de regreso: <br><input type="datetime" name="hora_retorno" value="<?= $time?>"></label><br>
                        <br>
                        <input type="submit" value="MARCADOR">
                    </form>
                    
                    </td>
				</tr>
			<?php endwhile?>
		</tbody>
	</table>
</div>

<div class="navCard">
    <div class="container">
        <table class="table table-dark table-striped" id="permiso">
            <thead>
            <tr>
                <th scope="col">Empleados</th>
                <th scope="col">Departamento</th>
                <th scope="col">Otorgado por</th>
                <th scope="col">Descrip.</th>
                <th scope="col">Estado</th>
                <th scope="col">Hora inicial permitida</th>
                <th scope="col">Hora de salida permitida</th>
                <th scope="col">Marcado Inicial</th>
                <th scope="col">Marcado Final</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
		<tbody>
			<?php while ($filas = $resultado2->fetch_assoc()):?>
				<tr>
					<td><?php echo $filas['nom_ape'] ?></td>
                    <td><?php echo $filas['departamento']?></td>
                    <td><?php echo $filas['otorgado_p']?></td>
                    <td><?php echo $filas['comenta_p'] ?></td>
                    <td><?php echo $filas['estado'] ?></td>
                    <td><?php echo $filas['desde_p'] ?></td>
                    <td><?php echo $filas['hasta_p']?></td>
                    <td><?php echo $filas['hora_salida_p'] ?></td>
                    <td><?php echo $filas['hora_retorno_p'] ?></td>
                    <td class="d-flex">
                    <?php
                    date_default_timezone_set('America/Lima');
                    $time=date("H:i");
                    ?>
                    <form action="controlador/marcarhora.php" method="post" accept-charset="utf-8">
                        <input type="hidden" name="tcampo" value="salida_p">
                        <input type="hidden" name="salida_p">
                        <input type="hidden" name="id_permiso_personal" value="<?php echo $filas['id_permiso_personal'] ?>">
                        <label>Hora de salida: <br><input type="datetime" name="hora_salida_p" value="<?= $time?>"></label><br>
                        <br>
                        <input type="submit" value="MARCAR">
                    </form>
                    <form action="controlador/marcarhora.php" method="post" accept-charset="utf-8">
                        <input type="hidden" name="tcampo" value="retorno_p">
                        <input type="hidden" name="retorno_p">
                        <input type="hidden" name="id_permiso_personal" value="<?php echo $filas['id_permiso_personal'] ?>">
                        <label>Hora de regreso: <br><input type="datetime" name="hora_retorno_p" value="<?= $time?>"></label><br>
                        <br>
                        <input type="submit" value="MARCADOR">
                    </form>
                    
                    </td>
				</tr>
			<?php endwhile?>
		</tbody>
	</table>

<div class="navCard">
    <div class="container">
        <table class="table table-dark table-striped" id="horas">
            <thead>
            <tr>
                <th scope="col">Empleados</th>
                <th scope="col">Departamento</th>
                <th scope="col">Otorgado por</th>
                <th scope="col">Descrip.</th>
                <th scope="col">Estado</th>
                <th scope="col">Hora inicial permitida</th>
                <th scope="col">Marcado Inicial</th>
                <th scope="col">Marcado Final</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
		<tbody>
			<?php while ($filas = $resultado1->fetch_assoc()):?>
				<tr>
					<td><?php echo $filas['nom_ape'] ?></td>
                    <td><?php echo $filas['departamento']?></td>
                    <td><?php echo $filas['otorgado_h']?></td>
                    <td><?php echo $filas['comenta_h'] ?></td>
                    <td><?php echo $filas['estado'] ?></td>
                    <td><?php echo $filas['desde_h'] ?></td>
                    <td><?php echo $filas['hora_salida_h'] ?></td>
                    <td><?php echo $filas['hora_retorno_h'] ?></td>
                    <td class="d-flex">
                    <?php
                    date_default_timezone_set('America/Lima');
                    $time=date("H:i");
                    ?>
                    <form action="controlador/marcarhora.php" method="post" accept-charset="utf-8">
                        <input type="hidden" name="tcampo" value="salida_h">
                        <input type="hidden" name="salida_h">
                        <input type="hidden" name="id_horas_extras" value="<?php echo $filas['id_horas_extras'] ?>">
                        <label>Hora de salida: <br><input type="datetime" name="hora_salida_h" value="<?= $time?>"></label><br>
                        <br>
                        <input type="submit" value="MARCAR">
                    </form>
                    <form action="controlador/marcarhora.php" method="post" accept-charset="utf-8">
                        <input type="hidden" name="tcampo" value="retorno_h">
                        <input type="hidden" name="retorno_h">
                        <input type="hidden" name="id_horas_extras" value="<?php echo $filas['id_horas_extras'] ?>">
                        <label>Hora de regreso: <br><input type="datetime" name="hora_retorno_h" value="<?= $time?>"></label><br>
                        <br>
                        <input type="submit" value="MARCADOR">
                    </form>
                    
                    </td>
				</tr>
			<?php endwhile?>
		</tbody>
	</table>

<div class="navCard">
    <div class="container">
        <table class="table table-dark table-striped" id="compensacion">
            <thead>
            <tr>
                <th scope="col">Empleados</th>
                <th scope="col">Departamento</th>
                <th scope="col">Otorgado por</th>
                <th scope="col">Descrip.</th>
                <th scope="col">Estado</th>
                <th scope="col">Hora inicial permitida</th>
                <th scope="col">Marcado Inicial</th>
                <th scope="col">Marcado Final</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
		<tbody>
			<?php while ($filas = $resultado3->fetch_assoc()):?>
				<tr>
					<td><?php echo $filas['nom_ape'] ?></td>
                    <td><?php echo $filas['departamento']?></td>
                    <td><?php echo $filas['otorgado_c']?></td>
                    <td><?php echo $filas['comenta_c'] ?></td>
                    <td><?php echo $filas['estado'] ?></td>
                    <td><?php echo $filas['desde_c'] ?></td>
                    <td><?php echo $filas['hora_salida_c'] ?></td>
                    <td><?php echo $filas['hora_retorno_c'] ?></td>
                    <td class="d-flex">
                    <?php
                    date_default_timezone_set('America/Lima');
                    $time=date("H:i");
                    ?>
                    <form action="controlador/marcarhora.php" method="post" accept-charset="utf-8">
                        <input type="hidden" name="tcampo" value="salida_c">
                        <input type="hidden" name="salida_c">
                        <input type="hidden" name="id_compensacion_horas" value="<?php echo $filas['id_compensacion_horas'] ?>">
                        <label>Hora de salida: <br><input type="datetime" name="hora_salida_c" value="<?= $time?>"></label><br>
                        <br>
                        <input type="submit" value="MARCAR">
                    </form>
                    <form action="controlador/marcarhora.php" method="post" accept-charset="utf-8">
                        <input type="hidden" name="tcampo" value="retorno_c">
                        <input type="hidden" name="retorno_c">
                        <input type="hidden" name="id_compensacion_horas" value="<?php echo $filas['id_compensacion_horas'] ?>">
                        <label>Hora de regreso: <br><input type="datetime" name="hora_retorno_c" value="<?= $time?>"></label><br>
                        <br>
                        <input type="submit" value="MARCADOR">
                    </form>
                    
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