<?php 
function auntenticacion(){
    if(!verificar_usuario()){
        header("Location:login.php");
        exit();
    }
}
function verificar_usuario(){
    return isset($_SESSION["dni"]);
}
session_start();
auntenticacion();

?>