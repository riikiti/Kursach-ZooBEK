<?php
    session_start();
    if (!isset($_SESSION['user']))
        header("location: authorization.php");
        
    $title = "Ваш профиль";
    require __DIR__ . "/header.php";
?>
<div class="content">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-sm-3">Логин</div>
                            <div class="col-sm-9 border-start border-2">
                                <p class="text-muted mb-0"><?= $_SESSION['user']['login'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-sm-3">Email</div>
                            <div class="col-sm-9 border-start border-2">
                                <p class="text-muted mb-0"><?= $_SESSION['user']['email'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-sm-3">Имя</div>
                            <div class="col-sm-9 border-start border-2">
                                <p class="text-muted mb-0"><?= $_SESSION['user']['name'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="text-center mt-4 mb-2"><a href="editProfile.php">Редактировать информацию</a>.</h5>
            </div>
        </div>

        <?php
            if ($_SESSION['message']) {
                echo '<p> ' . $_SESSION['message'] . ' </p>';
            }

            unset($_SESSION['message']);
        ?>
    </div>
</div>

<?php require __DIR__ . "/footer.php"; ?>