<?php
session_start();

require_once "../vendor/connect.php";

$id = $_GET["id"];
var_dump($id);
mysqli_fetch_assoc(mysqli_query($link, "DELETE FROM `tours` WHERE `id_tour`= '$id'"));

header("location: ../indexTicket.php");
?>