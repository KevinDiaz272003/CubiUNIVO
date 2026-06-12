<?php

session_start();

include 'conexion.php';

$usuario_id = $_SESSION['id'];

$cubiculo_id = $_POST['cubiculo_id'];
$fecha = $_POST['fecha'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];

$validacion = "
SELECT *
FROM reservas
WHERE cubiculo_id = '$cubiculo_id'
AND fecha = '$fecha'
AND estado = 'activa'
AND (
    ('$hora_inicio' < hora_fin)
    AND
    ('$hora_fin' > hora_inicio)
)
";

$resultado = $conn->query($validacion);

if($resultado->num_rows > 0){

    echo "
    <h2>
    Ya existe una reserva para ese horario.
    </h2>

    <a href='../estudiante/dashboard.php'>
    Volver
    </a>
    ";

    exit();
}

$sql = "
INSERT INTO reservas
(usuario_id,cubiculo_id,fecha,hora_inicio,hora_fin)
VALUES
(
'$usuario_id',
'$cubiculo_id',
'$fecha',
'$hora_inicio',
'$hora_fin'
)
";

if($conn->query($sql)){

    header('Location: ../estudiante/dashboard.php');

}else{

    echo 'Error al reservar';

}
?>