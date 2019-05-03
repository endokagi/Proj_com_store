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
        echo '<form action="edit_result.php" method="post"><table>';
        echo '<tr><td>Product ID :</td><td> <input type="text" value="' . $_POST["productid"] . '" disabled></td></tr>';
        echo '<input name="productid" type="hidden" value="' . $_POST["productid"] . '">';
        echo '<tr><td>Product Name :</td><td> <textarea name="pname" cols="50" rows="2">' . $_POST["pname"] . '</textarea></td></tr>';
        echo '<tr><td>Description :</td> <td><textarea cols="50" rows="10"name="pdetail">'.$_POST['pdetail'].'</textarea></td></tr>';
        echo '<tr><td>Brand :</td> <td><select name="bid">';
        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sql = 'SELECT brandid,bname from brand';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database!');
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['brandid'] . '">' . $row['bname'] . '</option>';
            }
            mysqli_close($connect);
        }
        echo '</select></td></tr>';
        echo '<tr><td>Category :</td><td> <select name="cid">';

        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sql = 'SELECT categoryid,cname from category';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database!');
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['categoryid'] . '">' . $row['cname'] . '</option>';
            }
            mysqli_close($connect);
        }

        echo '</select></td></tr><tr><td>Price</td><td><input type="number" name="price" value="'.$_POST['price'].'"></td></tr></table><br>';
        echo '<table><tr><td><input type="submit" value="Submit"></td></form>';
        echo '<td><form action="../"> <input type="submit" value="Cancle"></td></form></tr></table>';
    } else {
        header('location:../');
    }
    ?>
    <hr>
</body>

</html>