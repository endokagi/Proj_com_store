<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    include("../../../validation/validate.php");
    $pdetail = test_input($_POST['pdetail']);
    $pname = test_input($_POST['pname']);
    $price = $_POST['price'];
    $bid = $_POST['bid'];
    $cid = $_POST['cid'];

    $priceResult = validatePrice($price);
    $pdetailResult = validateProductDetail($pdetail);
    $pnameResult = validateProductName($pname);
    $bidResult = validateSelect($bid);
    $cidResult = validateSelect($cid);

    if ($priceResult && $pdetailResult && $pnameResult && $bidResult && $cidResult) {
        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sqlCreateStock = 'insert into stock values(0,0)';
        $sqlSelectStockID = 'SELECT *
        FROM stock
        ORDER BY stockid DESC
        LIMIT 1';

        $resultCreateStock = mysqli_query($connect, $sqlCreateStock);
        if (!$resultCreateStock) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database');
        } else {
            $resultSelectStockID = mysqli_query($connect, $sqlSelectStockID);
            if (!$resultSelectStockID) {
                echo mysqli_error($connect) . '<br>';
                die('Can not access database');
            } else {
                while ($row = mysqli_fetch_array($resultSelectStockID)) {
                    $stockid = $row[0];
                }
            }
        }
        echo $stockid;

        $sql = 'insert into product
      values(0, 
      "' . $pname . '",
      "' . $pdetail . '",
      ' . $bid . ',
      ' . $cid . ',
      ' . $stockid . ',
      ' . $price . ')';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database');
        } else {
            mysqli_close($connect);
            $_SESSION['pdetail'] = '';
            $_SESSION['pname'] = '';
            $_SESSION['price'] = '';
            $_SESSION['bid'] = '';
            $_SESSION['cid'] = '';
            $_SESSION['alert_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> Add a new product successful.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            header('location:index.php');
        }
    } else {
        $_SESSION['pdetail'] = $pdetail;
        $_SESSION['pname'] = $pname;
        $_SESSION['price'] = $price;
        $_SESSION['bid'] = $bid;
        $_SESSION['cid'] = $cid;
        $_SESSION['alert_message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> 
            Adding a new product is fail.Please input valid data<hr>
            Result:<br>' . getPNameResult($pnameResult) . ' '
            . getPDetailResult($pdetailResult) . ' '
            . getPriceResult($priceResult) . ' '
            . getbidResult($bidResult) . ' '
            . getcidResult($cidResult) . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        header('location:index.php');
    }
} else {
    header('location:index.php');
}
