<?php
    session_start();

    if ($_SESSION['user']['login'] != "admin")
        header('Location: authorization.php');

    $title = "Администрирование";
    require_once "vendor/connect.php";
    require __DIR__ . "/header.php";
?>

<div class="content">
    <div class="w-100 d-flex align-items-center justify-content-around">
        <a class="btn btn-secondary fs-2" href="/indexTicket.php">Билеты</a>
        <a class="btn btn-secondary fs-2" href="/indexAdmin.php">Пользователи</a>
    </div>

    <div class="container-fluid mt-5">
        <?php
            $sql = "SELECT * FROM `users`";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table class='table table-hover align-middle text-center fs-5'>";
                        echo "<thead class='table-dark'>";
                            echo "<tr>";
                                echo "<th class='border-end'>id</th>";
                                echo "<th class='border-end'>Логин</th>";
                                echo "<th class='border-end'>Почта</th>";
                                echo "<th class='border-end'>Имя</th>";
                                echo "<th class='border-end'>Пароль(md5)</th>";
                                echo "<th>Удаление</th>";
                            echo "</tr>";
                        echo "</thead>";

                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                                echo "<td class='border-end'>" . $row['id'] . "</td>";
                                echo "<td class='border-end'>" . $row['login'] . "</td>";
                                echo "<td class='border-end'>" . $row['email'] . "</td>";
                                echo "<td class='border-end'>" . $row['name'] . "</td>";
                                echo "<td class='border-end'>" . $row['password'] . "</td>";
                                echo "<td><a href='vendorAdmin/deleteUser.php?id=" . $row['id'] . "' title='Удалить'>";
                                echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-trash text-dark' viewBox='0 0 16 16'>";
                                echo "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>";
                                echo "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>";
                                echo "</svg></a></td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                    echo "</table>";
                    
                    mysqli_free_result($result);
                } else
                    echo "<p class='lead'><em>Не найдено никаких пользователей</em></p>";
            } else
                echo "ОШИБКА: не удалось выполнить $sql. " . mysqli_error($link);

            mysqli_close($link);
        ?>
    </div>
</div>

<?php require __DIR__ . "/footer.php"; ?>