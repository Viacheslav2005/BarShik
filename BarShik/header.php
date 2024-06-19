<?php
include "connect.php";

session_start();

$user = isset($_SESSION["User_id"]) ? mysqli_fetch_assoc(mysqli_query($con, "SELECT `role` FROM Users WHERE User_id =".$_SESSION['User_id']))['role'] : false;

if (isset($_SESSION["message"])) {
    $mess = $_SESSION["message"];
    echo "<script>alert('$mess')</script>";
    unset($_SESSION["message"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>
<body>
<header  content="width=device-width, initial-scale=1">
    <div class="container">
        <div class="naw-header">
            <img src="images\Group 8192.png" alt="" class="logo">
            <h1>BarShik</h1>
            <div class="naw-menu">
                <a href="/">Главная</a>
                <a href="catalog.php">Каталог</a>
                <?php if(isset($_SESSION["auth"])) { ?>
                    <a href = "basket.php">Корзина</a>
                <?php } else { ?>
                <?php } ?>
                <a href="#footer">Контакты</a>
                <?php if ($user) {?>
                <a href="/personal-cab.php">
                    <?= $user?>
                </a>
                <?php } ?>
                <a href='<?= (!$user)? "auto" : "signout" ?>.php'<span><?= (!$user) ? "Вход" : "Выход" ?></span></a>
            </div>
        </div>
    </div>
</header>
</body>
</html>