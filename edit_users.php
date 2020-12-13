<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/edit_style.css">
</head>
<body>
    <?php
        include("header.php")
    ?>
    <main>
        <section id="content">
            <?php
                include("edit_navigation.php");
            ?>
            <div id="ogl">
                Users
            </div>
            <div id="enter_info">
                <form action="check.php" method="post">
                    <p>
                        user_login<br>
                        <input class="input" id="user_login" name="user_login" size="40"  type="text" required>
                    </p>
                    <p>
                        passw<br>
                        <input class="input" id="passw" name="passw" size="40" type="password" required>
                    </p>
                    <p>
                        email<br>
                        <input class="input" id="email" name="email" size="40" type="email" required>
                    </p>
                    <p>
                        username<br>
                        <input class="input" id="username" name="username" size="40" type="text" required>
                    </p>
                    <p>
                        user_status<br>
                        <input class="input" id="secret" name="secret" size="40" type="text" required>
                    </p>
                    <p>
                        favorite_hero<br>
                        <input class="input" id="favorite_hero" name="favorite_hero" size="40" type="text">
                    </p>
                    <p class="submit">
                        <input class="button" type="submit" value="Зарегистрировать">
                    </p>
                </form>
            </div>    
        </section>
    </main>
</body>
</html>