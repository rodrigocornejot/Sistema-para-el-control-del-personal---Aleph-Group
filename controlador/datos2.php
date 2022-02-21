<?php
include_once "../funciones/conexion.php";
		$otorgado_p = $_POST['otorgado_p'];
		$desde_p = $_POST['desde_p'];
		$hasta_p = $_POST['hasta_p'];
		$fecha_program_p = $_POST['fecha_program_p'];
		$descuento[] = $_POST['descuento'];
		$justificacion_p = $_POST['justificacion_p'];
		$comenta_p = $_POST['comenta_p'];

		$sql="insert into permiso_personal (otorgado_p, desde_p, hasta_p, fecha_program_p, descuento, justificacion_p, comenta_p)  values (?,?,?,?,?,?,?) ";
		$stmt=$conexion->prepare($sql);
		$stmt->bind_param("ssssbss",$otorgado_p,$desde_p,$hasta_p,$fecha_program_p,$descuento[],
			$justificacion_p,$comenta_p);
		$stmt->execute();
?>
