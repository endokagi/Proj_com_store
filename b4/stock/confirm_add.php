<?php
$stockid = $_POST['stockid'];
$add = $_POST['add_stock'];

include('../../validation/validate.php');
if (validatePrice($add)) {
    $connect = mysqli_connect("localhost", "root", "", "computerstore");
    $sql = 'UPDATE stock
    set unit = unit +'.$add.' where stockid ='.$stockid.'';
    $result = mysqli_query($connect,$sql);
    mysqli_close($connect);
    header("location:./index.php");
}else{
    echo'<script>alert("Unit below limit")
    window.location.href="index.php";
    </script>';
    
}
?>