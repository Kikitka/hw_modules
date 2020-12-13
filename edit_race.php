<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Race</title>
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
                Race
            </div>
            <div id="enter_info">
            <form action="check/check_race.php" method="post">
                    <p>
                        name_race<br>
                        <input class="input" id="name_race" name="name_race" size="40"  type="text" required>
                    </p>
                    <p>
                        habitat<br>
                        <input class="input" id="habitat" name="habitat" size="40" type="text" required>
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