<?php
include_once "../funciones/conexion.php";
session_start();
$peticion="";
$columna_id="";
switch($_POST["peticion"]){
      case "trabajo_campo":
            $peticion="trabajo_campo";
            $columna_id="id_trabajo_campo";
            break;

      case 'horas_extras':
            $peticion="horas_extras";
            $columna_id="id_horas_extras";
            break;

      case 'permiso_personal':
            $peticion="permiso_personal";
            $columna_id="id_permiso_personal";
            break;
      
      case 'compensacion_horas':
            $peticion="compensacion_horas";
            $columna_id="id_compensacion_horas";
            break;

}
switch($_POST["tipo"]){
      case "aceptar":
            $id=$_POST['id'];
            $estado=1;
            $sql = "UPDATE $peticion set estado=? WHERE $columna_id=?";
            echo "$sql";
            $stmt=$conexion->prepare($sql);
            $stmt->bind_param("ii",$estado,$id);
            $stmt->execute();
            header("Location: ../peticiones.php");
            break;     

      case "eliminar":
            $id=$_POST['id'];
            $estado=0;
            $sql = "UPDATE $peticion set estado=? WHERE $columna_id=?";
            $stmt=$conexion->prepare($sql);
            $stmt->bind_param("ii",$estado,$id);
            $stmt->execute();
            header("Location: ../peticiones.php");
            break;       
}