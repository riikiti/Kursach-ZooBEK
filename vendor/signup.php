<?php
    session_start();

    require_once "connect.php";

    $login = $_POST['login'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $check_login = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login'");
    $bool = false;

    if (mysqli_num_rows($check_login) > 0)
        $_SESSION['message'] = 'Такой логин уже существует';
    else if ($login == "" || $email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || $name == "" || $password == "" || $password_confirm == "")
        $_SESSION['message'] = 'Заполните все поля правильно';
    else if ($password === $password_confirm) {
        $password = md5($password);
        $bool = true;
        mysqli_query($link, "INSERT INTO `users` (`login`, `email`, `name`, `password`) VALUES ('$login', '$email', '$name', '$password')");
    } else
        $_SESSION['message'] = 'Пароли не совпадают';

    if ($bool)
        header('Location: ../authorization.php');
    else
        header("location: ../register.php");
?>