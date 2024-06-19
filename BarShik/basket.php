<?php
session_start();
include "header.php";
include "connect.php";
$id_user = $_SESSION["User_id"];
$query = mysqli_query($con, "SELECT `Content` FROM `Basket` WHERE `User_id` = '$id_user'");


if (mysqli_num_rows($query) > 0) {
    // Получение первой строки результата
    $row = $query->fetch_assoc();
    
    $jsonData = $row['Content'];
    $data = json_decode($jsonData, true); // Второй аргумент true позволяет получить массив

?>
<form action="basket_order_add.php" method="POST" style="display: flex; flex-direction: column; width: 25vw;">
    <label for="">Название</label>
    <input readonly type="text" name="name" id="" value="<?=$data['name']?>">
    <label for="">Цена</label>
    <input readonly type="text" name="price" id="" value="<?=$data['price']?>">
    <label for="">Количество</label>
    <input readonly type="text" name="count" id="" value="<?=$data['count']?>">
    <label for="">ID продукта</label>
    <input readonly type="text" name="id_product" id="" value="<?=$data['id_product']?>">
    <input type="submit" value="Заказать">
</form>
<a href = "basket_db.php">Очистить корзину</a>
<?php
} else {
    echo "No results found.";
} ?>
</body>
</html>