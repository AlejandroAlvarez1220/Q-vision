<?php
include("includes/db.php");

$nombre   = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$email    = trim($_POST['email']);
$pass     = $_POST['password'];
$confirm  = $_POST['confirm_password'];

if (!preg_match("/^[a-zA-Z ]+$/", $nombre) || !preg_match("/^[a-zA-Z ]+$/", $apellido)) {
  die("Nombre y apellido no pueden tener números.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Correo no válido.");
}
if ($pass !== $confirm) {
  die("Las contraseñas no coinciden.");
}

$passHash = password_hash($pass, PASSWORD_BCRYPT);

$sql = "INSERT INTO usuarios (nombre, apellido, email, password) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $apellido, $email, $passHash);

if($stmt->execute()){
  header("Location: index.php?registro=ok");
} else {
  echo "Error: " . $conn->error;
}