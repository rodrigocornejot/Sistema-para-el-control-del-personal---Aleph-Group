<?php
session_start();
include_once "../funciones/conexion.php";

switch ($_POST["tcampo"]){
        case "salida":
        $id_trabajo_campo=$_POST['id_trabajo_campo'];
        $hora_salida=$_POST['hora_salida'];
        $sql="UPDATE trabajo_campo set hora_salida=? WHERE id_trabajo_campo=?";
        $stmt=$conexion->prepare($sql);
        $stmt->bind_param("si",$hora_salida,$id_trabajo_campo);
        $stmt->execute();
        header("Location: ../vigilancia.php");
        break;
        
        case "retorno":
        $id_trabajo_campo=$_POST['id_trabajo_campo'];
        $hora_retorno=$_POST['hora_retorno'];    
        $sql="UPDATE trabajo_campo set hora_retorno=? WHERE id_trabajo_campo=?";
        $stmt=$conexion->prepare($sql);
        $stmt->bind_param("si",$hora_retorno,$id_trabajo_campo);
        $stmt->execute();
        header("Location: ../vigilancia.php");            
        break;

        case "salida_h":
                $id_horas_extras=$_POST['id_horas_extras'];
                $hora_salida_h=$_POST['hora_salida_h'];
                $sql1="UPDATE horas_extras set hora_salida_h=? WHERE id_horas_extras=?";
                $stmt=$conexion->prepare($sql1);
                $stmt->bind_param("si",$hora_salida_h,$id_horas_extras);
                $stmt->execute();
                header("Location: ../vigilancia.php");
                break;
         case "retorno_h":
                $id_horas_extras=$_POST['id_horas_extras'];
                $hora_retorno_h=$_POST['hora_retorno_h'];    
                $sql1="UPDATE horas_extras set hora_retorno_h=? WHERE id_horas_extras=?";                        
                $stmt=$conexion->prepare($sql1);
                $stmt->bind_param("si",$hora_retorno_h,$id_horas_extras);
                $stmt->execute();
                header("Location: ../vigilancia.php");            
                break;
        
        case "salida_p":
                $id_permiso_personal=$_POST['id_permiso_personal'];
                $hora_salida_p=$_POST['hora_salida_p'];
                $sql2="UPDATE permiso_personal set hora_salida_p=? WHERE id_permiso_personal=?";
                $stmt=$conexion->prepare($sql2);
                $stmt->bind_param("si",$hora_salida_p,$id_permiso_personal);
                $stmt->execute();
                header("Location: ../vigilancia.php");
                break;

        case "retorno_p":
                $id_permiso_personal=$_POST['id_permiso_personal'];
                $hora_retorno_p=$_POST['hora_retorno_p'];    
                $sql2="UPDATE permiso_personal set hora_retorno_p=? WHERE id_permiso_personal=?";
                $stmt=$conexion->prepare($sql2);
                $stmt->bind_param("si",$hora_retorno_p,$id_permiso_personal);
                $stmt->execute();
                header("Location: ../vigilancia.php");            
                break;

        case "salida_c":
                $id_compensacion_horas=$_POST['id_compensacion_horas'];
                $hora_salida_c=$_POST['hora_salida_c'];
                $sql3="UPDATE compensacion_horas set hora_salida_c=? WHERE id_compensacion_horas=?";
                $stmt=$conexion->prepare($sql3);
                $stmt->bind_param("si",$hora_salida_c,$id_compensacion_horas);
                $stmt->execute();
                header("Location: ../vigilancia.php");
                break;
        
        case "retorno_c":
                $id_compensacion_horas=$_POST['id_compensacion_horas'];
                $hora_retorno_c=$_POST['hora_retorno_c'];    
                $sql3="UPDATE compensacion_horas set hora_retorno_c=? WHERE id_compensacion_horas=?";
                $stmt=$conexion->prepare($sql3);
                $stmt->bind_param("si",$hora_retorno_c,$id_compensacion_horas);
                $stmt->execute();
                header("Location: ../vigilancia.php");            
                break;
}
// if (isset($_REQUEST['marcarhora'])){
// $id_trabajo_campo=$_POST['id_trabajo_campo'];
// $hora_salida=$_POST['hora_salida'];
// $hora_regreso=$_POST['hora_regreso'];
// $sql="UPDATE trabajo_campo set hora_salida=?,hora_regreso=? WHERE id_trabajo_campo=?";
// $stmt=$conexion->prepare($sql);
// $stmt->bind_param("ssi",$hora_salida,$hora_regreso,$id_trabajo_campo);
// $stmt->execute();
//         header("Location: ../vigilancia.php");
    
// }
