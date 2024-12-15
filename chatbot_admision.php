<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMISION - UNS</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
    />
    <style>
      body {
        font-family: "Poppins", sans-serif;
        background-color: #f0f7ff;
        margin: 0;
        padding: 0;
      }

      header {
        background: linear-gradient(135deg, #c6f754, #f8a96c);
        color: rgba(255, 255, 255, 0.973);
        padding: 20px 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 100;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
      }

      header .navbar-brand {
        font-weight: bold;
        font-size: 2rem;
        display: flex;
        align-items: center;
        letter-spacing: 1px;
        transition: transform 0.3s ease;
      }

      header .navbar-brand img {
        max-width: 40px;
        margin-right: 10px;
      }

      header .navbar-nav .nav-link {
        font-size: 1.1rem;
        text-transform: uppercase;
        margin: 0 10px;
        transition: color 0.3s ease, transform 0.3s ease;
      }

      header .navbar-nav .nav-link:hover {
        color: #ff6f61;
        transform: translateY(-3px);
        text-decoration: none;
      }

      footer {
        background-color: #003366;
        color: white;
        padding: 20px 0;
        text-align: center;
        margin-top: 50px;
        border-top: 2px solid #f39c12;
      }

      main {
        padding-top: 120px;
        padding-bottom: 50px;
        text-align: center;
      }

      .hero-section {
        background: linear-gradient(to bottom, #003366, #0061a8);
        color: white;
        padding: 60px 0;
        margin-top: 80px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }

      .hero-section h1 {
        font-size: 3rem;
        font-weight: 700;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4);
      }

      .hero-section p {
        font-size: 1.2rem;
        font-weight: 300;
        margin-top: 20px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
      }

      .btn-custom {
        background-color: #f39c12;
        color: white;
        border: none;
        padding: 12px 30px;
        font-size: 1.2rem;
        border-radius: 30px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      }

      .btn-custom:hover {
        background-color: #e67e22;
        transform: translateY(-2px);
      }

      .carousel-item img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        display: block;
        margin: 0 auto;
        border-radius: 15px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      }

      .carousel-inner {
        width: 100%;
        overflow: hidden;
      }

      df-messenger {
        z-index: 999;
        position: fixed;
        bottom: 16px;
        right: 16px;
        --df-messenger-font-color: #000;
        --df-messenger-font-family: "Google Sans", sans-serif;
        --df-messenger-chat-background: #f3f6fc;
        --df-messenger-message-user-background: #d3e3fd;
        --df-messenger-message-bot-background: #fff;
      }

      @media (max-width: 768px) {
        header .navbar-brand {
          font-size: 1.5rem;
        }

        .hero-section h1 {
          font-size: 2.5rem;
        }

        .btn-custom {
          font-size: 1.1rem;
          padding: 10px 25px;
        }
      }
      footer {
        background-color: #373838;
        padding: 40px 0;
      }

      .footer-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
      }

      .footer-list li {
        border-bottom: 1px dotted #ccc;
        padding-bottom: 8px;
        margin-bottom: 8px;
        text-align: left;
        font-size: 14px;
      }

      footer h2 {
        text-align: left;
        font-size: 18px;
        margin-bottom: 15px;
      }

      footer p {
        text-align: left;
        font-size: 14px;
        margin-bottom: 10px;
      }

      .footer-images {
        text-align: left;
        margin-bottom: 20px;
      }

      .footer-images a {
        margin: 0 10px;
      }

      .footer-list a {
        color: #fff;
        text-decoration: none;
      }

      .footer-list a:hover {
        text-decoration: underline;
      }

      .social-icons {
        text-align: center;
        list-style: none;
        padding: 0;
      }
      .navbar-dark .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.973);
      }
      .social-icons li {
        display: inline-block;
        margin: 0 10px;
      }
      .social-icons i {
        font-size: 20px;
      }
      .row {
        display: flex;
        justify-content: center;
      }
      .col-md-4 {
        margin-bottom: 20px;
      }
      @media (max-width: 768px) {
        .col-md-4 {
          flex: 0 0 100%;
          max-width: 100%;
        }
      }
      .social-icons a {
        color: #fff;
        font-size: 18px;
      }

      .social-icons a:hover {
        color: #ccc;
      }
      .brand-logo {
        width: 180px;
        height: auto;
        margin-right: 15px;
      }

      .footer-images img {
        width: 30px;
        height: auto;
        margin-right: 10px;
      }
      .brand-title {
        font-size: 2.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        letter-spacing: 2px;
      }
    </style>
  </head>

  <body>
    <header>
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <img
            class="brand-logo"
            src="https://www.uns.edu.pe/img/logo_rojo.png"
            alt="Logo UNS"
          />
          <span class="brand-title">ADMISION UNS</span>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contacto</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <section class="hero-section">
      <div class="container text-center">
        <h1 style="margin-top: 50px">Bienvenido a ADMISION UNS</h1>
        <p>Proceso de admisión de la Universidad Nacional del Santa</p>

        <div
          id="carouselExampleAutoplaying"
          class="carousel slide"
          data-bs-ride="carousel"
          data-bs-interval="4000"
        >
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="https://www.uns.edu.pe/recursos/sliders/e2c0be24560d78c5e599c2a9c9d0bbd2.png"
                alt="Imagen Universidad 1"
              />
            </div>
            <div class="carousel-item">
              <img
                src="https://www.uns.edu.pe/recursos/sliders/31fefc0e570cb3860f2a6d4b38c6490d.png"
                alt="Imagen Universidad 2"
              />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <a href="#" class="btn btn-custom" style="margin-top: 30px"
          >Explora nuestros servicios</a
        >
      </div>
    </section>

    <main>
      <div class="container">
        <h2>Descubre nuestra oferta educativa</h2>
        <p>
          Te invitamos a conocer todos los programas educativos que tenemos para
          ti. ¡Tu futuro comienza aquí!
        </p>
      </div>
    </main>

    <footer>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <h2>Universidad Nacional del Santa</h2>
            <p>Av. Pacífico 508 - Nuevo Chimbote</p>
            <p>Central Telefónica: (51) 43-310445 Chimbote - Ancash - Perú.</p>
            <p>© 2016 Dirección de Imagen Institucional</p>
            <p>Transparencia Universitaria: transparencia@uns.edu.pe</p>
            <div class="footer-images">
              <a href="https://www.facebook.com/UNSChimbote/" target="_blank">
                <img src="https://www.uns.edu.pe/img/facebook.png" />
              </a>
              <a href="https://x.com/UNS_Chimbote" target="_blank">
                <img src="https://www.uns.edu.pe/img/twitter.png" />
              </a>
              <a href="https://www.instagram.com/unschimbote/" target="_blank">
                <img src="https://www.uns.edu.pe/img/instagram.png" />
              </a>
              <a
                href="https://www.youtube.com/channel/UCcCyx2mzVyJrktsFs9IBdGQ"
                target="_blank"
              >
                <img src="https://www.uns.edu.pe/img/youtube.png" />
              </a>
            </div>
            <ul class="social-icons">
              <li>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-instagram"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </li>
            </ul>
            <p>Visitante N°: 27725</p>
          </div>
          <div class="col-md-4">
            <ul class="footer-list">
              <li><a href="#">UNIVERSIDAD</a></li>
              <li><a href="#">DIRECTORIO</a></li>
              <li><a href="#">INTRANET</a></li>
              <li><a href="#">PAGO VIRTUAL - FUT - TUPA Y TUSNE UNS</a></li>
              <li><a href="#">BASES DE DATOS BIBLIOGRÁFICAS</a></li>
              <li><a href="#">TRANSPARENCIA</a></li>
              <li><a href="#">POLÍTICAS DE PRIVACIDAD</a></li>
              <li><a href="#">ENTRAR</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="footer-list">
              <li><a href="#">LIBRO DE RECLAMACIONES</a></li>
              <li><a href="#">CONSULTORIO JURÍDICO GRATUITO UNS</a></li>
              <li><a href="#">CONVOCATORIAS</a></li>
              <li><a href="#">VICERRECTORADO DE INVESTIGACIÓN</a></li>
              <li><a href="#">COMITÉ ELECTORAL</a></li>
              <li><a href="#">REPOSITORIO INSTITUCIONAL</a></li>
              <li><a href="#">SITEMAP</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <link
      rel="stylesheet"
      href="https://www.gstatic.com/dialogflow-console/fast/df-messenger/prod/v1/themes/df-messenger-default.css"
    />
    <script src="https://www.gstatic.com/dialogflow-console/fast/df-messenger/prod/v1/df-messenger.js"></script>
    <df-messenger
      location="us-central1"
      project-id="appnube-436622"
      agent-id="47135858-1461-4b12-bd01-900284c450ae"
      language-code="es"
      max-query-length="-1"
    >
      <df-messenger-chat-bubble chat-title="admision-chatbot">
      </df-messenger-chat-bubble>
    </df-messenger>
  </body>
</html>
