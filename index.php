<?php
// Функция для проверки корректности email
function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Проверка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка заполнения всех полей
    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["review"]) || empty($_POST["comment"])) {
        echo "<script>alert('Пожалуйста, заполните все поля формы.')</script>";
    }
    // Проверка корректности email
    elseif (!isValidEmail($_POST["email"])) {
        echo "<script>alert('Пожалуйста, введите корректный email адрес.')</script>";
    } else {
        // Если все данные корректны, можно обрабатывать форму
        // Например, отправить данные в базу данных или по электронной почте
        // В данном случае, вы можете вывести данные или сделать что-то еще с ними
        echo "<div id='result'>";
        echo "<p>Ваше имя: <b>{$_POST["name"]}</b></p>";
        echo "<p>Ваш e-mail: <b>{$_POST["email"]}</b></p>";
        echo "<p>Оценка товара: <b>{$_POST["review"]}</b></p>";
        echo "<p>Ваше сообщение: <b>{$_POST["comment"]}</b></p>";
        echo "</div>";
    }
}
?>
<div class="form">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <fieldset>
            <legend>Оставьте отзыв!</legend>
            <div id="main_info" style="display: flex; flex-direction: column; gap: 10px;">
                <div>
                    <label for="name">Имя:
                        <input type="text" name="name" />
                    </label>
                </div>
                <div>
                    <label for="email">Email:
                        <input type="email" name="email" />
                    </label>
                </div>
            </div>
            <div id="extra_info">
                <div>
                    <p><label for="review">Оцените наш сервис!</label></p>
                    <div style="display: flex; flex-direction: column;">
                        <p><input id="review" type="radio" name="review" value="10" checked>Хорошо</p>
                        <p><input id="review" type="radio" name="review" value="8">Удовлетворительно</p>
                        <p><input id="review" type="radio" name="review" value="5">Плохо</p>
                    </div>
                </div>
            </div>
            <div id="message_info">
                <div>
                    <p><label for="comment">Ваш комментарий: </label></p>
                    <textarea id="comment" name="comment" cols="30" rows="10" class="comment"></textarea>
                </div>
            </div>
            <div id="buttons" style="display: flex; flex-direction: row; gap: 10px; margin-top: 10px;">
                <input type="submit" value="Отправить" />
                <input type="reset" value="Удалить" />
            </div>
        </fieldset>
    </form>
    <!-- Добавьте в эту область код, который будет отображать сообщение только после отправки формы -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <div id="result">
            <p>Ваше имя: <b><?php echo isset($_POST["name"]) ? $_POST["name"] : "" ?></b></p>
            <p>Ваш e-mail: <b><?php echo isset($_POST["email"]) ? $_POST["email"] : "" ?></b></p>
            <p>Оценка товара: <b><?php echo isset($_POST["review"]) ? $_POST["review"] : "" ?></b></p>
            <p>Ваше сообщение: <b><?php echo isset($_POST["comment"]) ? $_POST["comment"] : "" ?></b></p>
        </div>
    <?php endif; ?>
</div>