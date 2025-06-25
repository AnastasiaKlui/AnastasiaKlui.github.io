<?php
require_once "connection.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM Flowers WHERE id=$id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інформація про квітку</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=1.0">
</head>

<body>
    <h1 id="terms">KAN FLOWERS</h1>
    <h2 id="terms2">«𝗮𝗶𝗺𝗲𝗿, 𝗰’𝗲𝘀𝘁 𝗮𝗴𝗶𝗿»</h2>
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
        <p>«Ти дарувала себе, я дарував тобі троянди»</p>
        <cite><span>Quote author: </span><span>Kan Anastasia</span></cite>
    </blockquote>

    <div class="container1">
        <nav id="text">
            <nav id="text2">
                <b><p>АСОРТИМЕНТ</p></b>
            </nav>
            <div class="flower_list">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="parent">
                            <img src="<?= htmlspecialchars($row['image_id']) ?>" alt="<?= htmlspecialchars($row['flower_name']) ?>">
                            <div class="child2">
                            <nav id="text3"><?= htmlspecialchars($row['flower_name']) ?></nav>
                            <p></p>
                            <nav id="info">
                                <strong>Колір:</strong> <?= htmlspecialchars($row['color']) ?>
                                <strong>Довжина:</strong> <?= htmlspecialchars($row['height']) ?>
                                <strong>Ширина:</strong> <?= htmlspecialchars($row['diameter']) ?>
                            </nav>
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