
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    if (!isset($_SESSION['add_key'])) {
        $_SESSION['add_key'] = array();
    }
    $_SESSION['add_key'][] = $_POST['productid'];
     
    // header("location:./search_add_product.php");
} else{
    echo "dsadada";
}


    ?>