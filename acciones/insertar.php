<?php 
#capturar los datos
    $nombre=$_POST['nombreArchivo'];
    $precio=$_POST['precio'];
    $estado=$_POST['estado'];
    $comentario=$_POST['comentario'];
    $archivo=$_FILES['archivo'];
    var_dump($archivo);
#categoria y tipo
$tipo=$archivo['type'];
$categoria=explode('.',$archivo['name'])[1];

#fecha
$fecha=date('Y-m-d H:i:s');

$tmp_name=$archivo['tmp_name'];
$contenido_archivo=file_get_contents($tmp_name);
$archivoBLOB=addslashes($contenido_archivo);

include '../config/bd.php';
$conexion=conexion();
$query=insertar($conexion,$nombre,$categoria,$fecha,$tipo,$archivoBLOB,$comentario,$precio,$estado);
if($query){
    header('location:../home.php?insertar=success');
}else{
    header('location:../home.php?insertar=error');
}


?>