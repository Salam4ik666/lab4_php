<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма с различными контроллерами</title>
</head>

<body>
    <h2>Заполните форму</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="age">Возраст:</label>
        <input type="number" id="age" name="age" min="18" required>
        <br><br>
        <label for="gender">Пол:</label>
        <select id="gender" name="gender" required>
            <option value="">Выберите пол</option>
            <option value="male">Мужской</option>
            <option value="female">Женский</option>
            <option value="other">Другой</option>
        </select>
        <br><br>
        <input type="submit" value="Отправить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];

        echo "<h2>Данные, отправленные из формы:</h2>";
        echo "<p><strong>Имя:</strong> $name</p>";
        echo "<p><strong>Возраст:</strong> $age</p>";
        echo "<p><strong>Пол:</strong> $gender</p>";
    }
    ?>
</body>

</html>