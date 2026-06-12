<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit();
}

include '../php/conexion.php';

$sql = "
SELECT
usuarios.nombre AS estudiante,
cubiculos.nombre AS cubiculo,
reservas.fecha,
reservas.hora_inicio,
reservas.hora_fin,
reservas.estado

FROM reservas

INNER JOIN usuarios
ON reservas.usuario_id = usuarios.id

INNER JOIN cubiculos
ON reservas.cubiculo_id = cubiculos.id

ORDER BY reservas.fecha DESC
";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang='es'>
<head>

<meta charset='UTF-8'>

<title>Reservas</title>

<link rel='stylesheet' href='../css/estilos.css'>
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

<h1>Reservas Registradas</h1>
<menu-navegacion rol="admin"></menu-navegacion>

<table border="1" cellpadding="10">

<tr>
<th>Estudiante</th>
<th>Cubículo</th>
<th>Fecha</th>
<th>Hora Inicio</th>
<th>Hora Fin</th>
<th>Estado</th>
</tr>

<?php while($fila = $resultado->fetch_assoc()) { ?>

<tr>

<td><?php echo $fila['estudiante']; ?></td>

<td><?php echo $fila['cubiculo']; ?></td>

<td><?php echo $fila['fecha']; ?></td>

<td><?php echo $fila['hora_inicio']; ?></td>

<td><?php echo $fila['hora_fin']; ?></td>

<td>

<?php if($fila['estado'] == 'activa'){ ?>

<span class="estado-activa">
    Activa
</span>

<?php } else { ?>

<span class="estado-cancelada">
    Cancelada
</span>

<?php } ?>

</td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>