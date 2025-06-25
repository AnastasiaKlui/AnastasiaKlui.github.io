<?php
require 'connection.php';

$title = "Асортимент";

$sql = "SELECT* FROM Packaging";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пакування</title>
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
        <p><?= htmlspecialchars("«У квітів своя мова. Вони мовчать, але говорять про багато.»") ?></p>
        <cite>
            <span><?= htmlspecialchars("Quote author: ") ?></span>
            <span><?= htmlspecialchars("Sergei Yesenin") ?></span>
        </cite>
    </blockquote>

    <div class="container1">
        <nav id="text">
            <nav id="text2">
                    <b></b><p>Ніжне Пакування для Особливих Миттєвостей</p></b>
                    <nav id="text5">
                        <p>Ми віримо, що краса квітів починається ще до того, як ви їх побачите. 
                        Наше пакування — це частина магії, що робить кожен букет справжнім подарунком для душі.
                    </p>
                </nav>
            </nav>
            <div class="flower_list">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="parent flower_item">
                            <img src="<?= htmlspecialchars($row['image_id']) ?>"
                                    alt="<?= htmlspecialchars($row['packaging_type']) ?>">
                            <div class="child2">
                                <nav id="text3"><?= htmlspecialchars($row['packaging_type']) ?></nav>
                                <p></p>
                                <nav id="info">
                                    <strong>Матеріал:</strong> <?= htmlspecialchars($row['material']) ?>
                                    <p><strong>Колір:</strong> <?= htmlspecialchars($row['color']) ?></p>
                                </nav>
                                <p style="text-align:right;"><strong>Ціна:</strong><?= htmlspecialchars($row['price']) ?>грн</p>
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