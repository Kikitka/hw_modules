<html>
    <link rel="stylesheet" href="css/common_style.css">
    <header>
        <div id="logo">
            <a href="index.php">
                InMARVEL
            </a>
         </div>

        <!-- Появление ссылки -->
        <?php
            if($_COOKIE['user_status'] == 'Администратор'):
        ?>
        <div id="edit">
            <a href="edit_tables.php">
                Изменить таблицы
            </a>
        </div>
        <?php
            endif;
        ?>

         <div id="nav">
            <a href="index.php">
                Главная
             </a>
            <a href="enter.php">
                <?php
                    if($_COOKIE['user'] == ''):
                ?>
                Вход
                
                <?php
                    else:
                ?>
                <?=$_COOKIE['user']?>
            </a>
            <?php
                endif;
            ?>
            <a href="about.php">
                О сайте
            </a>
        </div>
    </header>
</html>