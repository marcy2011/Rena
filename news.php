<?php
$language = isset($_GET['lang']) ? $_GET['lang'] : 'it';
$file = "news_{$language}.json";
$newsList = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$newsList = array_reverse($newsList);
?>
<html>
<head>
    <title id="page-title">Rena - News</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Text+Me+One&display=swap" rel="stylesheet">
    <script>
        function translatePage(lang) {
            window.location.href = `news.php?lang=${lang}`;
        }

        function loadSavedLanguage() {
            const savedLang = localStorage.getItem('preferredLanguage');
            if (savedLang) {
                translatePage(savedLang);
            }
        }
    </script>
    <style>
        a,
        button {
            cursor: url('cursore.png'), pointer;
        }

        body {
            cursor: url('cursore.png'), pointer;
        }
    </style>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: 'Open Sauce', sans-serif;
        }

        .header-nav-link {
            color: white !important;
        }

        .header-nav-item {
            display: inline-block;
            margin-right: 10px;
            position: relative;
        }

        .header-nav-link {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            transition: font-size 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .header-nav-item:hover .header-nav-link {
            font-size: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .page-header {
            display: flex;
            align-items: center;
        }

        .page-header {
            display: flex;
            align-items: center;
        }

        @media screen and (max-width: 767px) {
            .header-nav {
                display: none;
            }

            .header-logo {
                width: 50px;
                position: absolute;
                top: 0;
                left: 0;
            }

            .menu-icon {
                width: 50px;
                position: absolute;
                top: 0;
                right: 0;
                margin-top: 30px;
            }
        }

        @media screen and (min-width: 768px) {
            .menu-icon {
                display: none;
            }
        }
    </style>
</head>

<body>
    <header class="page-header">
        <div class="header-logo">
            <a class="header-brand" href="https://rena.altervista.org">
                <span class="rena-text">RENA</span>
            </a>
        </div>
        <style>
            .rena-text {
                font-family: 'Text Me One', sans-serif;
                font-size: 1.2em;
                color: white;
                text-decoration: underline;
                text-decoration-color: black;
                display: block;
                padding: 15px;
                transition: transform 0.3s ease;
                margin-right: 20px;
            }

            .header-logo:hover .rena-text {
                transform: translateY(-5px);
            }

            @media screen and (max-width: 767px) {
                .rena-text {
                    font-size: 0.7em;
                    padding: 10px;
                    margin-top: 40px;
                    margin-left: 10px;
                    position: relative;
                    left: 0;
                }
            }
        </style>
        <div class="header-nav">
            <ul class="nav">
                <li class="header-nav-item"><a class="header-nav-link ripple ripple-dark"
                        href="https://rena.altervista.org">Home</a></li>
                <li class="header-nav-item"><a class="header-nav-link ripple ripple-dark"
                        href="https://rena.altervista.org/privacy-policy.html">Privacy Policy</a></li>
                <li class="header-nav-item"><a class="header-nav-link ripple ripple-dark"
                        href="https://rena.altervista.org/chi-siamo.html" data-translate-it="Chi Siamo"
                        data-translate-en="About Us">Chi Siamo</a></li>
                <li class="header-nav-item"><a class="header-nav-link ripple ripple-dark"
                        href="https://rena.altervista.org/news.php">News</a></li>
            </ul>
        </div>
        <a href="https://rena.altervista.org/menu.html">
            <img src="https://gamecloudservices.altervista.org/menuaperto.png" alt="Menu" class="menu-icon">
        </a>

        <div id="custom-menu">
            <ul>
                <li><a href="https://rena.altervista.org"><img src="https://gcsapp.altervista.org/homebanner.png"
                            alt="Image 1" width="20"><span>Home</span></a></li>
                <li><a href="https://rena.altervista.org/privacy-policy.html" class="has-svg">
                        <svg class="custom-menu-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span>Privacy Policy</span>
                    </a></li>
                <li><a href="https://rena.altervista.org/chi-siamo.html" class="has-svg">
                        <svg class="custom-menu-svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" fill="#ffffff"
                            stroke="#ffffff">
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
                    </a></li>
            </ul>
        </div>
        <style>
            .custom-menu-svg {
                width: 22px;
                height: 22px;
                max-width: 100%;
                max-height: 100%;
            }
        </style>
        <style>
            #custom-menu {
                display: none;
                position: absolute;
                background-color: rgba(0, 0, 0, 0.8);
                border-radius: 10px;
                padding: 10px;
                backdrop-filter: blur(5px);
                z-index: 99999999;
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

            #custom-menu ul li a.has-svg span {
                margin-left: 10px;
            }
        </style>
        <script>
            document.addEventListener('contextmenu', function (event) {
                event.preventDefault();
                if (window.innerWidth > 768) {
                    var customMenu = document.getElementById('custom-menu');
                    customMenu.style.display = 'block';
                    customMenu.style.left = event.pageX + 'px';
                    customMenu.style.top = event.pageY + 'px';
                }
            });

            document.addEventListener('click', function (event) {
                var customMenu = document.getElementById('custom-menu');
                customMenu.style.display = 'none';
            });

        </script>
        <style>
            ::selection {
                background-color: white;
                color: black;
            }
        </style>
        <script>
            document.getElementById('lingua').addEventListener('click', function () {
                var img = this;
                var currentLang = img.getAttribute('data-lang') || 'it';
                var newLang = currentLang === 'it' ? 'en' : 'it';

                translatePage(newLang);
            });
        </script>
        <div id="language-popup" class="language-popup">
            <span id="close-popup" class="close-popup">&times;</span>
            <button class="language-btn" data-lang="it">Italiano</button>
            <button class="language-btn" data-lang="en">English</button>
        </div>
        <script>
            document.getElementById('lingua').addEventListener('click', function (event) {
                event.stopPropagation();
                var languagePopup = document.getElementById('language-popup');
                languagePopup.style.display = 'block';
                languagePopup.style.left = '50%';
                languagePopup.style.top = '50%';
                languagePopup.style.transform = 'translate(-50%, -50%)';
            });

            document.getElementById('close-popup').addEventListener('click', function () {
                document.getElementById('language-popup').style.display = 'none';
            });

            document.addEventListener('click', function (event) {
                var languagePopup = document.getElementById('language-popup');
                if (event.target !== languagePopup && !languagePopup.contains(event.target)) {
                    languagePopup.style.display = 'none';
                }
            });

            document.querySelectorAll('.language-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var lang = this.getAttribute('data-lang');
                    translatePage(lang);
                    document.getElementById('language-popup').style.display = 'none';
                });
            });
        </script>
        <style>
            #lingua {
                cursor: pointer;
                width: 30px;
                position: absolute;
                top: 12px;
                right: 57px;
                transform: translateX(50%);
                border-radius: 20px;
            }

            @media screen and (max-width: 600px) {
                #lingua {
                    margin-top: 30px;
                    right: 50%;
                }
            }
        </style>
        <img id="lingua" src="<?= $language === 'it' ? 'https://renadeveloper.altervista.org/bandierait.png' : 'https://renadeveloper.altervista.org/bandieraen.png' ?>" alt="Lingua"
            data-alt-src="<?= $language === 'it' ? 'https://renadeveloper.altervista.org/bandieraen.png' : 'https://renadeveloper.altervista.org/bandierait.png' ?>"
            data-lang="<?= $language ?>">
        <div id="language-popup" class="language-popup">
            <span id="close-popup" class="close-popup">&times;</span>
            <button class="language-btn" data-lang="it">Italiano</button>
            <button class="language-btn" data-lang="en">English</button>
        </div>
<script>
    function translatePage(lang) {
        const currentLang = new URL(window.location.href).searchParams.get('lang') || 'it';
        if (currentLang !== lang) {
            localStorage.setItem('preferredLanguage', lang);
            window.location.href = `news.php?lang=${lang}`;
        }
    }

    document.getElementById('lingua').addEventListener('click', function (event) {
        event.stopPropagation();
        const languagePopup = document.getElementById('language-popup');
        languagePopup.style.display = 'block';
        languagePopup.style.left = '50%';
        languagePopup.style.top = '50%';
        languagePopup.style.transform = 'translate(-50%, -50%)';
    });

    document.getElementById('close-popup').addEventListener('click', function () {
        document.getElementById('language-popup').style.display = 'none';
    });

    document.addEventListener('click', function (event) {
        const languagePopup = document.getElementById('language-popup');
        if (event.target !== languagePopup && !languagePopup.contains(event.target)) {
            languagePopup.style.display = 'none';
        }
    });

    document.querySelectorAll('.language-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const lang = this.getAttribute('data-lang');
            translatePage(lang);
        });
    });
</script>
<script>
    function translatePage(lang) {
        const currentLang = new URL(window.location.href).searchParams.get('lang') || 'it';
        if (currentLang !== lang) {
            localStorage.setItem('preferredLanguage', lang);
            window.location.href = `news.php?lang=${lang}`;
        }
    }

    function translateElements(lang) {
        document.querySelectorAll('[data-translate-it]').forEach(element => {
            const textIt = element.getAttribute('data-translate-it');
            const textEn = element.getAttribute('data-translate-en');
            element.textContent = lang === 'it' ? textIt : textEn;
        });
    }

    function loadSavedLanguage() {
        const savedLang = localStorage.getItem('preferredLanguage');
        const currentLang = new URL(window.location.href).searchParams.get('lang') || 'it';
        if (savedLang && savedLang !== currentLang) {
            translatePage(savedLang);
        } else {
            translateElements(currentLang);
        }
    }

    document.addEventListener('DOMContentLoaded', loadSavedLanguage);
</script>
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
        </style>
    </header>
    <div style="width: 50%; height: 20px;"></div>
    <main>
        <div class="container">
            <h1 data-translate-it="News" data-translate-en="News">News</h1>
            
            <div class="news-grid">
<?php
$language = isset($_GET['lang']) ? $_GET['lang'] : 'it';
$file = "news_{$language}.json";
$newsList = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$newsList = array_reverse($newsList);

if (empty($newsList)) {
    echo '<p data-translate-it="Nessuna news disponibile al momento." data-translate-en="No news available at the moment.">Nessuna news disponibile al momento.</p>';
} else {
    foreach ($newsList as $index => $news) {
        ?>
        <article class="news-item">
            <div class="news-image">
                <img src="<?= htmlspecialchars($news['cover']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" class="news-cover">
            </div>
            <div class="news-content">
                <h2 class="news-title"><?= htmlspecialchars($news['title']) ?></h2>
                <p class="news-excerpt"><?= htmlspecialchars(substr($news['content'], 0, 150) . (strlen($news['content']) > 150 ? '...' : '')) ?></p>
<a href="view-news.php?id=<?= count($newsList) - 1 - $index ?>&lang=<?= $language ?>">
    <button class="read-more" data-translate-it="Leggi di più" data-translate-en="Read more">Leggi di più</button>
</a>
            </div>
        </article>
        <?php
    }
}
?>
            </div>
        </div>
    </main>
    <style>
        :root {
            --primary-color: #000000;
            --text-color: #ffffff;
            --background-color: #000000;
            --card-background: rgba(255, 255, 255, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--background-color);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        main {
            padding: 20px 0;
        }

        h1 {
            color: var(--text-color);
            margin-bottom: 30px;
            font-size: 2.5em;
            text-align: center;
        }

        h2 {
            color: var(--text-color);
            margin: 20px 0;
            font-size: 2em;
        }

        h3 {
            color: var(--text-color);
            margin: 15px 0;
            font-size: 1.5em;
        }

        .language-selection {
            text-align: center;
            margin-bottom: 20px;
        }

        .lang-link {
            color: var(--text-color);
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .lang-link:hover, .lang-link.active {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .about-section {
            background-color: var(--card-background);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            margin-bottom: 30px;
        }

        .about-section p {
            margin-bottom: 15px;
        }

        .about-section ul {
            margin-bottom: 15px;
            padding-left: 20px;
        }

        .about-section li {
            margin-bottom: 10px;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
        }

        .section-header h2 {
            margin: 0;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2em;
            }

            h2 {
                font-size: 1.7em;
            }

            h3 {
                font-size: 1.3em;
            }

            .about-section,
            .contact-section {
                padding: 20px;
            }

            .section-header {
                gap: 10px;
            }

            .section-icon {
                width: 30px;
                height: 30px;
            }
        }

        h2 {
            font-size: 2em;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 1.17em;
            }
        }
    </style>

    <style>
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 20px 0;
        }

        .news-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .news-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .news-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .news-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-item:hover .news-cover {
            transform: scale(1.1);
        }

        .news-content {
            padding: 2rem;
        }

        .news-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: white;
            font-weight: 600;
        }

        .news-excerpt {
            font-size: 1rem;
            color: #cccccc;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .read-more {
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.05);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 25px;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 0.5px;
            width: 100%;
            margin: 0 auto;
            text-decoration: none;
            outline: none; 
        }

        .read-more:hover,
        .read-more:focus {
            text-decoration: none; 
        }

        a {
            text-decoration: none !important;
            outline: none !important;
        }

        .read-more:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        @media (max-width: 768px) {
            .news-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 10px;
            }

            .news-item {
                margin-bottom: 1rem;
            }

            .news-content {
                padding: 1.5rem;
            }

            .read-more {
                width: 100%;
            }
        }
    </style>
<script>
    function translatePage(lang) {
        const currentLang = new URL(window.location.href).searchParams.get('lang') || 'it';
        if (currentLang !== lang) {
            localStorage.setItem('preferredLanguage', lang);
            window.location.href = `news.php?lang=${lang}`;
        }
    }

    function loadSavedLanguage() {
        const savedLang = localStorage.getItem('preferredLanguage');
        const currentLang = new URL(window.location.href).searchParams.get('lang') || 'it';
        if (savedLang && savedLang !== currentLang) {
            translatePage(savedLang);
        }
    }

    document.addEventListener('DOMContentLoaded', loadSavedLanguage);
</script>
</body>
</html>
