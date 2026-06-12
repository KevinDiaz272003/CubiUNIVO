<?php

session_start();

include 'conexion.php';

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios
        WHERE correo='$correo'
        AND password='$password'";

$resultado = $conn->query($sql);

if($resultado->num_rows > 0){

    $usuario = $resultado->fetch_assoc();

    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];

    if($usuario['rol'] == 'admin'){
        header("Location: ../admin/dashboard.php");
    }else{
        header("Location: ../estudiante/dashboard.php");
    }

}else{

    echo "Correo o contraseña incorrectos";

}