<?php
function validateForm($name, $email, $comment, $dataProcessing)
{
    $errors = array();

    // Проверка поля "name"
    if (strlen($name) < 3 || strlen($name) > 20 || preg_match('/\d/', $name)) {
        $errors[] = "Имя должно содержать от 3 до 20 символов и не должно содержать цифры.";
    }

    // Проверка поля "email"
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Неправильный формат адреса электронной почты.";
    }

    // Проверка поля "comment"
    if (empty($comment)) {
        $errors[] = "Комментарий не должен быть пустым.";
    }

    // Проверка галочки "dataProcessing"
    if (!$dataProcessing) {
        $errors[] = "Пожалуйста, согласитесь с обработкой данных.";
    }

    return $errors;
}

// Обработка запроса при отправке формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $name = $_POST["name"];
    $email = $_POST["mail"];
    $comment = $_POST["comment"];
    $dataProcessing = isset($_POST["data-processing"]);

    // Валидация формы
    $errors = validateForm($name, $email, $comment, $dataProcessing);

    // Если ошибок нет, выводим сообщение об успешной отправке
    if (empty($errors)) {
        $message = "Ваш комментарий успешно отправлен!";
    } else {
        // Если есть ошибки, выводим их
        $message = implode("<br>", $errors);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя форма</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            padding: 20px 0;
            background-color: #f0f0f0;
        }

        header .exit-button {
            float: right;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        #write-comment {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        #write-comment label,
        #write-comment textarea,
        #write-comment input[type="text"],
        #write-comment input[type="checkbox"] {
            display: block;
            margin-bottom: 10px;
        }

        #write-comment input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #comment-message {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <header>
        <button class="button">Home</button>
        <button class="button">Comments</button>
        <button class="exit-button">Exit</button>
    </header>

    <form id="write-comment" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Имя:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="mail">Почта:</label><br>
        <input type="text" id="mail" name="mail"><br>
        <label for="comment">Комментарий:</label><br>
        <textarea id="comment" name="comment"></textarea><br>
        <input type="checkbox" id="data-processing" name="data-processing">
        <label for="data-processing">Вы согласны с обработкой данных?</label><br>
        <input type="submit" value="Отправить">
    </form>

    <div id="comment-message"><?php echo isset($message) ? $message : ''; ?></div>

</body>

</html>