<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"] ?? '';
    $password = $_POST["password"] ?? '';
    $n = $_POST["n"] ?? 20;
    $word = $_POST["word"] ?? '';
    $key = $_POST["key"] ?? 3;

    // Замена дат в формате дд-мм-гггг на гггг.мм.дд
    $text = preg_replace('/(\d{2})-(\d{2})-(\d{4})/', '$3.$2.$1', $text);

    // Проверка пароля
    $password_message = (strlen(trim($password)) > 5 && strlen($password) < 10)
        ? "Пароль підходить"
        : "Пароль не підходить";

    // Замена смайликов на эмодзи
    $smiles = ['(smiley)', '(teeth)', '(sad)', '(yummi)', '(wink)'];
    $emojis = ['😊', '😁', '☹️', '😜', '😉'];
    $text = str_replace($smiles, $emojis, $text);

    // Транслитерация
    $translit_map = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'h',
        'д' => 'd', 'е' => 'e', 'є' => 'ye', 'ж' => 'zh',
        'з' => 'z', 'и' => 'y', 'і' => 'i', 'ї' => 'yi',
        'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm',
        'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f',
        'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh',
        'щ' => 'shch', 'ю' => 'yu', 'я' => 'ya'
    ];
    $translit_text = strtr($text, $translit_map);

    // Обрезание длинного текста
    $truncated_text = mb_strlen($text) > $n 
        ? mb_substr($text, 0, $n) . "..." 
        : $text;

    // Подсчет слов (проверка на пустое значение $word)
    if (!empty($word)) {
        $word_count = substr_count($text, $word);
    } else {
        $word_count = 0; // Если слово не указано, количество вхождений равно 0
    }

    // Замена чисел
    $numbers = [
        '1' => 'один', '2' => 'два', '3' => 'три',
        '4' => 'чотири', '5' => 'п’ять', '6' => 'шість',
        '7' => 'сім', '8' => 'вісім', '9' => 'дев’ять', '0' => 'нуль'
    ];
    $text = strtr($text, $numbers);

    // Шифрование методом Цезаря
    $encrypted_text = '';
    foreach (str_split($text) as $char) {
        if (ctype_alpha($char)) {
            $base = ctype_upper($char) ? 'A' : 'a';
            $encrypted_text .= chr((ord($char) - ord($base) + $key) % 26 + ord($base));
        } else {
            $encrypted_text .= $char;
        }
    }

    // Вывод результатов
    echo "<h2>Результати:</h2>";
    echo "<p><strong>Пароль:</strong> $password_message</p>";
    echo "<p><strong>Транслітований текст:</strong> $translit_text</p>";
    echo "<p><strong>Обрізаний текст:</strong> $truncated_text</p>";
    echo "<p><strong>Кількість входжень слова '$word':</strong> $word_count</p>";
    echo "<p><strong>Шифрований текст:</strong> $encrypted_text</p>";
}
?>
