<?php
session_start();
include_once "../funciones/conexion.php";

$id_empleado = $_SESSION['id'];
$fecha_salida = $_POST['fecha_salida'];
$servicio = $_POST['servicio'];
$tareas_t = $_POST['tareas_t'];
$fecha_retorno = $_POST['fecha_retorno'];
$comenta_t = $_POST['comenta_t'];
$sql="insert into trabajo_campo (id_empleado,fecha_salida, servicio, tareas_t, fecha_retorno, comenta_t, fecha_registro_t)  values (?,?,?,?,?,?,now()) ";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("isssss",$id_empleado,$fecha_salida,$servicio,$tareas_t,$fecha_retorno,$comenta_t);
if($stmt->execute()){
	header("Location: ControladorNotificaciones.php?value=trabajo_campo");
}else{
	header("Location: ../trabajocampo.php?error");
}
		
?>