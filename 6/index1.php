<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Пункт 1: Отримуємо текст з форми
        $inputText = $_POST["text"] ?? ''; // Введений текст

        // Пункт 2: Розбиваємо введений текст на слова
        $words = preg_split('/\s+/', trim($inputText)); // Розбиваємо текст на слова

        // Пункт 3: Розгортаємо букви в кожному слові
        $processedWords = array_map(function ($word) {
            return strrev($word); // Розгортаємо слово
        }, $words);

        // Пункт 4: Склеюємо оброблені слова назад у текст
        $processedText = preg_replace_callback(
            '/\b\w+\b/u', // Знаходимо кожне слово
            function ($matches) {
                return strrev($matches[0]); // Розгортаємо слово
            },
            $inputText
        );

        // Виведення результатів
        echo "<h2>Результати:</h2>";
        echo "<h3>Пункт 1: Введений текст</h3>";
        echo "<p>$inputText</p>";

        echo "<h3>Пункт 2: Розбитий текст (слова)</h3>";
        echo "<ul>";
        foreach ($words as $word) {
            echo "<li>$word</li>"; // Виводимо кожне слово
        }
        echo "</ul>";

        echo "<h3>Пункт 3: Розгорнуті слова</h3>";
        echo "<ul>";
        foreach ($processedWords as $word) {
            echo "<li>$word</li>"; // Виводимо кожне розгорнуте слово
        }
        echo "</ul>";

        echo "<h3>Пункт 4: Оброблений текст</h3>";
        echo "<p>$processedText</p>";
    }
    ?>
</body>
</html>