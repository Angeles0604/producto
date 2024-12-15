<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEPUNS - UNS</title>
    <!-- Incluye estilos básicos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        header {
            background-color: rgba(0, 51, 102, 0.8);
            color: white;
            padding: 20px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
        }

        header .navbar-brand {
            font-weight: bold;
            font-size: 1.8rem;
        }

        header .navbar-nav .nav-link {
            font-size: 1.1rem;
        }

        footer {
            background-color: #003366;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;
        }

        main {
            padding-top: 120px; 
            padding-bottom: 50px;
            text-align: center;
        }

        .hero-section {
            background-color: #003366;
            color: white;
            padding: 60px 0;
            margin-top: 80px; 
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.3rem;
            margin-bottom: 20px;
        }

        .hero-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-custom {
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 5px;
            text-transform: uppercase;
        }

        df-messenger {
            z-index: 999;
            position: fixed;
            --df-messenger-font-color: #000;
            --df-messenger-font-family: Google Sans;
            --df-messenger-chat-background: #f3f6fc;
            --df-messenger-message-user-background: #d3e3fd;
            --df-messenger-message-bot-background: #fff;
            bottom: 16px;
            right: 16px;
        }

        @media (max-width: 768px) {
            header .navbar-brand {
                font-size: 1.5rem;
            }
            .hero-section h1 {
                font-size: 2rem;
            }
            .btn-custom {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#">CEPUNS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            <h1>Bienvenido a CEPUNS</h1>
            <p>Centro Preuniversitario de la Universidad Nacional del Santa</p>
            <img src="https://www.uns.edu.pe/recursos/sliders/58a2fc6ed39fd083f55d4182bf88826d.png" alt="Imagen Universidad" class="hero-image">
            <a href="#" class="btn btn-custom">Explora nuestros servicios</a>
        </div>
    </section>

    <main>
        <div class="container">
            <h2>Descubre nuestra oferta educativa</h2>
            <p>Te invitamos a conocer todos los programas educativos que tenemos para ti. ¡Tu futuro comienza aquí!</p>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Universidad Nacional del Santa - CEPUNS. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://www.gstatic.com/dialogflow-console/fast/df-messenger/prod/v1/df-messenger.js"></script>
    <df-messenger location="us-central1" project-id="appnube-436622" agent-id="52990510-e19d-4059-988b-69e9b2fff9ac"
        language-code="es" max-query-length="-1">
        <df-messenger-chat-bubble chat-title="cepuns-chatbot">
        </df-messenger-chat-bubble>
    </df-messenger>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>