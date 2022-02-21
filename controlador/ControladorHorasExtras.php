<?php
session_start();
include_once "../funciones/conexion.php";

$id_empleado = $_SESSION['id'];
$otorgado_h =$_POST['otorgado_h'];
$tarea_h = $_POST['tarea_h'];
$desde_h=$_POST['desde_h'];
$hasta_h=$_POST['hasta_h'];
$fecha_program_h=$_POST['fecha_program_h'];
$comenta_h = $_POST['comenta_h'];
$sql="insert into horas_extras (id_empleado, otorgado_h, tarea_h, desde_h, hasta_h, fecha_program_h,comenta_h)  values (?,?,?,?,?,?,?) ";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("issssss",$id_empleado,$otorgado_h,$tarea_h,$desde_h,$hasta_h,$fecha_program_h,$comenta_h);
if($stmt->execute()){
	header("Location: ControladorNotificaciones.php?value=horas_extras");
}else{
	header("Location: ../horasextras.php?error");
}
		
?>