<?php
        $err = [];

        $login = filter_var(trim($_POST['user_login']), FILTER_SANITIZE_STRING);

        $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'inmarvel');
        if (!$connection) {
            echo "Ошибка подключения к БД. Код ошибки: " . mysqli_connect_error();
            exit();
        }
        
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
        $password = md5($password);

        // Проверка данных
        $result = $connection->query("SELECT * FROM users WHERE user_login = '$login' AND passw = '$password'");
        $user = $result->fetch_assoc();
        if(count($user) == 0){
            echo "Неверный логин или пароль";
            exit();
        }

        // Авторизация
        setcookie('user', $user['username'], time() + 3600, "/");
        setcookie('user_status', $user['user_status'], time() + 3600, "/");

        // освобождение используемой памяти
        mysqli_free_result($result);
    
        // Закрываем соединение
        mysqli_close($connection);

        header('Location: /enter.php');
?>