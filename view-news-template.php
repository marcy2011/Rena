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
    <link href="https://api.fontshare.com/v2/css?f[]=open-sauce-one@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: black;
            color: white;
            font-family: 'Open Sauce One', sans-serif;
            min-height: 100vh;
            cursor: url('cursore.png'), auto;
        }

        .floating-navbar {
            position: fixed;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            max-width: 1000px;
            z-index: 1000;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .floating-navbar:hover {
            background: rgba(0, 0, 0, 0.4);
            transform: translateX(-50%) translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            flex-shrink: 0;
        }

        .header-brand {
            text-decoration: none;
        }

        .header-brand:hover {
            transform: none;
        }

        .rena-text {
            font-family: 'Text Me One', sans-serif;
            font-size: 2.0em;
            color: white;
            text-decoration: none;
            font-weight: normal;
            letter-spacing: 2px;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            line-height: 1;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 30px;
            flex: 1;
            justify-content: center;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
            line-height: 1;
        }

        .nav-link::before {
            display: none;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 2px 8px rgba(255, 255, 255, 0.2);
        }

        .navbar-account {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-shrink: 0;
        }

        .account-menu {
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: none;
        }

        .menu-icon {
            width: 28px;
            height: 28px;
            transition: none;
            display: block;
        }

        .menu-icon path {
            transition: none;
        }

        .profile-menu-container {
            position: relative;
            z-index: 200;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #profile-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .profile-pic:hover {
            transform: scale(1.1);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .default-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            font-weight: 600;
            border: 2px solid rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .profile-menu {
            display: none;
            position: absolute;
            top: 65px;
            right: -15px;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 15px;
            width: 200px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-menu.active {
            display: block;
        }

        .profile-menu-item {
            display: flex;
            align-items: center;
            padding: 10px;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-bottom: 5px;
        }

        .profile-menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .profile-menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .profile-menu-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 10px 0;
        }

        .language-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .language-option:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .language-option.active {
            background: rgba(255, 255, 255, 0.15);
        }

        .language-content {
            display: flex;
            align-items: center;
        }

        .language-flag {
            width: 20px;
            height: 15px;
            margin-right: 10px;
            border-radius: 3px;
        }

        .check-icon {
            width: 16px;
            height: 16px;
            stroke: #4ade80;
            stroke-width: 2;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .language-option.active .check-icon {
            opacity: 1;
        }

        @media screen and (max-width: 768px) {
            .floating-navbar {
                width: 95%;
                padding: 12px 20px;
                top: 20px;
                justify-content: space-between;
            }

            .profile-menu-container {
                order: 1;
                flex-grow: 1;
                display: flex;
                justify-content: flex-start;
                margin-left: -7px !important;
            }

            .navbar-logo {
                order: 2;
                position: static;
                left: auto;
                transform: none;
                flex-shrink: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-grow: 0;
            }

            .navbar-nav {
                display: none;
            }

            .navbar-account {
                order: 3;
                display: flex;
                align-items: center;
                gap: 10px;
                margin-left: 0;
                flex-grow: 1;
                justify-content: flex-end;
            }

            .rena-text {
                font-size: 1.6em;
                letter-spacing: 1px;
            }

            .menu-icon {
                width: 28px;
                height: 28px;
            }

            .profile-menu {
                left: 0 !important;
                right: auto !important;
                transform: none !important;
            }
        }

        @media screen and (min-width: 769px) {
            .floating-navbar {
                top: 30px;
                max-width: 1100px;
            }

            .navbar-nav {
                display: flex;
                order: 2;
            }

            .navbar-logo {
                order: 1;
            }

            .profile-menu-container {
                order: 3;
            }

            .navbar-account {
                display: none;
            }

            .rena-text {
                font-size: 1.5em;
            }
        }

        @media screen and (max-width: 480px) {
            .floating-navbar {
                padding: 8px 16px;
            }

            .rena-text {
                font-size: 1.4em;
            }

            .menu-icon {
                width: 24px;
                height: 24px;
            }
        }

        #custom-menu {
            display: none;
            position: absolute;
            background: rgba(0, 0, 0, 0.9);
            border-radius: 15px;
            padding: 15px;
            backdrop-filter: blur(20px);
            z-index: 99999999;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
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
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        #custom-menu ul li a:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
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

        .custom-menu-svg {
            width: 22px;
            height: 22px;
            max-width: 100%;
            max-height: 100%;
        }

        main {
            padding-top: 120px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        ::selection {
            background-color: white;
            color: black;
        }

        *:focus {
            outline: none;
        }

        * {
            -webkit-tap-highlight-color: transparent;
        }

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

            .container .share-button {
                position: absolute;
                top: 20px;
                right: 20px;
            }

            .article-header {
                position: relative;
            }

            .mobile-only {
                display: none !important;
            }

            .desktop-only {
                display: flex !important;
            }
        }

        @media (max-width: 768px) {
            main {
                padding-top: 0px;
                margin-top: 0;
            }

            .article-container {
                margin-bottom: 1rem;
                border-radius: 25px;
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

            .share-button {
                position: static;
                width: calc(100% - 4rem);
                margin: 1rem auto 3rem;
                justify-content: center;
            }

            .desktop-only {
                display: none !important;
            }

            .mobile-only {
                display: flex !important;
            }
        }
    </style>
</head>

<body>
    <nav class="floating-navbar">
        <div class="profile-menu-container">
            <div id="profile-button">
            </div>
            <div class="profile-menu" id="profile-menu">
                <a href="account.php" class="profile-menu-item">
                    <i class="fas fa-user"></i>
                    <span data-translate-it="Il mio account" data-translate-en="My Account">Il mio account</span>
                </a>
                <div class="profile-menu-divider"></div>
                <div class="profile-menu-item" style="pointer-events: none; opacity: 0.8;">
                    <i class="fas fa-language"></i>
                    <span data-translate-it="Lingua" data-translate-en="Language">Lingua</span>
                </div>
                <div class="language-option" data-lang="it">
                    <div class="language-content">
                        <img src="https://renadeveloper.altervista.org/bandierait.png" class="language-flag"
                            alt="Italiano">
                        <span>Italiano</span>
                    </div>
                    <svg class="check-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="language-option" data-lang="en">
                    <div class="language-content">
                        <img src="https://renadeveloper.altervista.org/bandieraen.png" class="language-flag"
                            alt="English">
                        <span>English</span>
                    </div>
                    <svg class="check-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="navbar-logo">
            <a class="header-brand" href="https://rena.altervista.org">
                <span class="rena-text">RENA</span>
            </a>
        </div>

        <div class="navbar-nav">
            <a href="https://rena.altervista.org" class="nav-link">
                <img src="https://gcsapp.altervista.org/homebanner.png" alt="Home" width="20">
                <span>Home</span>
            </a>
            <a href="https://rena.altervista.org/news.php" class="nav-link active">
                <svg class="custom-menu-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M5 21H17C19.2091 21 21 19.2091 21 17V5C21 3.89543 20.1046 3 19 3H9C7.89543 3 7 3.89543 7 5V18C7 19.6569 6.65685 21 5 21C3.61929 21 3 19.8807 3 18.5V10Z"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <circle cx="12" cy="8" r="1" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></circle>
                        <path d="M11 14H17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path>
                        <path d="M11 17H14" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path>
                    </g>
                </svg>
                <span>News</span>
            </a>
            <a href="https://rena.altervista.org/chi-siamo.html" class="nav-link">
                <svg class="custom-menu-svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" fill="#ffffff" stroke="#ffffff">
                    <g>
                        <path
                            d="M256,265.308c73.252,0,132.644-59.391,132.644-132.654C388.644,59.412,329.252,0,256,0 c-73.262,0-132.643,59.412-132.643,132.654C123.357,205.917,182.738,265.308,256,265.308z">
                        </path>
                        <path
                            d="M425.874,393.104c-5.922-35.474-36-84.509-57.552-107.465c-5.829-6.212-15.948-3.628-19.504-1.427 c-27.04,16.672-58.782,26.399-92.819,26.399c-34.036,0-65.778-9.727-92.818-26.399c-3.555-2.201-13.675-4.785-19.505,1.427 c-21.55,22.956-51.628,71.991-57.551,107.465C71.573,480.444,164.877,512,256,512C347.123,512,440.427,480.444,425.874,393.104z">
                        </path>
                    </g>
                </svg>
                <span data-translate-it="Chi Siamo" data-translate-en="About Us">Chi Siamo</span>
            </a>
            <a href="https://rena.altervista.org/privacy-policy.html" class="nav-link">
                <svg class="custom-menu-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span data-translate-it="Privacy Policy" data-translate-en="Privacy Policy">Privacy Policy</span>
            </a>
        </div>

        <div class="navbar-account">
            <div class="account-menu">
                <a href="https://rena.altervista.org/menu.html">
                    <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)" stroke="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M4 6H20M4 12H14M4 18H9" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <div id="custom-menu">
        <ul>
            <li><a href="https://rena.altervista.org">
                    <img src="https://gcsapp.altervista.org/homebanner.png" alt="Home" width="20">
                    <span>Home</span>
                </a></li>
            <li><a href="https://rena.altervista.org/privacy-policy.html" class="has-svg">
                    <svg class="custom-menu-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Privacy Policy</span>
                </a></li>
            <li><a href="https://rena.altervista.org/chi-siamo.html" class="has-svg">
                    <svg class="custom-menu-svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" fill="#ffffff"
                        stroke="#ffffff">
                        <g>
                            <path
                                d="M256,265.308c73.252,0,132.644-59.391,132.644-132.654C388.644,59.412,329.252,0,256,0 c-73.262,0-132.643,59.412-132.643,132.654C123.357,205.917,182.738,265.308,256,265.308z">
                            </path>
                            <path
                                d="M425.874,393.104c-5.922-35.474-36-84.509-57.552-107.465c-5.829-6.212-15.948-3.628-19.504-1.427 c-27.04,16.672-58.782,26.399-92.819,26.399c-34.036,0-65.778-9.727-92.818-26.399c-3.555-2.201-13.675-4.785-19.505,1.427 c-21.55,22.956-51.628,71.991-57.551,107.465C71.573,480.444,164.877,512,256,512C347.123,512,440.427,480.444,425.874,393.104z">
                            </path>
                        </g>
                    </svg>
                    <span data-translate-it="Chi Siamo" data-translate-en="About Us">Chi Siamo</span>
                </a></li>
            <li><a href="https://rena.altervista.org/news.php" class="has-svg">
                    <svg class="custom-menu-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        stroke="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M5 21H17C19.2091 21 21 19.2091 21 17V5C21 3.89543 20.1046 3 19 3H9C7.89543 3 7 3.89543 7 5V18C7 19.6569 6.65685 21 5 21C3.61929 21 3 19.8807 3 18.5V10Z"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <circle cx="12" cy="8" r="1" stroke="#ffffff" stroke-width="2" stroke-linecap="round">
                            </circle>
                            <path d="M11 14H17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path>
                            <path d="M11 17H14" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path>
                        </g>
                    </svg>
                    <span>News</span>
                </a></li>
        </ul>
    </div>

    <main>
        <div class="container">
            <article class="article-container">
                <div class="article-header">
                    <div class="article-image">
                        <img src="<?= htmlspecialchars($newsItem['cover']) ?>"
                            alt="<?= htmlspecialchars($newsItem['title']) ?>">
                    </div>
                    <h1 class="article-title"><?= htmlspecialchars($newsItem['title']) ?></h1>
                    <button id="desktop-share-button" class="share-button desktop-only" onclick="shareArticle()">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M9.61109 12.4L10.8183 18.5355C11.0462 19.6939 12.6026 19.9244 13.1565 18.8818L19.0211 7.84263C19.248 7.41555 19.2006 6.94354 18.9737 6.58417M9.61109 12.4L5.22642 8.15534C4.41653 7.37131 4.97155 6 6.09877 6H17.9135C18.3758 6 18.7568 6.24061 18.9737 6.58417M9.61109 12.4L18.9737 6.58417M19.0555 6.53333L18.9737 6.58417"
                                    stroke="#ffffff" stroke-width="2"></path>
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
                        <path
                            d="M9.61109 12.4L10.8183 18.5355C11.0462 19.6939 12.6026 19.9244 13.1565 18.8818L19.0211 7.84263C19.248 7.41555 19.2006 6.94354 18.9737 6.58417M9.61109 12.4L5.22642 8.15534C4.41653 7.37131 4.97155 6 6.09877 6H17.9135C18.3758 6 18.7568 6.24061 18.9737 6.58417M9.61109 12.4L18.9737 6.58417M19.0555 6.53333L18.9737 6.58417"
                            stroke="#ffffff" stroke-width="2"></path>
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
    <script>
        function translatePage(lang) {
            localStorage.setItem('preferredLanguage', lang);
            document.cookie = `preferredLanguage=${lang}; path=/; max-age=${30 * 24 * 60 * 60}`;

            const url = new URL(window.location.href);
            url.searchParams.set('lang', lang);
            window.location.href = url.toString();

            document.querySelectorAll('[data-translate-it]').forEach(function (el) {
                if (lang === 'it') {
                    el.textContent = el.getAttribute('data-translate-it');
                } else if (lang === 'en') {
                    el.textContent = el.getAttribute('data-translate-en');
                }
            });

            var titleElement = document.getElementById('page-title');
            if (titleElement) {
                if (lang === 'it') {
                    titleElement.textContent = 'Rena - News';
                } else if (lang === 'en') {
                    titleElement.textContent = 'Rena - News';
                }
            }

            updateLanguageIndicator(lang);
        }

        function updateLanguageIndicator(activeLang) {
            document.querySelectorAll('.language-option').forEach(function (option) {
                const lang = option.getAttribute('data-lang');
                if (lang === activeLang) {
                    option.classList.add('active');
                } else {
                    option.classList.remove('active');
                }
            });
        }

        function loadSavedLanguage() {
            const cookieLang = document.cookie.split('; ').find(row => row.startsWith('preferredLanguage='))?.split('=')[1];
            const savedLang = cookieLang || localStorage.getItem('preferredLanguage') || 'it';

            updateLanguageIndicator(savedLang);
            document.querySelectorAll('[data-translate-it]').forEach(function (el) {
                if (savedLang === 'it') {
                    el.textContent = el.getAttribute('data-translate-it');
                } else if (savedLang === 'en') {
                    el.textContent = el.getAttribute('data-translate-en');
                }
            });
        }

        function checkLoginStatus() {
            fetch('account.php?nocache=' + new Date().getTime(), {
                method: 'GET',
                headers: {
                    'Cache-Control': 'no-cache',
                    'Pragma': 'no-cache'
                },
                cache: 'no-cache'
            })
                .then(response => response.text())
                .then(text => {
                    try {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(text, 'text/html');

                        const username = doc.querySelector('.user-info h2')?.textContent.replace('Benvenuto, ', '').replace('Welcome, ', '').replace('!', '').trim();
                        const profilePhoto = doc.querySelector('.profile-photo')?.getAttribute('src');

                        updateProfileUI({
                            logged_in: true,
                            username: username,
                            profile_photo: profilePhoto
                        });
                    } catch (error) {
                        console.error('Errore nel parsing della risposta:', error);
                        showLoginUI();
                    }
                })
                .catch(error => {
                    console.error('Errore nel controllo login:', error);
                    showLoginUI();
                });
        }

        function updateProfileUI(data) {
            const profileButton = document.getElementById('profile-button');
            if (!profileButton) return;

            profileButton.innerHTML = '';

            if (data && data.logged_in === true && data.username && data.username.trim() !== '') {
                if (data.profile_photo) {
                    const img = document.createElement('img');
                    img.className = 'profile-pic';
                    img.alt = 'Foto profilo';

                    img.onerror = function () {
                        const initial = data.username.charAt(0).toUpperCase();
                        const defaultAvatarDiv = document.createElement('div');
                        defaultAvatarDiv.className = 'default-avatar';
                        defaultAvatarDiv.textContent = initial;
                        profileButton.appendChild(defaultAvatarDiv);
                    };

                    img.onload = function () {
                        profileButton.appendChild(img);
                    };

                    img.src = data.profile_photo;

                } else {
                    const initial = data.username.charAt(0).toUpperCase();
                    const defaultAvatarDiv = document.createElement('div');
                    defaultAvatarDiv.className = 'default-avatar';
                    defaultAvatarDiv.textContent = initial;
                    profileButton.appendChild(defaultAvatarDiv);
                }

                const accountMenuItemSpan = document.querySelector('.profile-menu-item span');
                if (accountMenuItemSpan) {
                    accountMenuItemSpan.setAttribute('data-translate-it', 'Il mio account');
                    accountMenuItemSpan.setAttribute('data-translate-en', 'My Account');
                    const currentLang = localStorage.getItem('preferredLanguage') || 'it';
                    if (currentLang === 'it') {
                        accountMenuItemSpan.textContent = accountMenuItemSpan.getAttribute('data-translate-it');
                    } else {
                        accountMenuItemSpan.textContent = accountMenuItemSpan.getAttribute('data-translate-en');
                    }
                }

            } else {
                const defaultAvatarDiv = document.createElement('div');
                defaultAvatarDiv.className = 'default-avatar';
                defaultAvatarDiv.innerHTML = `<i class="fas fa-user"></i>`;
                profileButton.appendChild(defaultAvatarDiv);

                const accountMenuItemSpan = document.querySelector('.profile-menu-item span');
                if (accountMenuItemSpan) {
                    accountMenuItemSpan.setAttribute('data-translate-it', 'Accedi');
                    accountMenuItemSpan.setAttribute('data-translate-en', 'Login');
                    const currentLang = localStorage.getItem('preferredLanguage') || 'it';
                    if (currentLang === 'it') {
                        accountMenuItemSpan.textContent = accountMenuItemSpan.getAttribute('data-translate-it');
                    } else {
                        accountMenuItemSpan.textContent = accountMenuItemSpan.getAttribute('data-translate-en');
                    }
                }
            }
        }

        function showLoginUI() {
            const profileButton = document.getElementById('profile-button');
            if (profileButton) {
                profileButton.innerHTML = '';
                const defaultAvatarDiv = document.createElement('div');
                defaultAvatarDiv.className = 'default-avatar';
                defaultAvatarDiv.innerHTML = `<i class="fas fa-user"></i>`;
                profileButton.appendChild(defaultAvatarDiv);
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const profileButton = document.getElementById('profile-button');
            const profileMenu = document.getElementById('profile-menu');

            if (profileButton && profileMenu) {
                checkLoginStatus();
                loadSavedLanguage();

                profileButton.addEventListener('click', function (e) {
                    e.stopPropagation();
                    profileMenu.classList.toggle('active');
                });

                document.querySelectorAll('.language-option').forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        const lang = this.getAttribute('data-lang');
                        translatePage(lang);
                    });
                });
            }

            document.addEventListener('click', function (event) {
                if (profileMenu && !profileMenu.contains(event.target) && profileMenu.classList.contains('active') && event.target !== profileButton) {
                    profileMenu.classList.remove('active');
                }
            });

            document.addEventListener('contextmenu', function (event) {
                event.preventDefault();
                if (window.innerWidth > 768) {
                    const customMenu = document.getElementById('custom-menu');
                    if (customMenu) {
                        customMenu.style.display = 'block';
                        customMenu.style.left = event.pageX + 'px';
                        customMenu.style.top = event.pageY + 'px';
                    }
                }
            });

            document.addEventListener('click', function (event) {
                const customMenu = document.getElementById('custom-menu');
                if (customMenu && !customMenu.contains(event.target)) {
                    customMenu.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
