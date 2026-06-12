<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit();
}

if($_SESSION['rol'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

include '../php/conexion.php';

$cubiculos = $conn->query("SELECT COUNT(*) AS total FROM cubiculos");
$totalCubiculos = $cubiculos->fetch_assoc()['total'];

$activas = $conn->query("
SELECT COUNT(*) AS total
FROM reservas
WHERE estado='activa'
");
$totalActivas = $activas->fetch_assoc()['total'];

$canceladas = $conn->query("
SELECT COUNT(*) AS total
FROM reservas
WHERE estado='cancelada'
");
$totalCanceladas = $canceladas->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Administrador - CubiUNIVO</title>

<link rel="stylesheet" href="../css/estilos.css">
<script src="../js/componentes/menu-navegacion.js" defer></script>
</head>
<body>

<div class="dashboard">
    <div class="encabezado">
    <img src="../assets/img/logo-univo.png" alt="UNIVO">
    <div>
        <h1>CubiUNIVO</h1>
        <p>Sistema de Reserva de Cubículos</p>
    </div>
</div>

<h1>Panel Administrador</h1>

<p>Bienvenido <?php echo $_SESSION['nombre']; ?></p>

<div class="estadisticas">

    <div class="card">
        <h3><?php echo $totalCubiculos; ?></h3>
        <p>Cubículos</p>
    </div>

    <div class="card">
        <h3><?php echo $totalActivas; ?></h3>
        <p>Reservas Activas</p>
    </div>

    <div class="card">
        <h3><?php echo $totalCanceladas; ?></h3>
        <p>Reservas Canceladas</p>
    </div>

</div>

<menu-navegacion rol="admin"></menu-navegacion>

</div>

</body>
</html>