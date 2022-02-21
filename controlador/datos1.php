<?php
include_once "../funciones/conexion.php";
		$otorgado_h = $_POST['otorgado_h'];
		$tarea_h = $_POST['tarea_h'];
		$desde_h = $_POST['desde_h'];
		$hasta_h = $_POST['hasta_h'];
		$duracion_h = $_POST['duracion_h'];
		$fecha_program_h = $_POST['fecha_program_h'];
		$duracion_h_c = $_POST['duracion_h_c'];
		$comenta_h = $_POST['comenta_h'];

		$sql="insert into horas_extras (otorgado_h, tarea_h, desde_h, hasta_h, duracion_h, fecha_program_h, duracion_h_c, comenta_h)  values (?,?,?,?,?,?,?,?) ";
		$stmt=$conexion->prepare($sql);
		$stmt->bind_param("ssssssss",$otorgado_h,$tarea_h,$desde_h,$hasta_h,$duracion_h,$fecha_program_h,$duracion_h_c,$comenta_h);
		$stmt->execute();
?>