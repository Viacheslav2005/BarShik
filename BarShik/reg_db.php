<?php 
include "connect.php";
session_start();
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if(mb_strlen($email) < 5 || mb_strlen($email) > 100) {
    echo "Недопустимая длина логина"; 
    exit();
} 

$result = mysqli_query($con, "SELECT * FROM `Users` WHERE `Email` = '$email'");
$user1 = mysqli_fetch_assoc($result);

if(!empty($user1)) {
    $_SESSION["message"] = "Данный логин уже используется";
    header('Location: reg.php');
    exit();
} else {
    mysqli_query($con, "INSERT INTO `Users`(`Email`, `Password_hash`, `Bonus_points`, `role`) VALUES ('$email', $password, 1, 'user')");

    $_SESSION["User_id"] = mysqli_insert_id($con);

    header('Location: auto.php');
}
?>