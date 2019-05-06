<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $duplicate = false;
  for ($i = 0; $i < count($_SESSION['cartPID']); $i++) {
    if ($_SESSION['cartPID'][$i] == $_POST["pid"]){
      $index=$i;
      $duplicate = true;
    }
  }
  if ($duplicate) { 
    $_SESSION['cartAmount'][$index] +=1;
    $_SESSION['cartStatus'] = "ordering";
    $_SESSION['cartTotolPrice'] += $_POST['price'];
    $connect = mysqli_connect("localhost", "root", "", "computerstore");
    $sql = 'UPDATE stock
    set unit = unit - 1 where stockid ='.$_POST['sid'];
    $result = mysqli_query($connect,$sql);
    mysqli_close($connect);
    $_SESSION['alert_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Congratulation!</strong> Add a product to order successful.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  } else {
    $_SESSION['cartPID'][] = $_POST["pid"];
    $_SESSION['cartPname'][] = $_POST['pname'];
    $_SESSION['cartPdetail'][] = $_POST['pdetail'];
    $_SESSION['cartBname'][] = $_POST['bname'];
    $_SESSION['cartCname'][] = $_POST['cname'];
    $_SESSION['cartPrice'][] = $_POST['price'];
    $_SESSION['cartUnit'][] = $_POST['unit'];
    $_SESSION['cartSID'][]= $_POST['sid'];
    $_SESSION['cartAmount'][] = 1;
    $_SESSION['cartStatus'] = "ordering";
    $_SESSION['cartTotolPrice'] += $_POST['price'];
    $connect = mysqli_connect("localhost", "root", "", "computerstore");
    $sql = 'UPDATE stock
    set unit = unit - 1 where stockid ='.$_POST['sid'];
    $result = mysqli_query($connect,$sql);
    mysqli_close($connect);
    $_SESSION['alert_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Congratulation!</strong> Add a product to order successful.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  header('location:../');
}else {
  header('location:index.php');
}
?>