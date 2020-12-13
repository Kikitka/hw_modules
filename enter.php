<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter</title>
    <link rel="stylesheet" href="css/enter_style.css">
</head>
<body>
    <?php
        include("header.php");

        if($_COOKIE['user'] == ''):
    ?>
    <main>
        <section id="enter">
            <div id="login">
                <h1 id="login_word">
                    Вход
                </h1>
                <form action="auth.php" id="loginform" method="post">
                    <div>
                        Логин<br>
                        <input class="input" id="user_login" name="user_login" size="40" type="text" required>
                    </div>
                    <div>
                        Пароль<br>
                        <input class="input" id="password" name="password" size="40" type="password" required>
                    </div> 
                    <div>
                        <input class="button" size="40" type="submit" value="Войти">
                    </div>
                </form>    
                <div id="reg_word">
                    <a href= "registration.php">
                        Регистрация
                    </a>
                </div>
            </div>   
        </section>

        <?php
            else:
        ?>

        <div id="if_enter">
            Привет, <?=$_COOKIE['user']?>. Чтобы выйти нажми <a href="exit.php"> тут </a>
        </div>
    </main>
    <?php
        endif;
    ?>
</body>
</html>