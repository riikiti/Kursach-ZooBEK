<?php
    session_start();

    $title = "Регистрация";
    require __DIR__ . "/header.php";
?>

<div class="content">
    <h1>Регистрация</h1>

    <form action="vendor/signup.php" method="post">
        <input type="text" name="login" placeholder="Введите свой логин">
        <input type="email" name="email" placeholder="Введите Email">
        <input type="text" name="name"placeholder="Введите имя">
        <input type="password" name="password" placeholder="Введите пароль">
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="btn btn-outline-primary fs-4">Зарегестрироваться</button>

        <p>У вас уже есть аккаунт? <a href="authorization.php">Авторизируйтесь</a>!</p>

        <?php
            if ($_SESSION['message']) {
                echo '<p class="fs-5 text-danger"> ' . $_SESSION['message'] . ' </p>';
            }
            
            unset($_SESSION['message']);
        ?>
    </form>
</div>

<?php require __DIR__ . "/footer.php"; ?>