<?php
session_start();
session_destroy();
header('Location: admin-news.php');
exit;
?>
