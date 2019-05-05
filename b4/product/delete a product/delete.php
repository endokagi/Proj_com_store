<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $connect = mysqli_connect("localhost", "root", "", "computerstore");
    $sql1 = 'delete from product 
            where productid=' . $_POST['pid_delete'];
    $sql2='delete from stock 
    where stockid=' . $_POST['sid_delete'];
    $result = mysqli_query($connect,$sql1);
    $result = mysqli_query($connect,$sql2);
    if (!$result) {
        echo mysqli_error($connect) . '<br>';
        die('Can not access database');
    } else{
      mysqli_close($connect);
        $_SESSION['alert_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation!</strong> The product at id="'.$_POST['pid_delete'].'" has been deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      
      echo "<script>window.location.href = '../index.php';</script>";
    }
} else {
    header('location:../');
}
?>