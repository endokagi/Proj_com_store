<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $i = $_POST['index'];
  $amount = $_POST['amount'];

  $connect = mysqli_connect("localhost", "root", "", "computerstore");
  $sql = 'select unit from stock where stockid=' . $_SESSION['cartSID'][$i];
  $result = mysqli_query($connect, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $unit = $row[0];
  }
  if($amount>0){
    if ($unit >= $amount) {
      if ($_SESSION['cartAmount'][$i] > $amount) {
        $unitchange = $_SESSION['cartAmount'][$i] - $amount;
        $sql = 'UPDATE stock
              set unit = unit + ' . $unitchange . ' where stockid =' . $_SESSION['cartSID'][$i];
        $_SESSION['cartTotolPrice'] -= $_SESSION['cartPrice'][$i] * $unitchange;
      } else {
        $unitchange = $amount - $_SESSION['cartAmount'][$i];
        $sql = 'UPDATE stock
              set unit = unit - ' . $unitchange . ' where stockid =' . $_SESSION['cartSID'][$i];
        $_SESSION['cartTotolPrice'] += $_SESSION['cartPrice'][$i] * $unitchange;
      }
      $result = mysqli_query($connect, $sql);
  
      $_SESSION['alert_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulation!</strong> Updated amount of product['
        . $_SESSION['cartPname'][$i] . '] from '
        . $_SESSION['cartAmoung'][$i] . ' to be ' . $amount . '.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                  </div>';
      $_SESSION['cartAmount'][$i] = $amount;
      header('location:../');
    } else {
      $_SESSION['alert_message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Fail to update amount!</strong> Stock not enough.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                  </div>';
      header('location:../');
    }
  }else{
    $_SESSION['alert_message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Fail to update amount!</strong> Amount can not below zero.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                  </div>';
      header('location:../');
  }
  
} else {
  header('location:../');
}
?>
