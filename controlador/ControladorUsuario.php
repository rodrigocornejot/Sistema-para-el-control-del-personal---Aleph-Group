<?php
require "../funciones/conexion.php";
session_start();
switch($_POST["tipo"]){
    case "agregar":

        $dni=$_POST['dni'];
        $nom_ape=$_POST['nom_ape'];
        $password=$_POST['password'];
        $opciones = array('cost' => 12);
        $password_hash = password_hash($password,PASSWORD_BCRYPT,$opciones);
        $id_dept=$_POST['id_dep'];
        $sql="insert into empleados (dni,nom_ape,password,id_dept) values (?,?,?,?)";
        $stmt=$conexion->prepare($sql);
        $stmt->bind_param("sssi",$dni,$nom_ape,$password_hash,$id_dept);
        $stmt->execute();
        header("Location: ../crud.php");
        break;

    case "actualizar":

        $id=$_POST["id"];
        $id_dept = $_POST["id_dep"];
        $dni=$_POST['dni'];
        $nom_ape=$_POST['nom_ape'];

        $password=$_POST['password'];
        $opciones = array('cost' => 12);
        $password_hash = password_hash($password,PASSWORD_BCRYPT,$opciones);

        $sql="UPDATE empleados SET dni = ?,nom_ape = ?,password = ?,id_dept = ? WHERE id_empleados = ?";
        $stmt=$conexion->prepare($sql);
        $stmt->bind_param("sssii",$dni,$nom_ape,$password_hash,$id_dept,$id);
        $stmt->execute();
        header("Location: ../crud.php");
        break;
    case "eliminar":
        $id=$_POST['id'];
        $sql="delete from empleados where id_empleados=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        header('location: ../crud.php');
        break;
}
?>