<?php
session_start();
include_once "../funciones/conexion.php";

$id_empleado = $_SESSION['id'];
$otorgado_c = $_POST['otorgado_c'];
$tareas_c = $_POST['tareas_c'];
$fecha_program_c = $_POST['fecha_program_c'];
$comenta_c = $_POST['comenta_c'];
$sql="insert into compensacion_horas (id_empleado,otorgado_c, tareas_c,fecha_program_c, comenta_c)  values (?,?,?,?,?) ";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("issss",$id_empleado,$otorgado_c,$tareas_c,$fecha_program_c,$comenta_c);
if($stmt->execute()){
	header("Location: ControladorNotificaciones.php?value=compensacion_horas");
}else{
	header("Location: ../compensacionhoras.php?error");
}
		
?>