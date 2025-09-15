<?php 
  $active = 'rutas';               
  $pageTitle = 'Q-Vision | Ruta de Formación en .NET';
  $hideBanner = true;
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $pageTitle ?></title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/Q-Vision/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<?php include 'includes/Header.php'; ?>

<main>
  <section class="ruta-hero">
    <div class="container ruta-hero__grid">
      <div class="ruta-hero__text">
        <h1>Ruta de Formación en .NET</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum laboriosam expedita ipsa quis ad dolores aperiam eligendi unde eius molestiae autem numquam quidem vero earum quisquam architecto, reprehenderit laudantium fuga?
        </p>
      </div>
      <div class="ruta-hero__img">
        <img src="/Q-Vision/img/imagenrutanet.jpg" alt=".NET Ruta de formación">
      </div>
    </div>
  </section>

  <section class="container ruta-contenido">
  <article class="card soft">
    <div class="card-body">
      <h2 class="text-center aprende-title">Aprende a construir</h2>

      <div class="aprende-grid">
        <figure class="aprende-item">
          <div class="icon-circle">
            <img src="/Q-Vision/img/appweb.png" alt="Aplicaciones Web">
          </div>
          <figcaption>Aplicaciones Web</figcaption>
        </figure>

        <figure class="aprende-item">
          <div class="icon-circle">
            <img src="/Q-Vision/img/webapi.png" alt="Web API">
          </div>
          <figcaption>Web API</figcaption>
        </figure>

        <figure class="aprende-item">
          <div class="icon-circle">
            <img src="/Q-Vision/img/appsegura.png" alt="Aplicaciones Seguras">
          </div>
          <figcaption>Aplicaciones Seguras</figcaption>
        </figure>
      </div>
    </div>
  </article>
</section>

<!--
    CTA Parallax
-->
  <section class="parallax-dotnet" aria-label="cta parallax">
    <div class="parallax-overlay">
      <div class="container parallax-content">
        <h2 class="titulo-parallax">Aprende .NET con proyectos reales</h2>
        <p>Construye, despliega y publica tu portafolio profesional.</p>
        <a class="btn-outline" href="/Q-Vision/Registro.php">Comenzar ahora</a>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>

<script src="/Q-Vision/assets/js/app.js" defer></script>

</body>
</html>