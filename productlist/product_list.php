<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Product List</h1>
    <div>
        <a href="/Proj_com_store">Home</a>
        <a href="/Proj_com_store/Add Product">Add Product</a>
        <input type="button" link="home.php" value="ร้านขายอุปกรณ์คอม~">
        <input type="button" link="product_edit.php" value="Add New Product">
    </div>

    <!-- Found -->
    <?php
        echo'<h4 style="text-align:center;">';
        echo"found ";
        echo'</h4>';
    ?>

    <div>
        <?php
    $connect = mysqli_connect("localhost","root","","computerstore");
    $sql = 'SELECT * FROM product order by productid asc';
    $result = mysqli_query($connect,$sql);
    echo '<table border="1">';
    echo '<th>Product_ID</th><th>Product_Name</th><th>Product_Detail</th>
    <th>Brand_ID</th><th>Category_ID</th><th>Price</th>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        while(list($key,$value) = each($row)){
            echo '<td>'.$value.'</td>';
        }
        echo '</tr>';
        }           
    echo '</table>';
    mysqli_close($connect);

?>

    </div>
</body>





</html>