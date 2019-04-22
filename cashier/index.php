<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script language="JavaScript">
    function confirmAdd(){
        return confirm('Are you sure you want to add this?');
    }
    </script>
</head>

<body> 
    <div>
        <h1>Cashier</h1>
        <a href="/Proj_com_store/">Home</a>
        <a href="../productlist/index.php">Search products</a>
    </div>
    
    <!-- <div>
        <?php
            $connect = mysqli_connect("localhost","root","","computerstore");
            $sqlBrand = 'SELECT PName,PDetail,Price,Unit FROM product inner join brand on product.BrandID = brand.BrandID
            inner join stock on product.ProductID = stock.ProductID';
            $resultBrand = mysqli_query($connect,$sqlBrand);
            echo '<table border=1>';
            echo '<th>Product name</th><th>Product detail</th>
            <th>price</th><th>Unit</th><th>ADD</th>';
            while($row = mysqli_fetch_assoc($resultBrand)){
                echo '<tr>';
                while(list($key,$value) = each($row)){
                    echo '<td>'.'<option value="'.$value.'">'.$value.'</option>'.'</td>';
                }
                echo '<td>'.'<button value="'.$value.' name="add">ADD</button>'.'</td>'.'</tr>';
                $connect = mysqli_connect("localhost","root","","computerstore");
                $sqlAdd = 'SELECT PName,PDetail,Price,Unit FROM product inner join brand on product.BrandID = brand.BrandID
                inner join stock on product.ProductID = stock.ProductID';
                $resultAdd = mysqli_query($connect,$sqlAdd);
            }
            echo '</table>';           
            mysqli_close($connect);
            $connect = mysqli_connect("localhost","root","","computerstore");
            $sqlStock_Unit = 'SELECT Unit from stock';
            mysqli_close($connect);
            // if($sqlStock_Unit==0){
            //     echo '<div id=""></div>';
            // }else{
            //     $sqlOrder = array();
            //     for($i=0;$i<5;$i++){
            //         $sqlOrder[$i] = 'SELECT PName,PDetail,Price,Unit FROM product inner join brand on product.BrandID = brand.BrandID
            //         inner join stock on product.ProductID = stock.ProductID
            //         where ProductID ='.$value;
            //     }
            // }
        ?>
        <form action="index2.php" method="post">
            <button>Add products</button>
        </form>
    </div> -->

    


    <div>
        <form action="index2.php" method="post">
            
            <h1>Add product</h1><p></p>
            <?php
                for($i=0;$i<5;$i++){
                    echo"Select brand";
                    echo '<select name=select_Brand>';
                        $connect = mysqli_connect("localhost","root","","computerstore");
                        $sqlBrand = 'SELECT BName FROM brand';
                        $resultBrand = mysqli_query($connect,$sqlBrand);
                        while($row = mysqli_fetch_assoc($resultBrand)){
                            while(list($key,$value) = each($row)){
                                echo '<option value="'.$value.'">'.$value.'</option>';
                            }
                        }           
                        mysqli_close($connect);
                    echo'</select>';
                    
                    echo "Name";
                    echo '<input type="text" name="product_name">';
                    echo '<select name=select_Name>';
                        $connect = mysqli_connect("localhost","root","","computerstore");
                        $sqlPName = 'SELECT PName FROM product inner join brand
                        on product.BrandID = brand.BrandID
                        where BName ="'.$value.'"';
                        $resultPName = mysqli_query($connect,$sqlPName);
                        while($row = mysqli_fetch_assoc($resultBrand)){
                            while(list($key,$value) = each($row)){
                                echo '<option value="'.$value.'">'.$value.'</option>';
                            }
                        }           
                        mysqli_close($connect);
                    echo'</select>';
                    
                    echo '<button id="btnsub">Submit</button><br>';}
            ?>
        </form>
    </div>    
    
    
</body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
    </script>
    <!-- <script src="index.js"></script> -->

</html>