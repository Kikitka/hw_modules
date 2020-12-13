<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/tables_style.css">
</head>
<body>
    <?php
        include("header.php")
    ?>
    <main>
        <section id="content">
            <div id="ogl">
                Какую таблицу будешь изменять?
            </div>
            <div>
                <a href="edit_users.php" class="change">Users</a>
                <a href="edit_super_heroes.php" class="change">Super_heroes</a>
                <a href="edit_super_power.php" class="change">Super_power</a>
                <a href="edit_race.php" class="change">Race</a>
                <a href="edit_team.php" class="change">Team</a>
            </div>
        </section>
    </main>
</body>
</html>