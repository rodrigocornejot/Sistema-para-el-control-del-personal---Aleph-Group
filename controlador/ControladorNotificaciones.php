<?php
session_start();
include_once "../funciones/conexion.php";
$formularios = ["compesacion","horas_extras","permiso_personal","trabajo_campo"];
if(isset($_GET['value'])){
    $id_empleado = $_SESSION['id'];
    $permiso =$_GET['value'];
    $mensaje = "Permiso para trabajo campo";
    $fecha_creada = time();
    $visto = 0;
    
    $sql="INSERT INTO notificaciones(id_empleado,permiso,mensaje,fecha_creada,visto) VALUES(?,?,?,?,?)";
    $stmt=$conexion->prepare($sql);
    $stmt->bind_param("sssss",$id_empleado,$permiso,$mensaje,$fecha_creada,$visto);
    if($stmt->execute()){
        header("Location: ../index.php");
    }else{
        header("Location: ../trabajocampo.php?error");
    }
}



