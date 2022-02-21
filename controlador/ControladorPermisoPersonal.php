<?php
session_start();
include_once "../funciones/conexion.php";

$id_empleado = $_SESSION['id'];
$otorgado_p =$_POST['otorgado_p'];
$desde_p=$_POST['desde_p'];
$hasta_p=$_POST['hasta_p'];
$fecha_program_p=$_POST['fecha_program_p'];
$justificacion_p=$_POST['justificacion_p'];
$comenta_p = $_POST['comenta_p'];
$sql="insert into permiso_personal (id_empleado, otorgado_p, desde_p, hasta_p, fecha_program_p, justificacion_p, comenta_p)  values (?,?,?,?,?,?,?) ";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("issssss",$id_empleado,$otorgado_p,$desde_p,$hasta_p,$fecha_program_p,$justificacion_p,$comenta_p);
if($stmt->execute()){
	header("Location: ControladorNotificaciones.php?value=permiso_personal");
}else{
	header("Location: ../permisopersonal.php?error");
}
		
?>