<?php
  $active = 'inicio';
  $pageTitle = 'Q-Vision | Inicio';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $pageTitle ?></title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/Q-Vision/assets/css/style.css">
  <script src="/Q-Vision/assets/js/app.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<main class="container">
  <section class="novedades">
    <h2>Novedades</h2>
    <div class="novedades-grid">
      <div class="card">
        <img src="img/img1.jpg" alt="Bienvenida">
        <div class="card-body">
          <h3 class="card-title">Bienvenidos a IzyAcademy</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit nihil autem odit tenetur ex itaque quasi dolores minima officia dolore mollitia iusto nemo dignissimos est, assumenda omnis error quidem aspernatur.</p>
        </div>
      </div>

      <div class="mini-grid">
        <div class="card mini">
          <img src="img/img2.jpeg" alt="Generación de comunidad">
          <h3 class="card-title">Generación de comunidad</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint enim unde neque commodi?</p>
        </div>
        <div class="card mini">
          <img src="img/img3.jpg" alt="Transferencia de conocimiento">
          <h3 class="card-title">Transferencia de conocimiento</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint enim unde neque commodi?</p>
        </div>
        <div class="card mini">
          <img src="img/img4.jpg" alt="Certificaciones">
          <h3 class="card-title">Certificaciones e insignias</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint enim unde neque commodi?</p>
        </div>
        <div class="card mini">
          <img src="img/img5.jpg" alt="Apropiación del conocimiento">
          <h3 class="card-title">Apropiación del conocimiento</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint enim unde neque commodi?</p>
        </div>
      </div>
    </div>
  </section>

  <section class="aliados">
    <h2>Aliados</h2>
    <p>Nuestros entrenamientos y certificaciones cuentan con el respaldo de:</p>
    <ul class="aliados-logos">
      <li><img src="img/aliado1.png" alt="Aliado 1"></li>
      <li><img src="img/aliado2.jpg" alt="Aliado 2"></li>
      <li><img src="img/aliado3.png" alt="Aliado 3"></li>
      <li><img src="img/aliado4.png" alt="Aliado 4"></li>
      <li><img src="img/aliado5.jpg" alt="Aliado 5"></li>
      <li><img src="img/aliado6.jpg" alt="Aliado 6"></li>
      <li><img src="img/aliado7.png" alt="Aliado 7"></li>
    </ul>
  </section>  
</main>

<section id="registro" class="registro-section">
  <div class="container registro-grid">

    <figure class="registro-figure">
      <img src="/Q-Vision/img/registro.png" alt="Asesor de IzyAcademy">
    </figure>

    <div class="register-card">
      <h3>Regístrate</h3>

      <form method="post" action="/Q-Vision/SaveUser.php" id="formRegistro" class="form">
        <label>Nombre</label>
        <input type="text" name="nombre" required
               pattern="[A-Za-zÀ-ÿ\u00f1\u00d1 ]+">

        <label>Apellidos</label>
        <input type="text" name="apellido" required
               pattern="[A-Za-zÀ-ÿ\u00f1\u00d1 ]+">

        <label>Correo electrónico</label>
        <input type="email" name="email" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <label>Confirmar contraseña</label>
        <input type="password" name="confirm_password" required>

        <label class="checkbox">
          <input type="checkbox" id="terms"> Acepto términos y condiciones
        </label>
        <label class="checkbox">
          <input type="checkbox" id="policy"> Acepto Política de tratamiento de datos
        </label>

        <button type="submit" id="btnRegister" class="btn-primary" disabled>
          Registrarse
        </button>
      </form>
    </div>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="/Q-Vision/assets/js/app.js" defer></script>

</body>
</html>
