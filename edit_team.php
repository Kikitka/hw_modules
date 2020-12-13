<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
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
                <h>Team<h>
            </div>
            <div id="enter_info">
                <form action="check/check_super_heroes.php" method="post">
                    <p>
                        name_team<br>
                        <input class="input" id="name_team" name="name_team" size="40"  type="text" required>
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