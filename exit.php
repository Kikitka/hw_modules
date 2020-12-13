<?php
    setcookie('user', $user['name'], time() - 3600, "/");
    setcookie('user_status', $user['user_status'], time() - 3600, "/");
    header('Location: /');
?>