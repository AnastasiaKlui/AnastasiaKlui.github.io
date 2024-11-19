<?php
$errors = [];
$values = [
    'name' => '',
    'age' => '',
    'email' => '',
    'gender' => '',
    'hobbies' => []
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Валідація імені
    if (empty($_POST['name']) || !preg_match('/^[A-Za-zА-Яа-яЁёІіЇїЄє]+$/', $_POST['name'])) {
        $errors['name'] = "Ім'я повинно містити лише літери.";
    } else {
        $values['name'] = htmlspecialchars($_POST['name']);
    }

    // Валідація віку
    if (empty($_POST['age']) || !filter_var($_POST['age'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])) {
        $errors['age'] = "Вік має бути додатнім числом.";
    } else {
        $values['age'] = htmlspecialchars($_POST['age']);
    }

    // Валідація електронної пошти
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Введіть правильну електронну пошту.";
    } else {
        $values['email'] = htmlspecialchars($_POST['email']);
    }

    // Валідація статі
    if (empty($_POST['gender'])) {
        $errors['gender'] = "Виберіть стать.";
    } else {
        $values['gender'] = htmlspecialchars($_POST['gender']);
    }

    // Валідація хобі
    if (!empty($_POST['hobbies']) && is_array($_POST['hobbies'])) {
        $values['hobbies'] = array_map('htmlspecialchars', $_POST['hobbies']);
    }

    // Якщо немає помилок
    if (empty($errors)) {
        echo "<h3>Дані успішно відправлено!</h3>";
        echo "<p>Ім'я: {$values['name']}</p>";
        echo "<p>Вік: {$values['age']}</p>";
        echo "<p>Електронна пошта: {$values['email']}</p>";
        echo "<p>Стать: {$values['gender']}</p>";
        echo "<p>Хобі: " . implode(', ', $values['hobbies']) . "</p>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма реєстрації</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .error { color: red; font-size: 12px; }
    </style>
</head>
<body>

<h1>Форма реєстрації</h1>
<form method="post" action="">
    <div>
        <label for="name">Ім'я:</label>
        <input type="text" id="name" name="name" value="<?= $values['name'] ?>">
        <div class="error"><?= $errors['name'] ?? '' ?></div>
    </div>
    <div>
        <label for="age">Вік:</label>
        <input type="number" id="age" name="age" value="<?= $values['age'] ?>">
        <div class="error"><?= $errors['age'] ?? '' ?></div>
    </div>
    <div>
        <label for="email">Електронна пошта:</label>
        <input type="email" id="email" name="email" value="<?= $values['email'] ?>">
        <div class="error"><?= $errors['email'] ?? '' ?></div>
    </div>
    <div>
        <label>Стать:</label>
        <label><input type="radio" name="gender" value="Чоловік" <?= $values['gender'] === 'Чоловік' ? 'checked' : '' ?>> Чоловік</label>
        <label><input type="radio" name="gender" value="Жінка" <?= $values['gender'] === 'Жінка' ? 'checked' : '' ?>> Жінка</label>
        <div class="error"><?= $errors['gender'] ?? '' ?></div>
    </div>
    <div>
        <label for="hobbies">Хобі:</label>
        <label><input type="checkbox" name="hobbies[]" value="Спорт" <?= in_array('Спорт', $values['hobbies']) ? 'checked' : '' ?>> Спорт</label>
        <label><input type="checkbox" name="hobbies[]" value="Читання" <?= in_array('Читання', $values['hobbies']) ? 'checked' : '' ?>> Читання</label>
        <label><input type="checkbox" name="hobbies[]" value="Подорожі" <?= in_array('Подорожі', $values['hobbies']) ? 'checked' : '' ?>> Подорожі</label>
    </div>
    <button type="submit">Подати</button>
</form>

</body>
</html>
