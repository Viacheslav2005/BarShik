<?php
include "../connect.php";
$ID = isset($_POST['id'])?$_POST['id']:false;
$delevery = isset($_POST['delevery'])?$_POST['delevery']:false;
$Info_orders = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from `Orders` where Id_order = $ID "));
if($Info_orders['Status'] != $delevery){
  $result = mysqli_query($con, " UPDATE `Orders` 
  SET `Status`= '$delevery' where Id_order = $ID ");
          echo"<script>alert('Заказ Обновлен');
          location.href ='order.php';
          </script>";
}else{
    echo"<script>alert('Заказ актуален');
    location.href ='order.php';
    </script>";
}
?>