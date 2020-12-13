<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super_power</title>
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
                Super_power
            </div>
            <div id="enter_info">
                <form action="check/check_sp.php" method="post">
                    <p>
                        name_sp<br>
                        <input class="input" id="name_sp" name="name_sp" size="40"  type="text" required>
                    </p>
                    <p>
                        reason_app<br>
                        <input class="input" id="reason_app" name="reason_app" size="40" type="text" required>
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