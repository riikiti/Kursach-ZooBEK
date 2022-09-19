<?php
session_start();
require_once "connect.php";
$id_tour = $_GET['id_tour'] ;
$tour_count = $_GET['tour_count'] - 1;

$tour_name = $_GET['tour_name'];
$user=$_GET['user_name'];

mysqli_query($link, "UPDATE `tours` SET `tour_count`='$tour_count' WHERE `id_tour`=$id_tour");
$subject = 'Покупка Тура';
$to = $_SESSION['user']['email'];
$from = 'Arkadiy@krutoi.ru';
$message = ("Дорогой $user, вы оформили тур в:$tour_name, спасибо что пользуетесь нашими услугами");
mail($to,$subject,$message);
header('Location: /profile.php');
?>
