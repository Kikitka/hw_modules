<?php
    $err = [];

    $name_sp = filter_var(trim($_POST['name_sp']), FILTER_SANITIZE_STRING);
    $reason_app = filter_var(trim($_POST['reason_app']), FILTER_SANITIZE_STRING);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //вывод ошибок
    $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'inmarvel');
    if (!$connection) 
    {
        echo "Ошибка подключения к БД. Код ошибки: " . mysqli_connect_error();
        exit();
    }

    // Проверка существования способности
    $query = $connection->query("SELECT id_sp AND reason_app FROM super_power WHERE name_sp='$name_sp' AND reason_app='$reason_app'");
    if(mysqli_num_rows($query) > 0){
        $err[] = "Такая способность уже существует в базе данных";
    }

    // Добавление новой записи
    if(count($err) == 0){
        $connection->query("INSERT INTO super_power (name_sp, reason_app) VALUES ('$name_sp', '$reason_app')");
        
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