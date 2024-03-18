<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];

        // Проверка заполнения имени пользователя
        if (empty($name)) {
            echo "Пожалуйста, введите ваше имя.";
        } else {
            // Выводим результаты теста
            echo "<h2>Результаты теста:</h2>";
            echo "Имя пользователя: $name <br>";

            // Проверка ответов на вопросы
            if (isset($_POST["question1"])) {
                echo "Ответ на первый вопрос: " . $_POST["question1"] . "<br>";
            } else {
                echo "Вы не ответили на первый вопрос.<br>";
            }

            if (isset($_POST["question2"])) {
                echo "Ответ на второй вопрос: " . $_POST["question2"] . "<br>";
            } else {
                echo "Вы не ответили на второй вопрос.<br>";
            }

            if (isset($_POST["question3"])) {
                echo "Ответ на третий вопрос: " . implode(", ", $_POST["question3"]) . "<br>";
            } else {
                echo "Вы не ответили на третий вопрос.<br>";
            }
        }
    }
    ?>

    <h1>Тест</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Введите ваше имя:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <p>1. Вопрос: Какой язык программирования вы предпочитаете?</p>
        <input type="radio" id="lang1" name="question1" value="PHP">
        <label for="lang1">PHP</label><br>
        <input type="radio" id="lang2" name="question1" value="Python">
        <label for="lang2">Python</label><br>
        <input type="radio" id="lang3" name="question1" value="JavaScript">
        <label for="lang3">JavaScript</label><br><br>

        <p>2. Вопрос: Какая ваша любимая цветовая гамма?</p>
        <select name="question2">
            <option value="">Выберите цвет</option>
            <option value="red">Красный</option>
            <option value="blue">Синий</option>
            <option value="green">Зеленый</option>
        </select><br><br>

        <p>3. Вопрос: Какие из следующих языков программирования вы знаете?</p>
        <input type="checkbox" id="lang1" name="question3[]" value="PHP">
        <label for="lang1">PHP</label><br>
        <input type="checkbox" id="lang2" name="question3[]" value="Python">
        <label for="lang2">Python</label><br>
        <input type="checkbox" id="lang3" name="question3[]" value="JavaScript">
        <label for="lang3">JavaScript</label><br><br>

        <input type="submit" value="Отправить">
    </form>

</body>

</html>