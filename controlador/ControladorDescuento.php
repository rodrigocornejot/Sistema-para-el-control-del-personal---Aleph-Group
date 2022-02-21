<?php
session_start();
include_once "../funciones/conexion.php";

$nom_ape=$_POST['id_empleado'];
$comenta_t=$_post['sueldo'];
$estado=$_POST['fecha_sueldo'];

$sql = "insert into sueldos (id_empleado, sueldo, fecha_sueldo) values(?,?,?)";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("ifd",$id_empleado,$sueldo,$fecha_sueldo);
if($stmt->execute()){
	header("Location: ControladorNotificaciones.php");
}else{
	header("Location: ../descuentos.php?error");
}
		
?>