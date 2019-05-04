<html>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $add_key_product = array();
        // $add_key_product = $_SESSION['key'];
        session_start();
        $_SESSION['add_key'] = $_POST['productid'];
        $add_key_product = $_SESSION['add_key'];

        echo $add_key_product;
    }else


        ?>
    </body>

    </html>