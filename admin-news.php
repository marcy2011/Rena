<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="styles.css">
    <title>Rena</title>
    <style>
        *:focus {
            outline: none;
        }

        button:focus,
        input:focus,
        textarea:focus {
            outline: none;
        }

        * {
            -webkit-tap-highlight-color: transparent;
        }

        body,
        p,
        h1,
        h2,
        h3,
        a,
        span {
            color: #ffffff;
            text-decoration: none;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }
    </style>
    <style>
        a,
        button {
            cursor: url('cursore.png'), default;
        }

        body {
            cursor: url('cursore.png'), default;
        }

        ::selection {
            background-color: white;
            color: black;
        }

        :root {
            --bg-color: #000000;
            --text-color: #ffffff;
            --accent-color: #ffffff;
            --glow-color: rgba(255, 255, 255, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sauce', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            background-image: url('background.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            cursor: dafault !important;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .hero-content {
            max-width: 800px;
            position: relative;
            z-index: 3;
        }

        .gradient-circle {
            position: absolute;
            width: 1500px;
            height: 1500px;
            background: radial-gradient(circle,
                    rgba(0, 0, 0, 1) 0%,
                    rgba(0, 0, 0, 0.9) 20%,
                    rgba(0, 0, 0, 0.8) 30%,
                    rgba(0, 0, 0, 0.6) 40%,
                    rgba(0, 0, 0, 0.4) 50%,
                    rgba(0, 0, 0, 0.2) 60%,
                    rgba(0, 0, 0, 0) 70%);
            z-index: 1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .hero-logo {
            position: relative;
            z-index: 2;
            max-width: 300px;
            margin-bottom: 20px;
            border-radius: 35px;
            filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.8));
        }

        .hero h1 {
            font-size: 60px;
            margin-bottom: 20px;
            text-shadow: 0 0 20px var(--glow-color);
        }

        .hero p {
            font-size: 2px;
            margin-bottom: 3px;
            text-shadow: 0 0 10px var(--glow-color);
        }

        .cta-button {
            display: inline-block;
            background-color: var(--accent-color);
            color: var(--bg-color);
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 700;
            font-size: 18px;
            transition: all 0.3s ease;
            box-shadow: 0 0 20px var(--glow-color), 0 0 15px rgba(0, 0, 0, 0.8);
            position: relative;
            z-index: 2;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 30px var(--glow-color);
        }

        .features {
            padding: 100px 0;
        }

        .features h2 {
            text-align: center;
            font-size: 40px;
            margin-bottom: 60px;
            text-shadow: 0 0 15px var(--glow-color);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .feature-card {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.2);
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 0 0 15px var(--glow-color);
        }

        .feature-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        #pc-space {
            display: none;
        }

        @media (min-width: 1024px) {
            #pc-space {
                display: block;
            }
        }

        .support-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .support-card {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 40px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }

        .support-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.2);
        }

        .support h2 {
            text-align: center;
            font-size: 40px;
            margin-bottom: 60px;
            text-shadow: 0 0 15px var(--glow-color);
        }

        @media (min-width: 768px) {
            .support-card {
                display: flex;
                align-items: center;
                text-align: left;
                padding: 30px;
            }

            .support-icon {
                margin-right: 40px;
                margin-bottom: 0;
                flex-shrink: 0;
            }

            .support-card-content {
                flex-grow: 1;
            }
        }

        @media (max-width: 767px) {
            .support-card {
                text-align: center;
            }

            .support-icon {
                margin-bottom: 20px;
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        .glow-text {
            text-shadow: 0 0 10px var(--glow-color);
        }

        #custom-menu {
            display: none;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            padding: 10px;
            backdrop-filter: blur(5px);
            z-index: 1000;
        }

        #custom-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #custom-menu ul li {
            margin-bottom: 10px;
        }

        #custom-menu ul li a {
            display: flex;
            align-items: center;
            color: #fff;
            text-decoration: none;
        }

        #custom-menu ul li a img {
            margin-right: 10px;
            border-radius: 5px;
        }

        #custom-menu ul li a span {
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 45px;
            }

            .gradient-circle {
                position: absolute;
                width: 550px;
                height: 550px;
                background: radial-gradient(circle,
                        rgba(0, 0, 0, 1) 0%,
                        rgba(0, 0, 0, 0.9) 20%,
                        rgba(0, 0, 0, 0.8) 30%,
                        rgba(0, 0, 0, 0.6) 40%,
                        rgba(0, 0, 0, 0.4) 50%,
                        rgba(0, 0, 0, 0.2) 60%,
                        rgba(0, 0, 0, 0) 70%);
                z-index: 1;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .hero-logo {
                position: relative;
                z-index: 2;
                max-width: 200px;
                margin-bottom: 20px;
                border-radius: 35px;
                filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.8));
            }
        }
    </style>
    <style>
        #lingua {
            cursor: pointer;
            width: 30px;
            position: absolute;
            top: 20px;
            right: 57px;
            transform: translateX(50%);
            border-radius: 20px;
            z-index: 200;
        }

        @media screen and (max-width: 600px) {
            #lingua {
                margin-top: 30px;
                right: 50%;
            }
        }
    </style>
    <style>
        .language-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            z-index: 1000;
            text-align: center;
        }

        .language-btn {
            margin: 20px;
            padding: 10px 20px;
            background-color: #ffffff;
            color: black;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .language-popup .language-btn {
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #ffffff;
            color: black;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            display: block;
        }

        .language-btn:hover {
            background-color: black;
            color: white;
        }

        .close-popup {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <img id="lingua" src="https://renadeveloper.altervista.org/bandierait.png" alt="Lingua"
        data-alt-src="https://renadeveloper.altervista.org/bandieraen.png">
    <div id="language-popup" class="language-popup">
        <span id="close-popup" class="close-popup">×</span>
        <button class="language-btn" data-lang="it">Italiano</button>
        <button class="language-btn" data-lang="en">English</button>
    </div>
    <div id="anniversary-popup" class="popup-overlay" style="display: none;">
        <div class="popup">
            <button class="close-btn">×</button>
            <div class="cake-icon">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path opacity="0.1"
                            d="M8.656 9C6.46878 9 6 9.46878 6 11.656V12.5C6 12.7761 6.22386 13 6.5 13H17.5C17.7761 13 18 12.7761 18 12.5V11.656C18 9.46878 17.5312 9 15.344 9H8.656Z"
                            fill="#ffffff"></path>
                        <path
                            d="M3 15.9248C3 13.5162 3.51623 13 5.9248 13H18.0752C20.4838 13 21 13.5162 21 15.9248V18.0752C21 20.4838 20.4838 21 18.0752 21H5.9248C3.51623 21 3 20.4838 3 18.0752V15.9248Z"
                            stroke="#ffffff" stroke-width="2"></path>
                        <path d="M6 13V11.656C6 9.46878 6.46878 9 8.656 9H15.344C17.5312 9 18 9.46878 18 11.656V13"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path>
                        <path d="M9 9V7" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M9 3.5V3" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M15 9V7" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M15 3.5V3" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M12 9V7" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M12 3.5V3" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M3 16.0397C3.30926 16.0122 3.63847 16 4 16C5.61017 16 6.38983 17 8 17C9.61017 17 10.3898 16 12 16C13.6102 16 14.3898 17 16 17C17.6102 17 18.3898 16 20 16C20.3615 16 20.6907 16.0122 21 16.0397"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path opacity="0.1"
                            d="M21 16.2897C20.9927 16.2897 20.9853 16.2894 20.9778 16.2887C20.6776 16.262 20.356 16.25 20 16.25C19.2504 16.25 18.6947 16.4803 18.0965 16.7306L18.0856 16.7352C17.4921 16.9836 16.8553 17.25 16 17.25C15.1447 17.25 14.5079 16.9836 13.9144 16.7352L13.9035 16.7306C13.3053 16.4803 12.7496 16.25 12 16.25C11.2504 16.25 10.6947 16.4803 10.0965 16.7306L10.0856 16.7352C9.49208 16.9836 8.85535 17.25 8 17.25C7.14465 17.25 6.50792 16.9836 5.91436 16.7352L5.9035 16.7306C5.30525 16.4803 4.74961 16.25 4 16.25C3.64399 16.25 3.32239 16.262 3.02216 16.2887C3.01472 16.2894 3.00733 16.2897 3 16.2897V18.0752C3 20.4838 3.51623 21 5.9248 21H18.0752C20.4838 21 21 20.4838 21 18.0752V16.2897Z"
                            fill="#ffffff"></path>
                    </g>
                </svg>
            </div>
            <h2 data-translate-it="Buon 5° Anniversario!" data-translate-en="Happy 5th Anniversary!" style="white-space: nowrap;">Buon 5° Anniversario!</h2>
            <p data-translate-en="Today, March 21, 2025, Rena turns 5 years old!" data-translate-it="Oggi, 21 marzo 2025, Rena compie 5 anni!">Oggi, 21 marzo 2025, Rena festeggia 5 anni!</p>
        </div>
    </div>
    <main>
        <section class="hero">
            <div class="hero-content">
                <div class="gradient-circle"></div>
                <img src="glowlogo.png" alt="Logo" class="hero-logo">
            </div>
        </section>

        <section id="features" class="features">
            <div class="container">
                <h2 class="glow-text" data-translate-it="Servizi" data-translate data-translate-en="Services">Servizi
                </h2>
                <div class="feature-grid">
                    <a href="https://renadeveloper.altervista.org" class="feature-card floating-element">
                        <div class="feature-icon">
                            <img src="https://renadeveloper.altervista.org/logo.png" alt="Rena Developer Logo"
                                style="width: 100px; border-radius: 20px; height: auto;">
                        </div>
                        <h3 class="glow-text">Rena Developer</h3>
                        <p data-translate-it="Crea siti web con HTML, CSS e JavaScript direttamente nel tuo browser"
                            data-translate
                            data-translate-en="Create websites with HTML, CSS, and JavaScript directly in your browser">
                            Crea siti web
                            con HTML, CSS e JavaScript direttamente nel tuo browser</p>
                    </a>

                    <a href="https://renastore.altervista.org" class="feature-card floating-element">
                        <div class="feature-icon">
                            <img src="https://renastore.altervista.org/logo.png" alt="Rena Store Logo"
                                style="width: 100px; border-radius: 20px; height: auto;">
                        </div>
                        <h3 class="glow-text">Rena Store</h3>
                        <p data-translate-it="Scarica app FOSS per Android o Windows" data-translate
                            data-translate-en="Download FOSS apps for Android or Windows">Scarica app FOSS per Android o
                            Windows</p>
                    </a>

                    <a href="https://renaarcade.altervista.org" class="feature-card floating-element">
                        <div class="feature-icon">
                            <img src="https://gamecloudservices.altervista.org/logo.jpg" alt="Rena Arcades Logo"
                                style="width: 100px; border-radius: 20px; height: auto;">
                        </div>
                        <h3 class="glow-text">Rena Arcades</h3>
                        <p data-translate-it="Gioca direttamente sul tuo browser senza bisogno di nessun download"
                            data-translate data-translate-en="Play directly in your browser with no download required">
                            Gioca direttamente sul tuo
                            browser senza bisogno di nessun download</p>
                    </a>
                </div>
            </div>
            <div id="pc-space" style="width: 50%; height: 115px;"></div>
        </section>

        <section id="support" class="support">
            <div class="container">
                <h2 class="glow-text" data-translate-it="Supporto" data-translate data-translate-en="Support"
                    style="margin-top: -100px;">Supporto</h2>
                <div class="support-grid">
                    <a href="https://renasupporto.altervista.org" class="feature-card floating-element support-card">
                        <div class="support-icon">
                            <img src="https://renasupporto.altervista.org/icon.jpg" alt="Rena Supporto Logo"
                                style="width: 100px; border-radius: 20px; height: auto;">
                        </div>
                        <div class="support-card-content">
                            <h3 class="glow-text" data-translate-it="Rena Supporto" data-translate
                                data-translate-en="Rena Support">
                                Rena Supporto</h3>
                            <p data-translate-it="Contatta l'assistenza di Rena per qualsiasi problema" data-translate
                                data-translate-en="Contact Rena Support for any problem">Contatta l'assistenza di Rena
                                per qualsiasi
                                problema</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

    <section class="social-banner">
      <div class="container">
        <div class="banner-section">
          <h2 class="glow-text" data-translate-it="Social Media" data-translate data-translate-en="Social Media">Social
            Media</h2>
          <div class="social-grid">
            <a href="https://www.instagram.com/renaofficialtech" class="social-link floating-element" target="_blank">
              <div class="social-icon-wrapper">
                <svg class="social-icon" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
              </div>
              <span>Instagram</span>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61556113467070" class="social-link floating-element"
              target="_blank">
              <div class="social-icon-wrapper">
                <svg class="social-icon" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
              </div>
              <span>Facebook</span>
            </a>
            <a href="https://www.threads.net/@renaofficialtech" class="social-link floating-element" target="_blank">
              <div class="social-icon-wrapper">
                <svg class="social-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24">
                  <path fill="white"
                    d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.698 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 0 1 3.02.142c-.126-.742-.375-1.332-.75-1.757-.513-.586-1.308-.883-2.359-.89h-.029c-.844 0-1.992.232-2.721 1.32L7.734 7.847c.98-1.454 2.568-2.256 4.478-2.256h.044c3.194.02 5.097 1.975 5.287 5.388.108.046.216.094.321.142 1.49.7 2.58 1.761 3.154 3.07.797 1.82.871 4.79-1.548 7.158-1.85 1.81-4.094 2.628-7.277 2.65Zm1.003-11.69c-.242 0-.487.007-.739.021-1.836.103-2.98.946-2.916 2.143.067 1.256 1.452 1.839 2.784 1.767 1.224-.065 2.818-.543 3.086-3.71a10.5 10.5 0 0 0-2.215-.221z" />
                </svg>
              </div>
              <span>Threads</span>
            </a>
            <a href="https://mastodon.social/@Renaofficial" class="social-link floating-element" target="_blank">
              <div class="social-icon-wrapper">
                <svg class="social-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24">
                  <path fill="white"
                    d="M23.268 5.313c-.35-2.578-2.617-4.61-5.304-5.004C17.51.242 15.792 0 11.813 0h-.03c-3.98 0-4.835.242-5.288.309C3.882.692 1.496 2.518.917 5.127.64 6.412.61 7.837.661 9.143c.074 1.874.088 3.745.26 5.611.118 1.24.325 2.47.62 3.68.55 2.237 2.777 4.098 4.96 4.857 2.336.792 4.849.923 7.256.38.265-.061.527-.132.786-.213.585-.184 1.27-.39 1.774-.753a.057.057 0 0 0 .023-.043v-1.809a.052.052 0 0 0-.02-.041.053.053 0 0 0-.046-.01 20.282 20.282 0 0 1-4.709.545c-2.73 0-3.463-1.284-3.674-1.818a5.593 5.593 0 0 1-.319-1.433.053.053 0 0 1 .066-.054c1.517.363 3.072.546 4.632.546.376 0 .75 0 1.125-.01 1.57-.044 3.224-.124 4.768-.422.038-.008.077-.015.11-.024 2.435-.464 4.753-1.92 4.989-5.604.008-.145.03-1.52.03-1.67.002-.512.167-3.63-.024-5.545zm-3.748 9.195h-2.561V8.29c0-1.309-.55-1.976-1.67-1.976-1.23 0-1.846.79-1.846 2.35v3.403h-2.546V8.663c0-1.56-.617-2.35-1.848-2.35-1.112 0-1.668.668-1.67 1.977v6.218H4.822V8.102c0-1.31.337-2.35 1.011-3.12.696-.77 1.608-1.164 2.74-1.164 1.311 0 2.302.5 2.962 1.498l.638 1.06.638-1.06c.66-.999 1.65-1.498 2.96-1.498 1.13 0 2.043.395 2.74 1.164.675.77 1.012 1.81 1.012 3.12z" />
                </svg>
              </div>
              <span>Mastodon</span>
            </a>

            <a href="https://www.tiktok.com/@renatechnology" class="social-link floating-element" target="_blank">
              <div class="social-icon-wrapper">
                <svg class="social-icon" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                </svg>
              </div>
              <span>TikTok</span>
            </a>
          </div>
        </div>

        <div class="banner-section">
          <h2 class="glow-text" data-translate-it="Supportaci" data-translate data-translate-en="Support Us">Supportaci
          </h2>
          <div class="social-grid">
            <a href="https://github.com/marcy2011" class="social-link floating-element" target="_blank">
              <div class="social-icon-wrapper">
                <svg class="social-icon" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                </svg>
              </div>
              <span>GitHub</span>
            </a>
            <a href="https://t.me/renatechnology" class="social-link floating-element" target="_blank">
              <div class="social-icon-wrapper">
                <svg class="social-icon" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
              </path>
            </svg>
              </div>
              <span>Telegram</span>
            </a>
            <a href="https://ko-fi.com/renatechnology" class="social-link floating-element" target="_blank">
              <div class="social-icon-wrapper">
                <svg class="social-icon" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M23.881 8.948c-.773-4.085-4.859-4.593-4.859-4.593H.723c-.604 0-.679.798-.679.798s-.082 7.324-.022 11.822c.164 2.424 2.586 2.672 2.586 2.672s8.267-.023 11.966-.049c2.438-.426 2.683-2.566 2.658-3.734 4.352.24 7.422-2.831 6.649-6.916zm-11.062 3.511c-1.246 1.453-4.011 3.976-4.011 3.976s-.121.119-.31.023c-.076-.057-.108-.09-.108-.09-.443-.441-3.368-3.049-4.034-3.954-.709-.965-1.041-2.7-.091-3.71.951-1.01 3.005-1.086 4.363.407 0 0 1.565-1.782 3.468-.963 1.904.82 1.832 3.011.723 4.311zm6.173.478c-.928.116-1.682.028-1.682.028V7.284h1.77s1.971.551 1.971 2.638c0 1.913-.985 2.667-2.059 3.015z" />
                </svg>
              </div>
              <span>Ko-fi</span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
  <style>
    .social-banner {
      padding: 50px 0;
      background-color: black;
    }

    .banner-section {
      margin-bottom: 40px;
    }

    .banner-section:last-child {
      margin-bottom: 0;
    }

    .banner-section h2 {
      text-align: center;
      font-size: 32px;
      margin-bottom: 30px;
    }

    .social-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 20px;
      max-width: 1000px;
      margin: 0 auto;
    }

    .social-link {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 15px;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      transition: all 0.3s ease;
      text-decoration: none;
      color: white;
    }

    .social-link:hover {
      transform: translateY(-3px);
      background-color: rgba(255, 255, 255, 0.2);
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
    }

    .social-icon {
      width: 24px;
      height: 24px;
      margin-right: 10px;
    }

    .social-link span {
      font-size: 16px;
    }

    @media (max-width: 768px) {
      .social-grid {
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
      }

      .social-link {
        flex-direction: column;
        text-align: center;
      }

      .social-icon {
        margin-right: 0;
        margin-bottom: 8px;
      }
    }

    .social-banner {
      padding: 80px 0;
      background-color: black;
    }

    .banner-section {
      margin-bottom: 60px;
    }

    .banner-section:last-child {
      margin-bottom: 0;
    }

    .banner-section h2 {
      text-align: center;
      margin-bottom: 40px;
      letter-spacing: 2px;
      font-size: 40px;
    }

    .social-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 25px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .social-link {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      transition: all 0.3s ease;
      text-decoration: none;
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.1);
      position: relative;
      overflow: hidden;
    }

    .social-link::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg,
          transparent,
          rgba(255, 255, 255, 0.1),
          transparent);
      transition: 0.5s;
    }

    .social-link:hover::before {
      left: 100%;
    }

    .social-link:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.1);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      border-color: rgba(255, 255, 255, 0.2);
    }

    .social-icon-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      margin-right: 15px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      transition: all 0.3s ease;
    }

    .social-icon {
      width: 24px;
      height: 24px;
      transition: all 0.3s ease;
    }

    .social-link:hover .social-icon-wrapper {
      background: rgba(255, 255, 255, 0.2);
      transform: rotate(5deg);
    }

    .social-link span {
      font-size: 16px;
      font-weight: 500;
      letter-spacing: 0.5px;
    }

    @media (max-width: 768px) {
      .social-grid {
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 15px;
      }

      .social-link {
        flex-direction: column;
        text-align: center;
        padding: 15px;
      }

      .social-icon-wrapper {
        margin-right: 0;
        margin-bottom: 10px;
      }
    }

    .social-icon {
      display: block;
      margin: 0 auto;
    }

    @media (hover: hover) {
      .social-link:hover .social-icon {
        transform: scale(1.1);
      }
    }
  </style>
    <div style="width: 50%; height: 115px;"></div>
    <footer class="site-footer">
        <div class="footer-buttons">
            <a href="https://rena.altervista.org/privacy-policy.html" class="footer-button">
                <svg class="footer-button-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span>Privacy Policy</span>
            </a>
            <a href="https://rena.altervista.org/chi-siamo.html" class="footer-button">
                <svg class="footer-button-svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" fill="#ffffff" stroke="#ffffff">
                    <g>
                        <path class="st0"
                            d="M256,265.308c73.252,0,132.644-59.391,132.644-132.654C388.644,59.412,329.252,0,256,0 c-73.262,0-132.643,59.412-132.643,132.654C123.357,205.917,182.738,265.308,256,265.308z">
                        </path>
                        <path class="st0"
                            d="M425.874,393.104c-5.922-35.474-36-84.509-57.552-107.465c-5.829-6.212-15.948-3.628-19.504-1.427 c-27.04,16.672-58.782,26.399-92.819,26.399c-34.036,0-65.778-9.727-92.818-26.399c-3.555-2.201-13.675-4.785-19.505,1.427 c-21.55,22.956-51.628,71.991-57.551,107.465C71.573,480.444,164.877,512,256,512C347.123,512,440.427,480.444,425.874,393.104z">
                        </path>
                    </g>
                </svg>
                <span data-translate-it="Chi Siamo" data-translate-en="About Us">Chi Siamo</span>
            </a>
        </div>
    </footer>

    <style>
        .site-footer {
            background: black;
            padding: 20px 0;
            margin-top: -115px;
        }

        .footer-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-button {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-button:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .footer-button-svg {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .footer-button span {
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        @media (max-width: 600px) {
            .footer-buttons {
                flex-direction: column;
                align-items: center;
            }

            .footer-button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
    <style>
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(31, 31, 31, 0.85);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(5px);
            opacity: 0;
            transform: scale(0.95);
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .popup-overlay.show {
            opacity: 1;
            transform: scale(1);
        }

        .popup {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            position: relative;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: white;
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            padding: 0;
            line-height: 1;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(5px);
        }

        .close-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const languagePopup = document.getElementById('language-popup');
            const closePopupBtn = document.getElementById('close-popup');
            const languageButtons = document.querySelectorAll('.language-btn');
            const languageIcon = document.getElementById('lingua');

            languageIcon.addEventListener('click', () => {
                languagePopup.style.display = 'block';
            });

            closePopupBtn.addEventListener('click', () => {
                languagePopup.style.display = 'none';
            });

            languageButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const lang = button.getAttribute('data-lang');
                    translatePage(lang);
                    languagePopup.style.display = 'none';
                });
            });

            const anniversaryPopup = document.getElementById('anniversary-popup');
            if (anniversaryPopup) {
                setTimeout(showPopup, 500);

                anniversaryPopup.addEventListener('click', (e) => {
                    if (e.target === anniversaryPopup) {
                        closePopup();
                    }
                });

                const closeBtn = anniversaryPopup.querySelector('.close-btn');
                if (closeBtn) {
                    closeBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        closePopup();
                    });
                }
            }
        });

        function showPopup() {
            const popup = document.getElementById('anniversary-popup');
            if (popup) {
                popup.style.display = 'flex';
                void popup.offsetWidth;
                popup.classList.add('show');
            }
        }

        function closePopup() {
            const popup = document.getElementById('anniversary-popup');
            if (popup) {
                popup.classList.remove('show');
                popup.addEventListener('transitionend', function handler() {
                    popup.style.display = 'none';
                    popup.removeEventListener('transitionend', handler);
                });
            }
        }

        function translatePage(lang) {
            localStorage.setItem('preferredLanguage', lang);

            document.querySelectorAll('[data-translate-it]').forEach(function (el) {
                if (lang === 'it') {
                    el.textContent = el.getAttribute('data-translate-it');
                } else if (lang === 'en') {
                    el.textContent = el.getAttribute('data-translate-en');
                }
            });

            const imgElement = document.getElementById('lingua');
            if (lang === 'it') {
                imgElement.src = 'https://renadeveloper.altervista.org/bandierait.png';
                imgElement.setAttribute('data-alt-src', 'https://renadeveloper.altervista.org/bandieraen.png');
                imgElement.setAttribute('data-lang', 'it');
            } else if (lang === 'en') {
                imgElement.src = 'https://renadeveloper.altervista.org/bandieraen.png';
                imgElement.setAttribute('data-alt-src', 'https://renadeveloper.altervista.org/bandierait.png');
                imgElement.setAttribute('data-lang', 'en');
            }
        }

        function loadSavedLanguage() {
            const savedLang = localStorage.getItem('preferredLanguage');
            if (savedLang) {
                translatePage(savedLang);
            }
        }

        document.addEventListener('DOMContentLoaded', loadSavedLanguage);
    </script>
</body>
</html>
