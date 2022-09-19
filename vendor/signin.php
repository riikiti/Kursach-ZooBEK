<?php
    session_start();
    
    require_once "connect.php";

    $login = $_POST['login'];
    $pass = $_POST['password'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email'],
            "name" => $user['name'],
        ];

        if ($login == "admin" && $pass == "admin")
            header('Location: ../indexAdmin.php');
        else
            header('Location: ../index.php');
    } else {
        if ($login == "" || $pass == "")
            $_SESSION['message'] = 'Заполните все поля';
        else
            $_SESSION['message'] = 'Неправильный логин или пароль';

        header('Location: ../authorization.php');
    }
?>