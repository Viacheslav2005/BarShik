<?php
session_start();
include "connect.php";

$id_user = $_SESSION["User_id"];
$id_product = isset($_POST["id_product"]) ? $_POST["id_product"] : false;
$name = isset($_POST["name"]) ? $_POST["name"] : false;
$price = isset($_POST["price"]) ? $_POST["price"] : false;
$count = isset($_POST["count"]) ? $_POST["count"] : false;

$add_arr = array(
    "name" => "$name",
    "price" => "$price",
    "count" => "$count",
    "id_product" => "$id_product");
$jsonData = json_encode($add_arr);

if($name and $price and $count) {
    $add = mysqli_query($con, "INSERT INTO `Basket`(`User_id`, `Content`) VALUES ('$id_user', '$jsonData')");
    $_SESSION["message"] = "Товар успешно добавлен в корзину!";
    header("Location: basket.php");
} else {
    $_SESSION["message"] = "Ошибка";
}
?>