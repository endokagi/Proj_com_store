<html>

<head>

</head>

<body>
    
    <div>
        <?php
            echo $_POST['select_Brand'];
            echo $_POST['product_name'];
            $connect = mysqli_connect("localhost","root","","computerstore");
            $sql = 'SELECT PName,PDetail,Price,Unit FROM product inner join brand on product.BrandID = brand.BrandID
            inner join stock on product.ProductID = stock.ProductID
            where BName="'.$_POST['select_Brand'].'" and PName like "%'.$_POST['product_name'].'%"';
            $result = mysqli_query($connect,$sql);
            echo '<table border="1">';
            echo '<th>Product name</th><th>Product detail</th>
            <th>price</th><th>Unit</th>';
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