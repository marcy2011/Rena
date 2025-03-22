<?php
session_start();

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'it';
$file = $lang === 'en' ? 'news_en.json' : 'news_it.json';

$newsList = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($id === null || !isset($newsList[$id])) {
    die("News non trovata: parametro mancante o ID non valido.");
}

$newsItem = $newsList[$id];

include 'view-news-template.php';
?>
