<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../../../validation/validate.php');
    $cname = test_input($_POST['cname']);
    $resultValidationCname = validateCName($cname);
    if ($resultValidationCname) {
        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sql = 'SELECT cname from category';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database.');
        } else {
            $duplicate = false;
            while ($row = mysqli_fetch_array($result)) {
                if ($cname == $row[0])
                    $duplicate = true;
            }
            if ($duplicate) {
                $_SESSION['alert_message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> The Category ' . $cname . ' is already exists.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            } else {
                $sql = 'insert into category values(null,"' . $cname . '")';
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                    echo mysqli_error($connect) . '<br>';
                    die('Can not access database.');
                } else {
                    $_SESSION['alert_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congratulation!</strong> The Category <b>' . $cname . '</b> has been created.
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
                <strong>Alert!</strong> Result: <hr>' . getcnameResult($resultValidationCname) . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                header('location:index.php');
    }
} else {
    header('location:index.php');
}
