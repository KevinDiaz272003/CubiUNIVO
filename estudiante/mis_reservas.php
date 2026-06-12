<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit();
}

include '../php/conexion.php';

$usuario_id = $_SESSION['id'];

$sql = "
SELECT reservas.*,
       cubiculos.nombre AS cubiculo
FROM reservas
INNER JOIN cubiculos
ON reservas.cubiculo_id = cubiculos.id
WHERE usuario_id = '$usuario_id'
AND reservas.estado = 'activa'
ORDER BY fecha DESC
";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Mis Reservas</title>

<link rel="stylesheet" href="../css/estilos.css">
<script src="../js/componentes/card-reserva.js" defer></script>
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

<h1>Mis Reservas</h1>
<menu-navegacion rol="estudiante"></menu-navegacion>

<div class="contenedor-cubiculos">

<?php while($reserva = $resultado->fetch_assoc()) { ?>

<card-reserva
    id="<?php echo $reserva['id']; ?>"
    cubiculo="<?php echo $reserva['cubiculo']; ?>"
    fecha="<?php echo $reserva['fecha']; ?>"
    inicio="<?php echo $reserva['hora_inicio']; ?>"
    fin="<?php echo $reserva['hora_fin']; ?>">
</card-reserva>

<?php } ?>

</div>

</div>

</body>
</html>