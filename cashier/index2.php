<html>

<head>

</head>

<body>
    <hr>
    <!-- Search for add -->
    <div>
        <form action="<?php $_SERVER["REQUEST_METHOD"] ?>" method="post">
            <h1>Search product</h1>
            <p></p>
            <table align="center">
                <tr>
                    <td>
                        Brand :
                        <select name="select_brand" id="select_brand">
                            <option value="null">Please Choose</option>
                            <?php
                            $connect = mysqli_connect("localhost", "root", "", "computerstore");
                            $sqlBrand = 'SELECT BName FROM brand';
                            $resultBrand = mysqli_query($connect, $sqlBrand);
                            while ($row = mysqli_fetch_assoc($resultBrand)) {
                                while (list($key, $value) = each($row)) {
                                    echo '<option value="' . $value . '">' . $value . '</option>';
                                }
                            }
                            mysqli_close($connect);
                            ?>
                        </select>
                    </td>
                    <td> Name : <input type="text" name="product_name"></td>
                    <td><button id="search_add_btn">SEARCH</button></td>
                </tr>
            </table>
        </form>
    </div>

    <div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $connect = mysqli_connect("localhost", "root", "", "computerstore");
            $Brand = $_POST['select_brand'];
            $PName = $_POST['product_name'];
            // $PPrice = $_POST['product_price'];
            $sql = 'SELECT bname ,pname ,pdetail, price, unit from product as `p`
                inner join brand as `b` on p.Brandid = b.Brandid
                inner join stock as `s` on p.Productid = s.Productid 
                where BName="' . $Brand . '"';

            if (!empty($PName)) {
                $sql = $sql . 'and PName like "%' . $PName . '%"';
            } else {
                $sql = $sql;
            }
            $result = mysqli_query($connect, $sql);
            if (!$result) {
                echo mysqli_error($connect) . '<br>';
                die('Can not access database!');
            } else {
                $numrow = mysqli_num_rows($result);
                if ($numrow == 0)
                    echo '<center><h3>PLEASE CHOOSE BRAND</h3></center>';
                else {
                    echo '<form action="' . $_SERVER['REQUEST_MEDTHOD'] . '" action ="post">';
                    echo '<table border="1" style="text-align:center">';
                    echo '<th>Brand</th><th>Product name</th><th>Product detail</th>
                <th>Price</th><th>Unit</th><th>Add</th>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        while (list($key, $value) = each($row)) {
                            echo '<td>' . $value . '</td>';
                        }

                        echo '<td><input name="smtDelete" type="submit" value="add" ></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</form>';
                }
                mysqli_close($connect);
            }
        } else {
            // echo '<h1 align=center>PLEASE SEARCH</h1>';
            $connect = mysqli_connect("localhost", "root", "", "computerstore");
            $sql = 'SELECT bname ,pname ,pdetail ,price, unit from product as `p`
                inner join brand as `b` on p.Brandid = b.Brandid
                inner join stock as `s` on p.Productid = s.Productid';
            $result = mysqli_query($connect, $sql);
            echo '<table border="1" style="text-align:center">';
            echo '<th>Brand</th><th>Product name</th><th>Product detail</th>
                <th>Price</th><th>Unit</th><th>Add</th>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                while (list($key, $value) = each($row)) {
                    echo '<td>' . $value . '</td>';
                }
                echo '<td><input name="smtDelete" type="submit" value="Add" ></td>';
                echo '</tr>';
            }
            echo '</table>';
            mysqli_close($connect);
        }
        ?>
    </div>
</body>

</html>