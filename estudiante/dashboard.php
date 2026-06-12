<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit();
}

if($_SESSION['rol'] != 'estudiante'){
    header("Location: ../index.php");
    exit();
}

include '../php/conexion.php';

$sql = "SELECT * FROM cubiculos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CubiUNIVO</title>

<link rel="stylesheet" href="../css/estilos.css">

<script src="../js/componentes/card-cubiculo.js" defer></script>
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

<h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>

<menu-navegacion rol="estudiante"></menu-navegacion>

<h2>Cubículos Disponibles</h2>

<div class="contenedor-cubiculos">

<?php while($cubiculo = $resultado->fetch_assoc()) { ?>

<card-cubiculo
    id="<?php echo $cubiculo['id']; ?>"
    nombre="<?php echo $cubiculo['nombre']; ?>"
    estado="<?php echo $cubiculo['estado']; ?>"
    capacidad="<?php echo $cubiculo['capacidad']; ?>">
</card-cubiculo>

<?php } ?>

</div>

</div>

</body>
</html>