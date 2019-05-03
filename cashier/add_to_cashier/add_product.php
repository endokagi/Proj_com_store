<html>

<head>
    <title>Cashier Add Product</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/scripts.js"></script>
    <!-- <script src="../js/cashier.js"></script> -->
</head>

<body>
    <a href="../cashier/index.php">Back</a>
    <!-- <a href="/Proj_com_store/productlist/add product">Add A New Product</a>
    <a href="../brand/">Add A New Brand</a>
    <a href="../category/">Add A New Category</a> -->

    <h1>Add Product List</h1>
    <form action="<?php $_SERVER["REQUEST_METHOD"] ?>" method="post">

        <table>
            <tr>
                <td><input type="text" name="search"></td>
                <td><input type="submit" value="SEARCH"></td>
                <td>Search by</td>
                <td><input type="checkbox" name="productName" value="Product Name" checked> Product Name</td>
                <td><input type="checkbox" name="productID" value="Product ID"> Product ID</td>
                <td><input type="checkbox" name="productDetail" value="Product Detail"> Product Detail </td>
                <td><input type="checkbox" name="brandName" value="Brand Name"> Brand </td>
                <td><input type="checkbox" name="categoryName" value="Category Name"> Category
            </tr>
        </table>
    </form>
    <hr>

    <br>

    <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('../validation/validate.php');
        $keyword = $_POST['search'];
        $keyword = test_input($keyword);
        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sql = 'SELECT productid,pname,pdetail,bname,cname,price 
        FROM product as `p` 
        inner join brand as `b` on p.brandid = b.brandid 
        inner join category as `c` on p.categoryid = c.categoryid';
        if (!empty($keyword)) {
            $report = '<center><h2>keyword "' . $keyword . '"<h2><h3> Search by ';

            if (
                isset($_POST['productName']) || isset($_POST['productID']) || isset($_POST['productDetail'])
                || isset($_POST['brandName']) || isset($_POST['categoryName'])
            ) {
                $sql = $sql . ' where ';
                $optional = array();
                $reports = array();
                if (isset($_POST['productName'])) {
                    $optional[] = ' pname like "%' . $keyword . '%" ';
                    $reports[] = $_POST['productName'];
                }
                if (isset($_POST['productID'])) {
                    $optional[] = ' productid like "%' . $keyword . '%" ';
                    $reports[] = $_POST['productID'];
                }
                if (isset($_POST['productDetail'])) {
                    $optional[] = ' pdetail like "%' . $keyword . '%" ';
                    $reports[] = $_POST['productDetail'];
                }
                if (isset($_POST['categoryName'])) {
                    $reports[] = $_POST['categoryName'];
                    $optional[] = ' cname like (select cname from category where cname like "%' . $keyword . '%") ';
                }
                if (isset($_POST['brandName'])) {
                    $reports[] = $_POST['brandName'];
                    $optional[] = ' bname like (select bname from brand where bname like "%' . $keyword . '%") ';
                }
                for ($i = 0; $i < count($optional); $i++) {
                    if ($i == 0) {
                        if ($i == count($optional) - 1) {
                            $sql = $sql . $optional[$i];
                            $report = $report . $reports[$i] . ' </h3></center>';
                        } else {
                            $sql = $sql . $optional[$i];
                            $report = $report . $reports[$i];
                        }
                    } else {
                        if ($i == count($optional) - 1) {
                            $sql = $sql . ' or ' . $optional[$i];
                            $report = $report . ' and ' . $reports[$i] . ' </h3></center>';
                        } else {
                            $sql = $sql . ' or ' . $optional[$i];
                            $report = $report . ',' . $reports[$i];
                        }
                    }
                }
            } else {
                $report = '<center><h3>Show all products</h3></center>';
            }
        } else {
            $report = '<center><h3> Show all products</h3></center>';
        }
        //echo $sql;
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database!');
        } else {
            $numrow = mysqli_num_rows($result);
            echo $report . '<hr>';
            if ($numrow == 0)
                echo '<center><h3>Not found</h3></center>';

            else {
                echo '<center><h3>found ' . $numrow . ' entries.</h3></center>';
                echo '<table border = "1">';
                echo '<th>Product ID</th><th>Product Name</th><th>Product Detail</th>
            <th>Brand</th><th>Category</th><th>Price</th><th>#ADD</th>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form action="./index.php"method="post"><tr>';
                    while (list($key, $value) = each($row)) {
                        echo '<td><input type="hidden" name="' . $key . '" value="' . $value . '">' . $value . '</td>';
                    }
                    echo '<td><input type="submit" value="Add"></td></form>'.'</tr>';
                }
                echo '</table>';
            }
            mysqli_close($connect);
        }
    } else {
        $connect = mysqli_connect('localhost', 'root', '', 'computerstore');
        $sql = 'SELECT productid,pname,pdetail,bname,cname,price 
        FROM product as `p` 
        inner join brand as `b` on p.brandid = b.brandid 
        inner join category as `c` on p.categoryid = c.categoryid';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
            echo mysqli_error($connect) . '<br>';
            die('Can not access database!');
        } else {
            $numrow = mysqli_num_rows($result);
            if ($numrow == 0)
                echo '<center><h3>Not found</h3></center>';

            else {
                echo '<center><h3>found ' . $numrow . ' entries.</h3></center>';
                echo '<table border = "1">';
                echo '<th>Product ID</th><th>Product Name</th><th>Product Detail</th>
            <th>Brand</th><th>Category</th><th>Price</th><th>#ADD</th>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form action="./edit product/edit.php"method="post"><tr>';
                    while (list($key, $value) = each($row)) {
                        echo '<td><input type="hidden" name="' . $key . '" value="' . $value . '">' . $value . '</td>';
                    }
                    echo '<td><input type="submit" value="Edit"></td></form>'.'</tr>';
                }
                echo '</table>';
            }
            mysqli_close($connect);
        }
    }

    ?>
    <hr>
</body>

</html>