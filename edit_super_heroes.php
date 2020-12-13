<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super_heroes</title>
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
                Super_heroes
            </div>
            <div id="enter_info">
                <form action="check/check_super_heroes.php" method="post">
                    <p>
                        super_name<br>
                        <input class="input" id="super_name" name="super_name" size="40"  type="text" required>
                    </p>
                    <p>
                        real_name<br>
                        <input class="input" id="real_name" name="real_name" size="40" type="text" required>
                    </p>
                    <p>
                        race<br>
                        <input class="input" id="race" name="race" size="40" type="text" required>
                    </p>
                    <p>
                        superpower<br>
                        <input class="input" id="superpower" name="password" size="40" type="text" required>
                    </p>
                    <p>
                        team<br>
                        <input class="input" id="favorite_hero" name="favorite_hero" size="40" type="text" required>
                    </p>
                    <p class="submit">
                        <input class="button" type="submit" value="Добавить запись">
                    </p>
                </form>
            </div>
        </section>
    </main>
</body>
</html>