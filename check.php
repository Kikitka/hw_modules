<?php
        $err = [];

        $name = filter_var(trim($_POST['full_name']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $login = filter_var(trim($_POST['user_login']), FILTER_SANITIZE_STRING);
        $temp_fav_hero = filter_var(trim($_POST['favorite_hero']), FILTER_SANITIZE_STRING);

        // Проверки длины вводимых данных
        if(mb_strlen($name) < 3 || mb_strlen($name) > 30){
            echo "Недопустимая длина имени";
            exit();
        }
        else if(mb_strlen($login) < 4 || mb_strlen($login) > 50){
            echo "Недопустимая длина логина";
            exit();
        }

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //вывод ошибок
        $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'inmarvel');
        if (!$connection) 
        {
            echo "Ошибка подключения к БД. Код ошибки: " . mysqli_connect_error();
            exit();
        }

        // Проверка символов в логине
        if(!preg_match("/^[a-zA-Z0-9]+$/",$login)){
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }

        // Проверка существования пользователя
        $query = $connection->query("SELECT id_user FROM users WHERE user_login='$login'");
        if(mysqli_num_rows($query) > 0){
            $err[] = "Пользователь с таким логином уже существует в базе данных";
        }

        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

        if(mb_strlen($password) < 3 || mb_strlen($password) > 30){
            $err[] = "Недопустимая длина пароля";
            exit();
        }

        // Проверка существования персонажа
        $query = $connection->query("SELECT id_hero FROM super_heroes WHERE super_name='$temp_fav_hero'");
        $check_hero = $query->fetch_assoc();
        if(count($check_hero) > 0){
            $favorite_hero = (int)$check_hero['id_hero'];
        }
        else{
            $err[] = "Такого персонажа нет в базе";
        }

        //Проверка на секретный ключ
        $secret_code = "Человек-павук";
        $secret = filter_var(trim($_POST['secret']), FILTER_SANITIZE_STRING);
        
        if($secret == $secret_code || "Администратор"){
            $user_status = "Администратор";
        }
        else{
            $user_status = "Смотрящий";
        }

        // Добавление нового пользователя
        if(count($err) == 0){

            // Хеширование
            $password = md5($password);

            $connection->query("INSERT INTO users (user_login, passw, email, username, user_status, favorite_hero) VALUES ('$login', '$password', '$email', '$name', '$user_status', $favorite_hero)");
            
            mysqli_close($connection);
            header('Location: /enter.php');
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