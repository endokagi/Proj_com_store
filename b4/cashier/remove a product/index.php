<?php
session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $i=$_POST['index'];
        $_SESSION['cartTotolPrice'] -= $_SESSION['cartPrice'][$i]*$_SESSION['cartAmount'][$i];

        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sql = 'UPDATE stock
        set unit = unit + '.$_SESSION['cartAmount'][$i].' where stockid ='.$_SESSION['cartSID'][$i];
        $result = mysqli_query($connect,$sql);
        mysqli_close($connect);
        $_SESSION['cartPID'][$i]='';
        $_SESSION['cartPname'][$i]='';
        $_SESSION['cartPdetail'][$i]='' ;
        $_SESSION['cartBname'][$i]='';
        $_SESSION['cartCname'][$i]='';
        $_SESSION['cartPrice'][$i]=0;
        $_SESSION['cartUnit'][$i]=0;
        $_SESSION['cartSID'][$i]=0;
        $_SESSION['cartAmount'][$i]=0;
        $_SESSION['alert_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Congratulation!</strong> Remove a product from order successful.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>';
        header('location:../');
    }else{
        header('location:../');
    }
?>