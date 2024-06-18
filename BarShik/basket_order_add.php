<?php
session_start();
include "connect.php";

$id_user = $_SESSION["User_id"];

$id_product = isset($_POST["id_product"]) ? $_POST["id_product"] : false;
$name = isset($_POST["name"]) ? $_POST["name"] : false;
$price = isset($_POST["price"]) ? $_POST["price"] : false;
$count = isset($_POST["count"]) ? $_POST["count"] : false;

$total_price = $price * $count;

$currentDateString = date('Y-m-d H:i:s');

if(isset($id_user)) {
    $query = mysqli_query($con, "INSERT INTO `Orders`(`id_product`, `User_id`, `Date_of_order`, `Status`, `Total_price`) VALUES ($id_product,$id_user, '$currentDateString', 'Новый', $total_price)");
    $query1 = mysqli_query($con, "DELETE FROM `Basket` WHERE `User_id` = '$id_user'");
    $_SESSION["message"] = "Заказ оформлен";
    header("Location: /catalog.php");
} 

?>