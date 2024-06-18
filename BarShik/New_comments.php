<?php 
include "connect.php";

$id = isset($_POST['ID'])?$_POST['ID']:false;

$Comment_text = isset($_POST['text'])?$_POST['text']:false;

if(isset($Comment_text)) {
    $result= mysqli_query($con," UPDATE `Orders` 
    SET `Comment`= '$Comment_text' where Id_order = $id ");
        echo"<script>alert('Коментарий добавлен');
        location.href ='personal-cab.php';
        </script>";
} else {
    echo"<script>alert('Коментарий не может быть пустым');
    location.href ='personal-cab.php';
    </script>";
}
?>