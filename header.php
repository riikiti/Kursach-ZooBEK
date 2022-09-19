<?php
    session_start();

    if ($_SESSION['user']['login'] == "admin")
        $admin = "Admin";
?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="img/logo.ico">
    <title><?php echo $title; ?></title>
</head>

<body>
<div class="wrapper">
    <header>
        <div class="header-logo">
            <a href="index<?php echo $admin; ?>.php"><img src="img/logo.png" alt="logo" title="На галвную"></a>
        </div>
        <div class="zoo-name">
            <div>Хакуна</div>
            <div>Матата</div>
        </div>
        <div class="header-action">
            <ul>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li><a href="profile.php">Профиль</a></li>
                    <li><a href="vendor/logout.php">Выход</a></li>
                <?php else : ?>
                    <li><a href="authorization.php">Вход</a></li>
                    <li><a href="register.php">Регистрация</a></li>
                <?php endif; ?>
            </ul>

            <nav class="header-links">
                <a href="about.php">О нас</a>
                <a href="map.php">На карте</a>
            </nav>
        </div>
    </header>