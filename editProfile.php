<?php
    session_start();
    if (!isset($_SESSION['user']))
        header("location: authorization.php");

    if ($_SESSION['user']['login'] == "admin") {
        $foolproof = "readonly";
        $val = "value='admin'";
    }

    $title = "Редактирование";
    
    require_once "vendor/connect.php";
    require __DIR__ . "/header.php";
?>

<div class="content">
    <h1>Изменение данных аккаунта</h1>

    <form action="vendorAdmin/edit.php" method="post">
        <input type="text" name="login" value="<?= $_SESSION['user']['login'] ?>" placeholder="Введите логин" <?= $foolproof ?>>
        <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" placeholder="Введите Email">
        <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>" placeholder="Введите имя">
        <input type="password" name="password" <?= $val ?> placeholder="Введите пароль" <?= $foolproof ?>>
        <input type="password" name="password_confirm" <?= $val ?> placeholder="Подтвердите пароль" <?= $foolproof ?>>
        <button type="submit" class="btn btn-outline-success fs-4">Сохранить</button>

        <?php
            if ($_SESSION['message']) {
                echo '<p class="fs-5 text-danger"> ' . $_SESSION['message'] . ' </p>';
            }
            
            unset($_SESSION['message']);
        ?>
    </form>
</div>

<?php require __DIR__ . "/footer.php"; ?>