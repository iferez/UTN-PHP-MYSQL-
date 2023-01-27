<?php 
$id=$_GET['id'];
include '../config/bd.php';
$conexion=conexion();
$query=finalizar($conexion,$id);
if($query){
 header('location:../home.php?eliminar=success');
}else{
    header('location:../home.php?eliminar=error');
}
?>