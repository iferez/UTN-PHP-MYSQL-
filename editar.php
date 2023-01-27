<?php 
    $id=$_GET['id'];
    include 'config/bd.php';
    $conexion=conexion();
    $datos=datos($conexion,$id);
    $nombre=$datos['nombre'];
    $precio=$datos['precio'];
    $estado=$datos['estado'];
    $comentario=$datos['comentario'];
    $categoria=$datos['categoria'];
    $titulo=$nombre.'.'.$categoria;
    $tipo=$datos['tipo'];
    $archivo=$datos['archivo'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container">
            <form class="m-auto w-50 my-5" method="POST" enctype="multipart/form-data" action="acciones/editar.php">
                <h2 class="mb-4">Datos del producto</h2>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="mb-2">
                    <label class="form-label">Nombre</label>
                    <input class='form-control form-control-sm' type="text" name="nombreArchivo" value="<?php echo $nombre ;?>">
                </div>
                <div class="mb-2">
                    <label class="form-label">Comentario</label>
                    <input class='form-control form-control-sm' type="text" name="comentario" value="<?php echo $comentario ;?>">
                </div>
                <div class="mb-2">
                    <label class="form-label">Precio</label>
                    <input class='form-control form-control-sm' type="number" name="precio" value="<?php echo $precio ;?>">
                </div>
                <input class='invisible' type="text" name="estado" value="procesando">
                <div class="mb-2">
                    <label class="form-label">Imagen</label>
                    <input class='form-control form-control-sm' type="file" name="archivo">
                </div>
                <button class="btn btn-primary btn-sm mt-3">Actualizar producto</button>
                <a class="btn btn-warning btn-sm mt-3" href="home.php">Regresar</a>
            </form>
            <div class="m-auto w-75 my-5 text-center">
                <?php 
                    $valor="";
                    if($categoria=='pdf'){
                        $valor="<iframe class='w-100' height='500' src='data:".$tipo.";base64,".base64_encode($archivo)."' frameborder='0'></iframe>";
                    }
                    if($categoria=='png' || $categoria=='jpg'){
                        $valor="<img src='data:".$tipo.";base64,".base64_encode($archivo)."' >";
                    }
                    if($categoria=='mp4' || $categoria=='mp3'){
                        $valor="<video class='m-auto' controls='true' src='data:".$tipo.";base64,".base64_encode($archivo)."'></video>";
                    }
                    
                    echo $valor;
                
                ?>
            </div>

    </div>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>