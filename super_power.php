<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super powers</title>
    <link rel="stylesheet" href="css/tables_style.css">
</head>
<body>
    <?php
        include("header.php")
    ?>
    <main>
        <section id="content">
            <section id="navigation">
                <a href="super_power.php" class="change">Суперспособности</a>
                <a href="race.php" class="change">Раса</a>
                <a href="team.php" class="change">Команды</a>
            </section>
            <?php
                // Подключение к БД
                $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'in_marvel');
                if (!$connection) {
                    echo "Ошибка подключения к БД. Код ошибки: " . mysqli_connect_error();
                    exit();
                }
                
                $query =$connection->query("SELECT * FROM super_power");
                
                // Вывод таблицы
                $rows = mysqli_num_rows($query);
                if($query)
                {
                    echo "<table border='1'>
                        <tr class='head_table'>
                            <th>Id способности</th>
                            <th>Название</th>
                            <th>Причина появления</th>
                        </tr>";
                        for ($i = 0 ; $i < $rows ; ++$i){
                            $row = mysqli_fetch_row($query);
                            echo "<tr>";
                                for ($j = 0 ; $j < 3 ; ++$j) {
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
        </section>
    </main>
</body>
</html>