<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro | Q-Vision</title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/Q-Vision/assets/css/style.css">
  <link rel="stylesheet" href="/Q-Vision/assets/css/style-Registro.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<?php include("includes/Header.php"); ?>

<main class="container">
  <h2>Regístrate</h2>
  <form method="post" action="/Q-Vision/SaveUser.php" id="formRegistro">
    <label>Nombre</label>
    <input type="text" name="nombre" required pattern="[A-Za-z ]+">

    <label>Apellidos</label>
    <input type="text" name="apellido" required pattern="[A-Za-z ]+">

    <label>Correo electrónico</label>
    <input type="email" name="email" required>

    <label>Contraseña</label>
    <input type="password" name="password" required>

    <label>Confirmar contraseña</label>
    <input type="password" name="confirm_password" required>

    <label><input type="checkbox" id="terms"> Acepto Términos</label>
    <label><input type="checkbox" id="policy"> Política de datos</label>

    <button type="submit" id="btnRegister" disabled>Registrarse</button>
  </form>
</main>

<?php include("includes/Footer.php"); ?>

<script src="/Q-Vision/assets/js/app.js" defer></script>
</body>
</html>
