<?php
session_start();

/*
    CSRF para formularios POST
*/
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

/*
    Leer error de login (flash) y decidir si abrir modal
*/
$loginError = '';
if (!empty($_SESSION['login_error'])) {
  $loginError = $_SESSION['login_error'];
  unset($_SESSION['login_error']); // se consume una vez
} elseif (isset($_GET['login']) && $_GET['login'] === 'error') {
  $loginError = 'Credenciales no existentes o incorrectas';
}
$openLoginModal = $loginError !== '';

/*
    Variables del header ya existentes
*/
if (!isset($active))      $active      = 'inicio';
$useNavImage = $useNavImage ?? true;
$navBgUrl    = $navBgUrl    ?? '/Q-Vision/img/nav-bg.jpg';

$headerClass = $useNavImage ? 'nav-has-image' : '';
$headerStyle = $useNavImage ? " style=\"--nav-bg-image: url('".htmlspecialchars($navBgUrl, ENT_QUOTES)."')\"" : '';
?>
<header class="<?= $headerClass ?>"<?= $headerStyle ?>>
  <div class="container nav">

    <a class="logo" href="Index.php" aria-label="Ir al inicio">
      <img src="img/logo_actualizado.png" alt="IzyAcademy">
    </a>

    <nav role="navigation" aria-label="Menú principal">
      <ul class="menu" id="mainMenu">
        <li><a href="Index.php" class="<?= $active==='inicio' ? 'active' : '' ?>">Inicio</a></li>
        <li class="has-sub">
          <a href="#">Rutas de Formación</a>
          <ul class="submenu" aria-label="Submenú Rutas de Formación">
            <li><a href="#">Científico de Datos</a></li>
            <li><a href="RutaNet.php" class="<?= $active==='rutas' ? 'active' : '' ?>">Ruta de Formación en .NET</a></li>
            <li><a href="#">Automatización</a></li>
          </ul>
        </li>
        <li><a href="#" class="<?= $active==='cursos' ? 'active' : '' ?>">Cursos</a></li>
        <li><a href="#" class="<?= $active==='quienes' ? 'active' : '' ?>">Quiénes somos</a></li>
      </ul>
    </nav>

    <div class="actions">
      <?php if (isset($_SESSION['usuario'])): ?>
        <span>👤 <?= htmlspecialchars($_SESSION['usuario']) ?></span>

        <form action="Logout.php" method="post" style="display:inline;">
          <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">
          <button type="submit" class="link">Cerrar sesión</button>
        </form>

      <?php else: ?>
        <button id="btnLogin" type="button" class="link" data-open-modal="login">Iniciar Sesión</button>
      <?php endif; ?>
    </div>

    <button class="menu-toggle" id="menuToggle" type="button"
            aria-expanded="false" aria-controls="mainMenu" aria-label="Abrir menú">
      ☰
    </button>
  </div>
</header>

<div id="loginModal" class="modal hidden" aria-hidden="true" role="dialog" aria-modal="true">
  <div class="modal-backdrop" data-close></div>

  <div class="modal-card" role="document">
    <button class="modal-close" type="button" title="Cerrar" data-close>✕</button>

    <section aria-label="Formulario de inicio de sesión">
      <?php if ($loginError): ?>
        <div role="alert" aria-live="polite"
             style="background:#fee2e2;color:#b91c1c;border:1px solid #fecaca;
                    padding:10px;border-radius:10px;margin:0 0 12px;">
          <?= htmlspecialchars($loginError) ?>
        </div>
      <?php endif; ?>

      <h3>Inicie sesión en su cuenta</h3>
      <form method="post" action="Login.php" class="form">
        <label>Correo electrónico
          <input type="email" name="email" required>
        </label>
        <label>Contraseña
          <input type="password" name="password" required>
        </label>
        <button type="submit" class="btn-primary">Acceder</button>
      </form>
    </section>
  </div>
</div>

<?php if ($openLoginModal): ?>

<script>
document.addEventListener('DOMContentLoaded', function(){
  var modal = document.getElementById('loginModal');
  if (modal) {
    modal.classList.remove('hidden');
    modal.setAttribute('aria-hidden', 'false');
    var email = modal.querySelector('input[type="email"]');
    if (email) email.focus();
  }
});
</script>
<?php endif; ?>
