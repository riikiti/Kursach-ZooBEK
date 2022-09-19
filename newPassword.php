<?php
    session_start();

    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
    
    $login = $_GET['login'];
    $color = $_GET['color'];

    $title = "Новый пароль";
    require __DIR__ . "/header.php";
?>

<div class="content">
    <h1>Придумайте новый пароль и запомните его!</h1>

    <form action="vendor/updatePassword.php" method="post">
        <input type="text" name="login" value="<?= $login ?>" placeholder="Введите свой логин" readonly>
        <input type="password" name="password" placeholder="Введите новый пароль">
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="btn btn-outline-primary fs-4">Изменить</button>
        
        <p> Вспомнили пароль? <a href="authorization.php">Авторизуйтесь</a>! </p>

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