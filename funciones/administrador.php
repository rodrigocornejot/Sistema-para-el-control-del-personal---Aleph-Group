<?php
include_once 'sesion.php';
$path=$_SERVER['REQUEST_URI'];
$host=$_SERVER['HTTP_HOST'];
$url=$host.$path;
if ($_SESSION['admin']!=1){
    header("Location: index.php");
}
?>
