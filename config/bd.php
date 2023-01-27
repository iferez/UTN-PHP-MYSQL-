<?php 
function conexion(){
    $con=mysqli_connect('localhost','root','','ferezcrud');
    return $con;
}

function listar($conexion){
    $sql="SELECT * FROM archivo";
    $query=mysqli_query($conexion,$sql);
    return $query;
}
function insertar($conexion,$nombre,$categoria,$fecha,$tipo,$archivoBLOB,$comentario,$precio,$estado){
    $sql="INSERT INTO archivo(nombre,categoria,fecha,tipo,archivo,comentario,precio,estado) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$comentario','$precio','$estado')";
    $query=mysqli_query($conexion,$sql);
    return $query;
}
function eliminar($conexion,$id){
    $sql="DELETE from archivo WHERE id=$id";
    $query=mysqli_query($conexion,$sql);
    return $query;
}
function datos($conexion,$id){
    $sql="SELECT * FROM archivo WHERE id=$id";
    $query=mysqli_query($conexion,$sql);
    $datos=mysqli_fetch_assoc($query);
    return $datos;
}
function finalizar($conexion,$id){
    $sql="UPDATE archivo SET estado='finalizado' WHERE id=$id";
    $query=mysqli_query($conexion,$sql);
    return $query;
}
function editarNombre($conexion,$id,$nombre){
    $sql="UPDATE archivo SET nombre='$nombre' WHERE id=$id";
    $query=mysqli_query($conexion,$sql);
    return $query;
}
function editarPrecio($conexion,$id,$precio){
    $sql="UPDATE archivo SET precio='$precio' WHERE id=$id";
    $query=mysqli_query($conexion,$sql);
    return $query;
}
function editarEstado($conexion,$id,$estado){
    $sql="UPDATE archivo SET estado='$estado' WHERE id=$id";
    $query=mysqli_query($conexion,$sql);
    return $query;
}
function editarComentario($conexion,$id,$comentario){
    $sql="UPDATE archivo SET comentario='$comentario' WHERE id=$id";
    $query=mysqli_query($conexion,$sql);
    return $query;
}
function editarArchivo($conexion,$id,$categoria,$tipo,$fecha,$archivoBLOB,$precio,$estado){
    $sql="UPDATE archivo SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB',precio='$precio',estado='$estado' WHERE id=$id";
    $query=mysqli_query($conexion,$sql);
    return $query;
}
function editar($conexion,$id,$nombre,$categoria,$tipo,$fecha,$archivoBLOB,$comentario,$precio,$estado){
    $sql="UPDATE archivo SET nombre='$nombre', categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB',comentario='$comentario',precio='$precio',estado='$estado' WHERE id=$id";
    $query=mysqli_query($conexion,$sql);
    return $query;
}

?>