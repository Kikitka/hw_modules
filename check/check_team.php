<?php
    $err = [];

    $name_team = filter_var(trim($_POST['name_team']), FILTER_SANITIZE_STRING);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //вывод ошибок
    $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'in_marvel');
    if (!$connection) 
    {
        echo "Ошибка подключения к БД. Код ошибки: " . mysqli_connect_error();
        exit();
    }

    // Проверка существования команды
    $query = $connection->query("SELECT id_race FROM race WHERE name_team='$name_team'");
    if(mysqli_num_rows($query) > 0){
        $err[] = "Такая команда уже существует в базе данных";
    }

    // Добавление новой записи
    if(count($err) == 0){
        $connection->query("INSERT INTO team name_team VALUES '$name_team'");
        
        mysqli_close($connection);
        header('Location: /');
        exit();
    }
    else {
        // Вывод ошибок
        print "<b>При добавлении произошли следующие ошибки:</b><br>";
        foreach($err AS $error){
            print $error."<br>";    
        }
    }

    // Закрываем соединение
    mysqli_close($connection);
?>