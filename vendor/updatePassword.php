<?php
    session_start();

    require_once "connect.php";

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $check_login = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login'");
    $bool = false;

    if ($password == "" || $password_confirm == "")
        $_SESSION['message'] = 'Заполните все поля';
    else if ($password === $password_confirm) {
        $password = md5($password);
        $bool = true;
        $_SESSION['message'] = 'Пароль успешно изменён!';
        mysqli_query($link, " UPDATE `users` SET password='$password' WHERE login='$login'");
    } else
        $_SESSION['message'] = 'Пароли не совпадают';

    if ($bool)
        header('Location: ../authorization.php?color=green');
    else
        header('Location: ../newPassword.php?login='.$login.'');
?>