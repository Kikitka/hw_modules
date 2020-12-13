<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/registration_style.css">
</head>
<body>
    <?php
        include("header.php");
    ?>
    <main>
        <section id="registration">
            <div id="enter_info">
                <h1>
                    Регистрация
                </h1>
                <form action="check.php" method="post">
                    <p>
                        Имя<br>
                        <input class="input" id="full_name" name="full_name" size="40"  type="text" required>
                    </p>
                    <p>
                        E-mail<br>
                        <input class="input" id="email" name="email" size="40" type="email" required>
                    </p>
                    <p>
                        Логин<br>
                        <input class="input" id="user_login" name="user_login" size="40" type="text" required>
                    </p>
                    <p>
                        Пароль<br>
                        <input class="input" id="password" name="password" size="40" type="password" required>
                    </p>
                    <p>
                        Любимый персонаж<br>
                        <input class="input" id="favorite_hero" name="favorite_hero" size="40" type="text" required>
                    </p>
                    <p>
                        <br>
                        <input class="input" id="secret" name="secret" size="40" type="text">
                    </p>
                    <p class="submit">
                        <input class="button" type="submit" value="Зарегистрироваться">
                    </p>
                    <p class="regtext">
                        Есть аккаунт?
                        <a href= "enter.php">
                            Вход
                        </a>
                    </p>
                </form>
            </div>
        </section>
    </main>
</body>
</html>