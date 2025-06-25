<?php
require 'connection.php';

$title = "Асортимент";

$sql = "SELECT* FROM Flowers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Асортимент</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=1.0">
</head>

<body>
    <h1 id="terms">KAN FLOWERS</h1>
    <h2 id="terms2">ASSORTMENT</h2>
    <hr>
    <div id="container1">
        <ul id="menu">
            <b><a href="index.html">головна</a></b>
            <b><a href="about_us.html">про нас</a></b>
            <b><a href="flower.php">асортимент</a></b>
            <b><a href="package.php">пакування</a></b>
            <b><a href="contact.html">контакти</a></b>
        </ul>
    </div>
    <blockquote>
        <p>«Ти дарувала себе, я дарував тобі троянди»</p>
        <cite><span>Quote author: </span><span>Kan Anastasia</span></cite>
    </blockquote>

    <div class="container1">
        <nav id="text">
            <nav id="text2">
                <b><p>Наш асортимент — Квіти для будь-якої миті</p></b>
                <nav id="text5">
                    <p>Ми віримо, що кожна квітка розповідає свою історію. Наш асортимент створений, щоб допомогти 
                        вам знайти ідеальний букет для будь-якого приводу — від ніжних компліментів до грандіозних святкувань.
                    </p>
                </nav>
            </nav>
            <div class="flower_list">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="parent flower_item">
                            <img src="<?= htmlspecialchars($row['image_id']) ?>"
                                    alt="<?= htmlspecialchars($row['flower_name']) ?>">
                            <div class="child2">
                                <nav id="text3"><?= htmlspecialchars($row['flower_name']) ?></nav>
                                <p></p>
                                <nav id="info">
                                    <strong>Колір:</strong> <?= htmlspecialchars($row['color']) ?>
                                    <strong>Довжина:</strong> <?= htmlspecialchars($row['height']) ?>
                                    <strong>Ширина:</strong> <?= htmlspecialchars($row['diameter']) ?>
                                </nav>
                                <p style="text-align:right;"><strong>Ціна:</strong><?= htmlspecialchars($row['price']) ?>грн</p>
                                <p></p>
                                <nav id="text4">Трішки Інформації</nav>
                                <?= htmlspecialchars($row['flower_description']) ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Дані відсутні.</p>
                <?php endif; ?>
            </div>
        </nav>
    </div>
    <hr>
</body>

</html>