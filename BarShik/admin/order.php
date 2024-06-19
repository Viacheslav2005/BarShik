<?php
include "../connect.php";
$Info_orders = mysqli_fetch_all(mysqli_query($con,"SELECT * from `Orders`"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "header_admin.php";
?>
    <div class="products">
        <table>
            <thead>
                <tr>    
                    <th>Номер заказа</th>
                    <th>Пользователь</th>
                    <th>Дата</th>
                    <th>Состав заказа</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                    <th>Отзыв</th>
                    <th>Изменить</th>
                </tr>
            </thead>
            <tbody> <?php foreach ($Info_orders as $orders) {    
                    $Info_user = mysqli_fetch_all(mysqli_query($con,"SELECT * from `Users` 
                    INNER JOIN Orders on Users.User_id = Orders.User_id
                    where Id_order	= $orders[0]"));
                    $info_product = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM `Orders` INNER JOIN Product ON `Orders`.`id_product` = `Product`.`Id_product`"));
                    $total_sum = $orders[5]; // Инициализация переменной для подсчета общей суммы заказа
                ?>
            <tr>
                <form action="order_update.php" method ="POST">
                    <td> <input type="text" name = "id"  value = "<?=$orders[0]?>" readonly></td>
                    <td>
                    <?php foreach ($Info_user as $User) {?>
                    <p><?=$User[1]?><br></p>
                        <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Просмотр отзыва</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                          </div>
                          <div class="modal-body">
                          <form action="New_comment.php" method = "POST">
                              <div class="mb-3">
                                <input type="text" name="ID" value="<?=$orders[0]?>" >
                                <label for="message-text" class="col-form-label">Пользователь</label>
                                <input type="text" name="name"readonly value="<?=$User[1]?>" >
                                <label for="message-text" class="col-form-label">Отзыв</label>
                                <input type="text" name="comennt"readonly value="<?=$orders[8]?>" >
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Оставить отзыв</button>
                          </div>
                    <?php } ?></td>
                    <td><?=$orders[3]?></td>
                    <td>
                    <?php foreach ($info_product as $product) {?>
                        <?php $count = $product[5] / $product[13]?>
                    <p><?=$product[10]?> <?=$count?> шт<br></p>
                    <?php } ?></td>
                    <td><?=$total_sum?></td>
                    <td>                                    
                    <select  name = "delevery" value="">
                        <option name="" id="" selected value = "<?=$orders[4]?>" ><?=$orders[4]?></option>
                        <option name="" id="" value ="Доставлен">Доставлен</option>
                        <option name="" id="" value ="В доставке">В доставке</option>
                        <option name="" id="" value ="Готовим">Готовим</option>
                    </select></td>
                    <td><a href="" data-bs-toggle="modal" data-bs-target="#feedback" >Просмотр отзыва</a></td>
                    <td><input type="submit" class="btn btn-outline-success" value="Редактировать"></td>    
                </form>
                <td>
                    <?php foreach ($Info_orders as $item) { ?>
                        <button type="button" class="btn btn-outline-danger"><a href="order_delete.php?id=<?=$item[0]?>">Удалить</a></button>
                    <?php }?>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>