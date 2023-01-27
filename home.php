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
        

    <section class="d-flex my-5">
    <div class="m-auto text-center">
            <h1>UTN PHP - MYSQL</h1>
            <h3>Gestor de productos</h3>
        </div>
        <form class="m-auto mt-2 mb-2" method="POST" enctype="multipart/form-data" action="acciones/insertar.php">
            <h4 class="mb-4">Cargar producto</h4>
            <div class="mb-2">
                <label class="form-label">Nombre</label>
                <input class='form-control form-control-sm' type="text" name="nombreArchivo" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Comentario</label>
                <input class='form-control form-control-sm' type="text" name="comentario" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Precio</label>
                <input class='form-control form-control-sm' type="number" name="precio" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Imagen</label>
                <input class='form-control form-control-sm' type="file" name="archivo" required>
            </div>
            <input class="invisible" type="text" name="estado" value="procesando">
            <button class="btn btn-primary btn-sm mt-3">Subir archivo</button>
        </form>
    </section>


    <h2 class="mt-5 fw-bold text-primary">Mis productos</h2>
        <table class="table table-sm table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Comentario</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include 'config/bd.php';
                    $conexion=conexion();
                    $query=listar($conexion);
                    $contador=0;
                    while($datos=mysqli_fetch_assoc($query)){
                        $contador++;
                        $id=$datos['id'];
                        $nombre=$datos['nombre'];
                        $precio=$datos['precio'];
                        $estado=$datos['estado'];
                        $comentario=$datos['comentario'];
                        $categoria=$datos['categoria'];
                        $fecha=$datos['fecha'];
                        $archivo=$datos['archivo'];
                        $tipo=$datos['tipo'];

                    $valor="";
                    if($categoria=='jpg' || $categoria=='png'){
                        $valor="<img width='40' src='data:image/jpg;base64,".base64_encode($archivo)."'>";
                    }

                    if($categoria=='pdf'){
                        $valor="<img  width='40' src='img/pdf.png'>";
                    }

                    if($categoria=='xls' || $categoria=='xlsm' ){
                        $valor="<img  width='40' src='img/exel.png'>";
                    }

                    if($categoria=='doc' || $categoria=='docx'){
                        $valor="<img  width='40' src='img/word.png'>";
                    }
                    if($categoria=='mp4'){
                        $valor="<img  width='40' src='img/desconocido.png'>";
                    }

                    if($categoria=='mp3'){
                        $valor="<img  width='40' src='img/desconocido.png'>";
                    }

                    if($valor==''){
                        $valor="<img  width='40' src='img/desconocido.png'>";
                    }

                    
                ?>
                <tr>
                    <td><?php echo $contador;?></td>
                    <td><?php echo $nombre ;?></td>
                    <td><?php echo $comentario ;?></td>
                    <td>$<?php echo $precio;?></td>
                    <td><a href="cargar.php?id=<?php echo $id; ?>"><?php echo $valor ;?> descargar</a></td>
                    <td><?php echo $fecha ;?></td>
                    <td class="fw-bold text-primary"><?php echo $estado;?></td>
                    <td><a class='btn btn-secondary' href="editar.php?id=<?php echo $id?>">Editar</a> <a class='btn btn-danger' href="acciones/eliminar.php?id=<?php echo $id?>">Eliminar</a>
                    <a class='btn btn-success' href="acciones/finalizar.php?id=<?php echo $id?>">Finalizar estado</a>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>


    </div>
    

<script src="bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>