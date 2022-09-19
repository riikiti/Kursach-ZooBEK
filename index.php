<?php
session_start();

$title = "Контактный зоопарк";
require_once "vendor/connect.php";
require __DIR__ . "/header.php";
?>

<section class="content">
    <h1>В нашем зоопарке отборные звери</h1>
    <div class="zoo-wrap">
        <div class="zoo-content">

            <?php

            // Attempt select query execution
            $sql = "SELECT * FROM `tours`";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                        $image = $row['tour_photo'];
                        $tour_name = $row['tour_name'];
                        $tour_date = $row['tour_date'];
                        $tour_count = $row['tour_count'];
                        $id_tour = $row['id_tour'];

                        //var_dump($free_tour);
                        $tour_card_disabled = 'card-disabled';
                        $disabled = 'disabled';
                        $user = $_SESSION['user']['id'];
                        $user_name = $_SESSION['user']['login'];
                        if ($_SESSION['user']['id'] != NULL) {
                            if ($tour_count > 0) {
                                echo " <form action='/vendor/TakeTour.php' method='GET' class='tours-card'>";
                                echo "<img src='$image'>";
                                echo "<div class='zoo-card'>";
                                    echo " <h3>$tour_name</h3>";
                                    echo " <input hidden name='id_tour' value='$id_tour'>";
                                    echo " <input hidden name='id_client' value='$user'>";
                                    echo " <input hidden name='user_name' value='$user_name'>";
                                    echo " <input hidden name='tour_name' value='$tour_name'>";
                                    echo " <span class='card__count'>$tour_date</span>";
                                    echo " <span class='card__count'>Свободно :  $tour_count  мест</span>";
                                    echo "<button type='submit' class='third cars-btn'>Заказать</button>";
                                echo "</div>";
                                echo "</form>";
                            } else {
                                echo " <form action='/vendor/TakeTour.php' method='GET' class='$tour_card_disabled'>";
                                echo "<img src='$image'>";
                                echo "<div class='zoo-card'>";
                                echo " <h3>$tour_name</h3>";
                                echo " <span class='card__count'>$tour_date</span>";
                                echo " <span class='card__count'>Свободно :  $tour_count  мест</span>";
                                echo "<button $disabled type='submit' class='third cars-btn'>Заказать</button>";
                                echo "</div>";
                                echo "</form>";
                            }
                        } else {
                            echo " <form action='/vendor/TakeTour.php' method='GET' class='tours-card'>";
                            echo "<img src='$image'>";
                            echo "<div class='zoo-card'>";
                            echo " <h3>$tour_name</h3>";
                            echo " <span class='card__count'>$tour_date</span>";
                            echo " <span class='card__count'>Свободно :  $tour_count  мест</span>";
                            echo "<button $disabled type='submit' class='third cars-btn'>Заказать</button>";
                            echo "</div>";
                            echo "</form>";
                        }
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }

            // Close connection
            mysqli_close($link);

            ?>
        </div>


    </div>
    </div>
</section>

<?php require __DIR__ . "/footer.php"; ?>


<!-- <div class="zoo-card">
    <h3 class="card__title">
ZOO1
    </h3>
    <p class="card__count">12 штук</p>
    <img src="img/logo.png" alt="gg">
    -->
