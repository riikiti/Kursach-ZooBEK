<?php
    session_start();
    if (!isset($_SESSION['user']))
        header("location: authorization.php");

    $title = "О нас";
    require __DIR__ . "/header.php";
?>

<div class="content">
    <h1 class="w-50 mb-5"><b>Юридический адрес</b>: 241035, Брянская область, город Брянск, Бежицкий район, бульвар 50 лет Октября, д.7.</h1>

    <div class="map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aaf3cfc8554e77da1b4b8677ef0d1020c6ab882a4ce3e846d33b5f5a23966a883&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
</div>

<?php require __DIR__ . "/footer.php"; ?>