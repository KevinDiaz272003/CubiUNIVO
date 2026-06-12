<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CubiUNIVO</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="login-page">
    
<div class="login-container">

    <h1>CubiUNIVO</h1>
    <p>Sistema de Reserva de Cubículos</p>

    <form action="php/login.php" method="POST">

        <input
            type="email"
            name="correo"
            placeholder="Correo"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Contraseña"
            required
        >

        <button type="submit">
            Iniciar Sesión
        </button>

    </form>

</div>

</body>
</html>