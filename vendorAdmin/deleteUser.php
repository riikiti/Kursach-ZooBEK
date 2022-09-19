<?php
    session_start();

    require_once "../vendor/connect.php";

    $id = $_GET["id"];

    $admin = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$id'"));
    
    if ($admin['login'] == "admin" && $admin['password'] == md5("admin"))
        $_SESSION['message'] = 'Сработала защита от дурака...';
    else
        mysqli_query($link, "DELETE FROM `users` WHERE `id`= '$id'");

    header("location: ../indexAdmin.php");
?>