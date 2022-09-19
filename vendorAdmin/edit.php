<?php
    session_start();
    
    require_once "../vendor/connect.php";

    $id = $_SESSION['user']['id'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $bool = false;

    if ($login == "" || $email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || $name == "" || $password == "" || $password_confirm == "")
        $_SESSION['message'] = 'Заполните все поля правильно';
    else if ($password === $password_confirm) {
        $password = md5($password);
        $bool = true;
        $_SESSION['message'] = 'Данные успешно изменены';
        mysqli_query($link, "UPDATE `users` SET  `login` = '$login' , `email` = '$email' , `name` = '$name' , `password` = '$password' WHERE `id`= '$id'");
    } else
        $_SESSION['message'] = 'Пароли не совпадают';

    if ($bool)
        header('Location: ../vendor/logout.php?color=green');
    else
        header("location: ../editProfile.php");
?>