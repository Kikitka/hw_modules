<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In MARVEL</title>
    <link rel="stylesheet" href="css/main_style.css">
</head>
<body>
    <?php
        include("header.php")
    ?>
    <main>
        <section id="content">
            <?php
                if($_COOKIE['user'] == ''):
            ?>
            <div id="not_enter">
                <div id="ogl">
                    <p>
                        Увы, но неавторизированные пользователи не могут видеть контент этого сайта.<br>
                        Исправь ошибку и 
                    </p>
                </div>
                <div id="link2_auth">
                    <a href="enter.php">авторезируйся</a>
                </div>
            </div>
            <?php
                    else:
            ?>
            
            <div id="if_enter">
                <section id="navigation">
                    <a href="super_power.php" class="change">Суперспособности</a>
                    <a href="race.php" class="change">Раса</a>
                    <a href="team.php" class="change">Команды</a>
                </section>
                <div id="ogl">
                    Персонажи
                </div>
                <?php
                    // Подключение к БД
                    $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'in_marvel');
                    if (!$connection) {
                        echo "Ошибка подключения к БД. Код ошибки: " . mysqli_connect_error();
                        exit();
                    }
                    
                    $query =$connection->query("SELECT * FROM super_heroes");
                    
                    // Вывод таблицы
                    $rows = mysqli_num_rows($query);
                    if($query)
                    {
                        echo "<table border='1'>
                            <tr class='head_table'>
                                <th>Id персонажа</th>
                                <th>Псевдоним</th>
                                <th>Настоящее имя</th>
                                <th>Раса</th>
                                <th>Суперспособность</th>
                                <th>Команда</th>
                            </tr>";
                            for ($i = 0 ; $i < $rows ; ++$i){
                                $row = mysqli_fetch_row($query);
                                echo "<tr>";
                                    for ($j = 0 ; $j < 6 ; ++$j) {
                                        echo "<td>$row[$j]</td>";
                                    }
                                echo "</tr>";
                            }
                        echo "</table>";
                    }

                    // освобождение используемой памяти
                    mysqli_free_result($query);
                
                    // Закрываем соединение
                    mysqli_close($connection);
                ?>
                
            </div>

            <?php
                endif;
            ?>
        </section>
    </main>
</body>
</html>