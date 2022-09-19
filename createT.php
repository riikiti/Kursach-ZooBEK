
<?php
session_start();

if ($_SESSION['user']['login'] != "admin")
    header('Location: authorization.php');

$title = "Администрирование";
require_once "vendor/connect.php";
require __DIR__ . "/header.php";
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Создание новости</h2>
                </div>
                <form action="/CT.php" method="post" enctype="multipart/form-data">
                    <label>TOUR NAME</label>
                    <input type="text" name="tour_name" placeholder="Введите tour_name">
                    <label>TOUR DATE</label>
                    <input type="text" name="tour_date" placeholder="Введите tour_date">
                    <label>TOUR COUNT</label>
                    <input type="text" name="tour_count" placeholder="Введите tour_count">
                    <label>TOUR PHOTO</label>
                    <input type="file" name="tour_photo">
                    <button class="third" type="submit">Вперед</button>
                    <?php
                    if ($_SESSION['message']) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                    }
                    unset($_SESSION['message']);
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . "/footer.php"; ?>
