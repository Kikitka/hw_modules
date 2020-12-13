<?php
        $err = [];

        $super_name = filter_var(trim($_POST['super_name']), FILTER_SANITIZE_STRING);
        $real_name = filter_var(trim($_POST['real_name']), FILTER_SANITIZE_STRING);
        $race = filter_var(trim($_POST['race']), FILTER_SANITIZE_STRING);
        $superpower = filter_var(trim($_POST['superpower']), FILTER_SANITIZE_STRING);
        $team = filter_var(trim($_POST['team']), FILTER_SANITIZE_STRING);

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //вывод ошибок
        $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'inmarvel');
        if (!$connection) 
        {
            echo "Ошибка подключения к БД. Код ошибки: " . mysqli_connect_error();
            exit();
        }

        // Проверка существования персонажа
        $query = $connection->query("SELECT id_hero FROM super_heroes WHERE super_name='$super_name'");
        if(mysqli_num_rows($query) > 0){
            $err[] = "Персонаж уже существует в базе данных";
        }

        $query = $connection->query("SELECT id_race FROM race WHERE id_race='$race'");
        if(mysqli_num_rows($query) < 0){
            $err[] = "Такой расы нет в базе данных";
        }
        $query = $connection->query("SELECT id_sp FROM super_power WHERE id_sp='$superpower'");
        if(mysqli_num_rows($query) < 0){
            $err[] = "Такой способности нет в базе данных";
        }
        $query = $connection->query("SELECT id_team FROM team WHERE id_team='$team'");
        if(mysqli_num_rows($query) < 0){
            $err[] = "Такой команды нет в базе данных";
        }

        // Добавление новой записи
        if(count($err) == 0){
            $connection->query("INSERT INTO super_heroes (super_name, real_name, race, superpower, team) VALUES ('$super_name', '$real_name', '$race', '$superpower', '$team')");
            
            mysqli_close($connection);
            header('Location: /');
            exit();
        }
        else {
            // Вывод ошибок
            print "<b>При регистрации произошли следующие ошибки:</b><br>";
            foreach($err AS $error){
                print $error."<br>";    
            }
        }
    
        // Закрываем соединение
        mysqli_close($connection);
?>