<?php
session_start();
require_once "connect.php";

$user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : false;
$Name = isset($_POST["Name"]) ? $_POST["Name"] : false;
$Password = isset($_POST["Password"]) ? $_POST["Password"] : false;

$query_name = mysqli_query($con, "SELECT * FROM `Users` WHERE `Email` = '$Name'");
$query_password = mysqli_query($con, "SELECT * FROM `Users` WHERE `Password_hash` = '$Password'");
$query_all = mysqli_query($con, "SELECT * FROM `Users` WHERE `Email` = '$Name' and `Password_hash` = '$Password'");

if ($Name and mysqli_num_rows($query_name) == 0) {
    $query = mysqli_query($con, "UPDATE `Users` SET `Email` = '$Name' WHERE `User_id` = '$user_id'");
    $_SESSION["message"] = "Данные успешно обновленны";
    header("Location: personal-cab.php");
}
if ($Password and mysqli_num_rows($query_password) == 0) {
    $query = mysqli_query($con, "UPDATE `Users` SET `Password_hash` = '$Password' WHERE `User_id` = '$user_id'");
    $_SESSION["message"] = "Данные успешно обновленны";
    header("Location: personal-cab.php");
}
if ($Name and $Password and mysqli_num_rows($query_all) == 0) {
    $query = mysqli_query($con, "UPDATE `Users` SET `Email` = '$Name',`Password_hash` = '$Password' WHERE `User_id` = '$user_id'");
    $_SESSION["message"] = "Данные успешно обновленны";
    header("Location: personal-cab.php");
}

?>ы