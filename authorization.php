<?php
    session_start();

    $color = $_GET['color'];

    $title = "Авторизация";
    require __DIR__ . "/header.php";
?>

<div class="content">
    <h1>Авторизация</h1>

    <form action="vendor/signin.php" method="post">
        <input type="text" name="login" placeholder="Введите свой логин">
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit" class="btn btn-outline-primary fs-4">Войти</button>
        
        <p> У вас нет аккаунта? <a href="register.php">Зарегистрируйтесь</a>! </p>
        <p> Забыли пароль? <a href="passwordReset.php">Восстановите</a>! </p>

        <?php
            if ($_SESSION['message']) {
                if ($color == "green")
                    echo '<p class="fs-5 text-success"> ' . $_SESSION['message'] . ' </p>';
                else
                    echo '<p class="fs-5 text-danger"> ' . $_SESSION['message'] . ' </p>';
            }
            
            unset($_SESSION['message']);
        ?>
    </form>
</div>

<?php require __DIR__ . "/footer.php"; ?>