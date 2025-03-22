<?php
$today = date("Y-m-d");
$event_date = "2025-03-21";

if ($today == $event_date) {
    include('2025.html');
} else {
    include('rena.html');
}
?>
