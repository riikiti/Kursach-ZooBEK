<?php
    session_start();
    unset($_SESSION['user']);
    if ($color = $_GET['color'])
        header('Location: ../authorization.php?color=green');
    else
        header('Location: ../authorization.php');
?>