<?php
require_once "connectioin.php";
$id = $_GET['id'];

$query = `SELECT * FROM Flowers WHERE id=$id`;
$conn->query($query);



?>


<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інформація про квітку</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 id="terms">KAN FLOWERS</h1>
    <h2 id="terms2">ІНФОРМАЦІЯ ПРО КВІТКУ</h2>
    <hr>
    <div id="container1">
        <ul id="menu">
            <b><a href="index.html">головна</a></b>
           <b><a href="about_us.html">про нас</a></b>
           <b><a href="flower.php">асортимент</a></b>
           <b><a href="package.html">пакування</a></b>
           <b><a href="contact.html">контакти</a></b>
        </ul>
    </div>
    <blockquote>
        <p>«Квіти — це бути причиною її усмішки та щастя»</p>
        <cite><span>Quote author: </span><span>Kan Anastasia</span></cite>
    </blockquote>
    
    <div class="container">
        <div class="flower-info">
            <div class="parent">
                <div class="child">
                    <img src="https://example.com/flower-image.jpg" alt="Цветок">
                </div>
                <div class="child">
                    <h3>Роза О'Хара</h3>
                    <p><strong>Довжина:</strong> 60 см</p>
                    <p><strong>Ширина:</strong> 10 см</p>
                    <p><strong>Опис:</strong> Роза О'Хара — це елегантна квітка з ніжним рожевим відтінком. Вона має довгий стебло та великі, махрові бутони.</p>
                </div>
            </div>
        </div>
    </div>

    <hr>
</body>

</html>
 