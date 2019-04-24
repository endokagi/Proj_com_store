<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Product</h1>
    <hr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '<form action="edit_acception.php" method="post"><table>';
        echo '<tr><td>Product ID :</td><td> <input type="text" name ="showProduct" value="' . $_POST["productid"] . '" disabled></td></tr>';
        echo '<input name="productid" type="hidden" value="' . $_POST["productid"] . '">';
        echo '<tr><td>Product Name :</td><td> <input type="text" name="pname" value="' . $_POST["pname"] . '"></td></tr>';
        echo '<tr><td>Description :</td> <td><textarea name="pdt" id="pdtail"></textarea></td></tr>';
        echo '<input type="hidden" name="pdetail" value="' . $_POST["pdetail"] . '"/>';
        echo '<tr><td>Brand :</td> <td><select name="bname">';
        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sql = 'SELECT bname from brand';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error() . '<br>';
            die('Can not access database!');
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['bname'] . '">' . $row['bname'] . '</option>';
            }
            mysqli_close($connect);
        }
        echo '</select></td></tr>';
        echo '<tr><td>Category :</td><td> <select name="cname">';

        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sql = 'SELECT cname from category';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error() . '<br>';
            die('Can not access database!');
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['cname'] . '">' . $row['cname'] . '</option>';
            }
            mysqli_close($connect);
        }

        echo '</select></td></tr></table><br>';
        echo '<table><tr><td><input type="submit" value="Submit"></td></form>';
        echo '<td><form action="../"> <input type="submit" value="Cancle"></td></form></tr></table>';
    } else {
        echo 'Plase try again';
    }
    ?>
    <hr>
    <script>
        
    </script>
</body>

</html>