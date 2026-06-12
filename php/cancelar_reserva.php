<?php

session_start();

include 'conexion.php';

$id = $_GET['id'];

$sql = "
UPDATE reservas
SET estado = 'cancelada'
WHERE id = '$id'
";

$conn->query($sql);

header("Location: ../estudiante/mis_reservas.php");