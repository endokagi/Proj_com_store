<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if ($_POST['cusid'] == 'Choose...') {
    $_SESSION['alert_message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> Please select customer or create one.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    header('location:../');
  } else {
    if ($_SESSION['cartStatus'] == "ordering") {
      $connect = mysqli_connect("localhost", "root", "", "computerstore");
      $sql = 'insert into ordering values(NULL,NULL,' . $_SESSION['cartTotolPrice'] . ',' . $_POST['cusid'] . ');';
      $result = mysqli_query($connect, $sql);
      $sqlSelectStockID = 'SELECT *
        FROM ordering
        ORDER BY orderid DESC
        LIMIT 1';
      $result = mysqli_query($connect, $sqlSelectStockID);
      while($row=mysqli_fetch_array($result)){
        $orderingID = $row[0];
      }
      for ($i = 0; $i < count($_SESSION['cartPID']); $i++) {
        if ($_SESSION['cartPID'][$i]!='') {
          $sql = 'insert into orderingdetail values(' . $orderingID . ',' . $_SESSION['cartPID'][$i]. ','.$_SESSION['cartAmount'][$i].')';
          mysqli_query($connect, $sql);
        }
      }
      session_destroy();
      $_SESSION['alert_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Congratulation!</strong> Ordering successful.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      header('location:../');
      
    } else {
      $_SESSION['alert_message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> The order is empty.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      header('location:../');
    }
  }
} else {
  header('location:../');
}
?>