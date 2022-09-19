<?php
    session_start();

    require_once "connect.php";

    $login = $_POST['login'];
    $check_login = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login'");
    $bool = false;

    if ($login == "")
        $_SESSION['message'] = 'Заполните поле';
    else if ($login == "admin")
        $_SESSION['message'] = 'Для этого аккаунта такое действие невозможно!';
    else if (mysqli_num_rows($check_login) <= 0)
        $_SESSION['message'] = 'Аккаунта с таким логином не существует';
    else {
        $user = mysqli_fetch_assoc($check_user);
        $email = $user['email'];
        $message = ("url: localhost/newPassword.php?login=$login");

        if(mail($email, 'Восстановление пароля', $message, 'From: zoolandd666@gmail.com')){
            $_SESSION['message'] = 'Письмо отправлено!';
            $bool = true;
        }
        else
            $_SESSION['message'] = 'Произошла ошибка при отправке письма';
    }

    
    if ($bool)
        header('Location: ../newPassword.php?login='.$login.'&color=green');
    else
        header("location: ../passwordReset.php");
?>