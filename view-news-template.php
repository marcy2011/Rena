<?php
if (isset($newsItem) && !empty($newsItem)) {
    $title = $newsItem['title'];
    $cover = $newsItem['cover'];
    $content = $newsItem['content'];
} elseif (!isset($title) || !isset($cover) || !isset($content)) {
    die('News non trovata.');
}
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
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('lingua').addEventListener('click', function(event) {
        event.stopPropagation();
        var languagePopup = document.getElementById('language-popup');
        languagePopup.style.display = 'block';
        languagePopup.style.left = '50%';
        languagePopup.style.top = '50%';
        languagePopup.style.transform = 'translate(-50%, -50%)';
    });

    document.getElementById('close-popup').addEventListener('click', function() {
        document.getElementById('language-popup').style.display = 'none';
    });

    document.addEventListener('click', function(event) {
        var languagePopup = document.getElementById('language-popup');
        if (event.target !== languagePopup && !languagePopup.contains(event.target) && 
            event.target.id !== 'lingua') {
            languagePopup.style.display = 'none';
        }
    });

    document.querySelectorAll('.language-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var lang = this.getAttribute('data-lang');
            document.getElementById('language-popup').style.display = 'none';
            
            localStorage.setItem('preferredLanguage', lang);
            
            const url = new URL(window.location.href);
            url.searchParams.set('lang', lang);
            window.history.replaceState({}, '', url);
            
            window.location.reload();
        });
    });

    loadSavedLanguage();
});

function translatePage(lang, shouldReload = false) {
    const urlParams = new URLSearchParams(window.location.search);
    const currentLang = urlParams.get('lang');
    
    localStorage.setItem('preferredLanguage', lang);

    document.querySelectorAll('[data-translate-it]').forEach(function(el) {
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

    if (currentLang !== lang) {
        const url = new URL(window.location.href);
        url.searchParams.set('lang', lang);
        window.history.replaceState({}, '', url);
        
        if (shouldReload) {
            window.location.reload();
        }
    }
}

function loadSavedLanguage() {
    const urlParams = new URLSearchParams(window.location.search);
    const urlLang = urlParams.get('lang');
    
    if (urlLang === 'it' || urlLang === 'en') {
        translatePage(urlLang, false);
    } else {
        const savedLang = localStorage.getItem('preferredLanguage');
        if (savedLang) {
            translatePage(savedLang, false);
        } else {
            translatePage('it', false);
        }
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
        <img id="lingua" src="https://renadeveloper.altervista.org/bandierait.png" alt="Lingua"
            data-alt-src="https://renadeveloper.altervista.org/bandieraen.png">
        <script>
            document.getElementById('lingua').addEventListener('click', function () {
                var img = this;
                var currentLang = img.getAttribute('data-lang') || 'it';
                var newLang = currentLang === 'it' ? 'en' : 'it';

                translatePage(newLang);
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
        <div id="language-popup" class="language-popup">
            <span id="close-popup" class="close-popup">&times;</span>
            <button class="language-btn" data-lang="it">Italiano</button>
            <button class="language-btn" data-lang="en">English</button>
        </div>
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
        <article class="article-container">
            <div class="article-header">
            <div class="article-image">
                <img src="<?= htmlspecialchars($newsItem['cover']) ?>" alt="<?= htmlspecialchars($newsItem['title']) ?>">
            </div>
            <h1 class="article-title"><?= htmlspecialchars($newsItem['title']) ?></h1>
                <button id="desktop-share-button" class="share-button desktop-only" onclick="shareArticle()">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                        <g id="SVGRepo_iconCarrier">
                            <path d="M9.61109 12.4L10.8183 18.5355C11.0462 19.6939 12.6026 19.9244 13.1565 18.8818L19.0211 7.84263C19.248 7.41555 19.2006 6.94354 18.9737 6.58417M9.61109 12.4L5.22642 8.15534C4.41653 7.37131 4.97155 6 6.09877 6H17.9135C18.3758 6 18.7568 6.24061 18.9737 6.58417M9.61109 12.4L18.9737 6.58417M19.0555 6.53333L18.9737 6.58417" stroke="#ffffff" stroke-width="2"></path>
                        </g>
                    </svg>
                    <span data-translate-it="Condividi" data-translate-en="Share">Condividi</span>
                </button>
            </div>
            <div class="article-content">
                <p><?= nl2br(htmlspecialchars($newsItem['content'])) ?></p>
            </div>
        </article>
        
        <button id="mobile-share-button" class="share-button mobile-only" onclick="shareArticle()">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                <g id="SVGRepo_iconCarrier">
                    <path d="M9.61109 12.4L10.8183 18.5355C11.0462 19.6939 12.6026 19.9244 13.1565 18.8818L19.0211 7.84263C19.248 7.41555 19.2006 6.94354 18.9737 6.58417M9.61109 12.4L5.22642 8.15534C4.41653 7.37131 4.97155 6 6.09877 6H17.9135C18.3758 6 18.7568 6.24061 18.9737 6.58417M9.61109 12.4L18.9737 6.58417M19.0555 6.53333L18.9737 6.58417" stroke="#ffffff" stroke-width="2"></path>
                </g>
            </svg>
            <span data-translate-it="Condividi" data-translate-en="Share">Condividi</span>
        </button>
    </div>
</main>
<style>
@media (min-width: 769px) {
    .share-button {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 10;
    }
    
    .container .share-button {
        position: absolute;
        top: 20px;
        right: 20px;
    }
    
    .article-header {
        position: relative;
    }
}

@media (max-width: 768px) {
    .share-button {
        position: static;
        width: calc(100% - 4rem);
        margin: 1rem auto 3rem;
        justify-content: center;
    }
}

@media (min-width: 769px) {
    .mobile-only {
        display: none !important;
    }
    
    .desktop-only {
        display: flex !important;
    }
}

@media (max-width: 768px) {
    .desktop-only {
        display: none !important;
    }
    
    .mobile-only {
        display: flex !important;
    }
}
</style>
<style>
    .share-button {
        display: flex;
        align-items: center;
        padding: 15px 25px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
        gap: 10px;
    }

    .share-button:hover {
        transform: translateY(-3px);
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .share-button svg {
        width: 24px;
        height: 24px;
    }

    .share-button span {
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    @media (min-width: 769px) {
        .share-button {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
        }
    }

    @media (max-width: 768px) {
        main {
            margin-top: 4rem;
        }
        
        .article-container {
            margin-bottom: 1rem;
            border-radius: 25px;
        }
        
        .article-image {
            height: 250px;
        }
        
        .article-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .article-content {
            font-size: 1rem;
        }
        
        .share-button {
            position: static;
            width: calc(100% - 4rem);
            margin: 1rem auto 3rem;
            justify-content: center;
        }
    }
</style>
<style>
    .article-container {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 25px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.1);
        margin: 2rem auto;
        max-width: 1000px;
        position: relative;
    }

    .article-header {
        position: relative;
        padding: 0; 
    }

    .article-image {
        width: 100%;
        height: 400px; 
        overflow: hidden;
        position: relative;
        margin: 0; 
    }

    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover; 
        display: block; 
    }

    .article-title {
        font-size: 2.5rem;
        color: white;
        font-weight: 600;
        margin: 20px 0;
        padding: 0 2rem; 
    }

    .article-content {
        padding: 0 2rem 2rem; 
        color: #cccccc;
        line-height: 1.8;
        font-size: 1.1rem;
    }

    @media (max-width: 768px) {
        main {
            margin-top: 4rem;
        }

        .article-container {
            margin-bottom: 0;
            display: flex;
            flex-direction: column;
        }

        .article-image {
            height: 250px; 
        }

        .article-title {
            font-size: 2rem; 
            margin: 10px 0; 
            padding: 0 1rem;
        }

        .article-content {
            font-size: 1rem;
            order: 3;
            padding: 0 1rem 2rem; 
        }
    }
</style>
    <script>
        function shareArticle() {
            if (navigator.share) {
                navigator.share({
                    title: document.querySelector('.article-title').textContent,
                    url: window.location.href
                })
                .catch(console.error);
            } else {
                const dummy = document.createElement('input');
                document.body.appendChild(dummy);
                dummy.value = window.location.href;
                dummy.select();
                document.execCommand('copy');
                document.body.removeChild(dummy);
                alert('Link copiato negli appunti!');
            }
        }
    </script>
</body>
</html>
