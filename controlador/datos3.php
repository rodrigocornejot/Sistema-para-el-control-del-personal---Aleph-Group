<?php
include_once "../funciones/conexion.php";
		$otorgado_h = $_POST['otorgado_c'];
		$tarea_h = $_POST['tarea_c'];
		$desde_h = $_POST['desde_c'];
		$hasta_h = $_POST['hasta_c'];
		$duracion_h = $_POST['duracion_c_h'];
		$fecha_program_h = $_POST['fecha_program_c'];
		$duracion_h_c = $_POST['duracion_c'];
		$comenta_h = $_POST['comenta_c'];

		$sql="insert into horas_extras (otorgado_c, tarea_c, desde_c, hasta_c, duracion_c_h, fecha_program_c, duracion_c, comenta_c)  values (?,?,?,?,?,?,?,?) ";
		$stmt=$conexion->prepare($sql);
		$stmt->bind_param("ssssssss",$otorgado_c,$tarea_c,$desde_c,$hasta_c,$duracion_c_h,$fecha_program_c,$duracion_c,$comenta_c);
		$stmt->execute();
?>