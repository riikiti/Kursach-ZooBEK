<?php
session_start();

require_once "vendor/connect.php";

$tour_name = $_POST['tour_name'];
$tour_date = $_POST['tour_date'];
$tour_count = $_POST['tour_count'];
$tour_photo = $_FILES['tour_photo']["name"];



$path = 'uploads/' . time() . $_FILES['tour_photo']["name"];
move_uploaded_file($_FILES['tour_photo']['tmp_name'], $path);
mysqli_query($link, "INSERT INTO `tours` (`id_tour`, `tour_name`, `tour_date`, `tour_count`, `tour_photo`) VALUES (NULL, '$tour_name', '$tour_date', '$tour_count', '$path')");
header('Location: /indexTicket.php');




?>