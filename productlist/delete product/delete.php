<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $connect = mysqli_connect("localhost", "root", "", "computerstore");
    $sql = 'delete from product 
            where productid=' . $_POST['pid_delete'];
    $result = mysqli_query($connect, $sql);
    if (!$result) {
        echo mysqli_error($connect) . '<br>';
        die('Can not access database');
    } else
        header('location:../');
} else {
    header('location:../');
}
?>
