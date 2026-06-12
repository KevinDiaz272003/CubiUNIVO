<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit();
}

include '../php/conexion.php';

$id_cubiculo = $_GET['id'];

$sql = "SELECT * FROM cubiculos WHERE id = $id_cubiculo";
$resultado = $conn->query($sql);

$cubiculo = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<title>Reservar Cubículo</title>

<link rel="stylesheet" href="../css/estilos.css">

</head>
<body>

<div class="login-container">

<h2><?php echo $cubiculo['nombre']; ?></h2>

<form action="../php/guardar_reserva.php" method="POST">

<input
type="hidden"
name="cubiculo_id"
value="<?php echo $cubiculo['id']; ?>"
>

<label>Fecha</label>

<input
type="date"
name="fecha"
required
>

<label>Hora Inicio</label>

<input
type="time"
name="hora_inicio"
required
>

<label>Hora Fin</label>

<input
type="time"
name="hora_fin"
required
>

<button type="submit">
Reservar
</button>

</form>

</div>

</body>
</html>