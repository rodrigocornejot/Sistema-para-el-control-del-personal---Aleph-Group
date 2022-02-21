<?php
session_start();
include_once "../funciones/conexion.php";

$nom_ape=$_POST['nom_ape'];
$comenta_t=$_post['comenta_t'];
$estado=$_POST['estado'];
$fecha_salida = $_POST['fecha_salida'];
$hora_salida = $_POST['hora_salida'];
$hora_regreso = $_POST['hora_regreso'];
$sql = "select empleados.nom_ape,departamento.departamento,trabajo_campo.id_trabajo_campo,trabajo_campo.fecha_salida,trabajo_campo.comenta_t,trabajo_campo.estado FROM trabajo_campo 
INNER JOIN empleados on trabajo_campo.id_empleado=empleados.id_empleados 
INNER JOIN departamento ON departamento.id_departamento=empleados.id_dept
INNER JOIN vigilancia on vigilancia.id_empleado=empleados.id_empleados";
$stmt=$conexion->prepare($sql);
if($stmt->execute()){
	header("Location: ControladorNotificaciones.php");
}else{
	header("Location: ../trabajocampo.php?error");
}
		
?>