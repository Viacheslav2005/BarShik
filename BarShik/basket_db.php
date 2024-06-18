<?php
session_start();
include "connect.php";

$id_user = $_SESSION["User_id"];

if(isset($id_user)) {
    $query = mysqli_query($con, "DELETE FROM `Basket` WHERE `User_id` = '$id_user'");
    $_SESSION["message"] = "Корзина очищена";
    header("Location: /catalog.php");
} 

?>