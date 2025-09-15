<?php
session_start();
include("includes/db.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: Index.php');
  exit;
}

// Validar entrada
$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';

if ($email === '' || $pass === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['login_error'] = 'Credenciales no existentes o incorrectas';
  header('Location: Index.php');
  exit;
}

// Buscar usuario por email
$sql = "SELECT id, nombre, email, password FROM usuarios WHERE email = ? LIMIT 1";
if (!$stmt = $conn->prepare($sql)) {
  $_SESSION['login_error'] = 'Credenciales no existentes o incorrectas';
  header('Location: Index.php');
  exit;
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

//Verificar contraseña
if ($user = $result->fetch_assoc()) {
  if (password_verify($pass, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['usuario']       = $user['nombre'];
    $_SESSION['user_id']       = (int)$user['id'];
    $_SESSION['last_activity'] = time();
    unset($_SESSION['login_error']);

    $stmt->close();
    $conn->close();

    header('Location: Index.php');
    exit;
  }
}

// error y redirección para que el header muestre el mensaje
if (isset($stmt)) $stmt->close();
if (isset($conn)) $conn->close();

$_SESSION['login_error'] = 'Credenciales no existentes o incorrectas';
header('Location: Index.php');
exit;

