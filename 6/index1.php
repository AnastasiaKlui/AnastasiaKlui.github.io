<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"] ?? '';

    // Разбиваем текст на слова
    $words = preg_split('/\s+/', $text);

    // Разворачиваем буквы в каждом слове
    foreach ($words as &$word) {
        $reversed = '';
        for ($i = strlen($word) - 1; $i >= 0; $i--) {
            $reversed .= $word[$i];
        }
        $word = $reversed;
    }

    // Склеиваем обработанные слова
    $processedText = implode(' ', $words);

    // Выводим результат
    echo "<h2>Обработанный текст:</h2>";
    echo "<p>$processedText</p>";
}
?>
