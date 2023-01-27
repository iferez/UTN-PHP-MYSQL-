<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container">

    <div class="row justify-content-center">
        <div class="col-6 ">
        <form action="validar.php" method="post" class="bg-light p-5">
        <h1 class="my-5">Sistema de login</h1>
        <p class="fw-bold">Usuario <input type="text" class="form-control" placeholder="ingrese su nombre" name="user" required></p>
        <p class="fw-bold">Contraseña <input type="password" class="form-control" placeholder="ingrese su contraseña" name="password" required></p>
        <input type="submit" class="btn btn-success" value="Ingresar">

        </form> 
        </div>
    </div>
</div>

<script src="bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>