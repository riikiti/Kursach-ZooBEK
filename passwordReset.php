<?php
    session_start();

    $title = "Отправка письма на почту";
    require __DIR__ . "/header.php";
?>

<div class="content">
    <h1>Отправка сообщения на почту</h1>

    <form action="vendor/mail.php" method="post">
        <input type="text" name="login" placeholder="Введите свой логин">
        <button type="submit" class="btn btn-outline-primary fs-4">Продолжить</button>
        
        <p> Вспомнили пароль? <a href="authorization.php">Авторизуйтесь</a>! </p>

        <?php
            if ($_SESSION['message']) {
                echo '<p class="fs-5 text-danger"> ' . $_SESSION['message'] . ' </p>';
            }
            
            unset($_SESSION['message']);
        ?>
    </form>
</div>

<?php require __DIR__ . "/footer.php"; ?>