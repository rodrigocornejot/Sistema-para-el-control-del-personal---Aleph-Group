<?php
include_once "../funciones/conexion.php";
switch ($_POST['tipo']) {
    case "login":
        $dni = $_POST['dni'];
        $password = $_POST['password'];
        $sql = "select * from empleados where dni=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $stmt->bind_result($id_empleados,$id_dept,$admin, $nom_ape, $dni, $password_hash);
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $password_hash)) {
                session_start();
                $_SESSION['id']=$id_empleados;
                $_SESSION['dni'] = $dni;
                $_SESSION['nom_ape'] = $nom_ape;
                $_SESSION['admin']= $admin;
                header("Location: ../index.php");
            } else {
                header("Location: ../login.php?error=p");
            }
        }else {
            header("Location: ../login.php?error=p");
        }
        break;
    case "logout":
        session_start();
        session_destroy();
        header("Location: ../login.php");
        break;
}
