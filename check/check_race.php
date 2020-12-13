<?php
    $err = [];

    $name_race = filter_var(trim($_POST['name_race']), FILTER_SANITIZE_STRING);
    $habitat = filter_var(trim($_POST['habitat']), FILTER_SANITIZE_STRING);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //вывод ошибок
    $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'in_marvel');
    if (!$connection) 
    {
        echo "Ошибка подключения к БД. Код ошибки: " . mysqli_connect_error();
        exit();
    }

    // Проверка существования расы
    $query = $connection->query("SELECT id_race FROM race WHERE name_race='$name_race'");
    if(mysqli_num_rows($query) > 0){
        $err[] = "Такая раса уже существует в базе данных";
    }

    // Добавление новой записи
    if(count($err) == 0){
        $connection->query("INSERT INTO race (name_race, habitat) VALUES ('$name_race', '$habitat')");
        
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