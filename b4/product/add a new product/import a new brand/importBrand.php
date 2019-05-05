<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../../../validation/validate.php');
    $bname = test_input($_POST['bname']);
    $resultValidationBname = validateBName($bname);
    if ($resultValidationBname) {
        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sql = 'SELECT bname from brand';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database.');
        } else {
            $duplicate = false;
            while ($row = mysqli_fetch_array($result)) {
                if ($bname == $row[0])
                    $duplicate = true;
            }
            if ($duplicate) {
                $_SESSION['alert_message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> The Category ' . $bname . ' is already exists.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            } else {
                $sql = 'insert into brand values(null,"' . $bname . '")';
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                    echo mysqli_error($connect) . '<br>';
                    die('Can not access database.');
                } else {
                    $_SESSION['alert_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congratulation!</strong> The Brand <b>' . $bname . '</b> has been created.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
            }
        }
        mysqli_close($connect);
        header('location:index.php');
    } else { 
        $_SESSION['alert_message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> Result: <hr>' . getbnameResult($resultValidationBname) . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                header('location:index.php');
    }
} else {
    header('location:index.php');
}
