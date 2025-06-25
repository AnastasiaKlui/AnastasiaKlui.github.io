<?php
$host = 'localhost';
$db = 'KanFlowers';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Ошибка соединения: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>