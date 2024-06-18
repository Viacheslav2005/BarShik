<?php
include "../connect.php";

session_start();

$user = isset($_SESSION["User_id"]) ? mysqli_fetch_assoc(mysqli_query($con, "SELECT `role` FROM Users WHERE User_id =".$_SESSION['User_id']))['role'] : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style-header.css">
</head>
<body>
<header  content="width=device-width, initial-scale=1">
    <div class="container">
        <div class="naw-header">
            <h1>BarShik</h1>
            <div class="naw-menu">
                <a class="nav_text" href="product.php">Товары</a>
                <a class="nav_text" href="Categories.php">Категории</a>
                <a class="nav_text" href="order.php">Заказы</a>
                <a class="nav_text" href="#footer">Статистика и отчеты</a>
                <?php if ($user) {?>
                <a href="/Index.php">
                    <?= $user?>
                </a>
                <?php } ?>
                <a href='../<?= (!$user)? "auto" : "signout" ?>.php' <span><?= (!$user) ? "Вход" : "Выход" ?></span></a>
            </div>
        </div>
    </div>
</header>
</body>
</html>
