<?php
include('config/bd.php');
$user=$_POST['user'];
$password=$_POST['password'];
session_start();
$_SESSION['user']=$user;


$conexion=conexion();

$consulta="SELECT*FROM users where user='$user' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.php");

  ?>
  <h1 class="text-danger my-5 container">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);