<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div>
        <h1>Cashier</h1>
        <a href="/Proj_com_store/">Home</a>
        <a href="../productlist/index.php">Search products</a>
    </div>
    <hr>
    <div style="font-size:25px">
        <?php
        $t = date("Y-m-d");
        echo "Date: " . $t;
        ?>
    </div>
    <div>
        <!-- show customer -->
        <form action="index2.php" method="post">
            <?php
            $connect = mysqli_connect("localhost", "root", "", "computerstore");
            $sqlCname = 'SELECT cfirstname from customer';

            echo "Name: ";
            echo '<select name="Cname" id="Cname">';
            $result = mysqli_query($connect, $sqlCname);
            echo '<option value="null">Please Choose..</option>';
            while ($row = mysqli_fetch_assoc($result)) {
                while (list($key, $value) = each($row)) {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                }
            }
            echo '</select>';

            ?>
            <!-- <button id="">Confirm Name</button> -->
            <button id="confirm_name">NEXT</button>

        </form>
        <a href="../customer/index.php">Add Customer</a>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="index.js"></script>

</html>