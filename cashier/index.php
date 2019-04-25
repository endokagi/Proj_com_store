<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script language="JavaScript">
        function confirmAdd() {
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
<<<<<<< HEAD
    
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

    

=======
>>>>>>> master

    <hr>

    <div style="font-size:25px">
        <?php
        $t = time();
        // echo($t . "<br>");
        echo "Date: " . (date("d-m-Y", $t));
        ?>
    </div>
    <div>
<<<<<<< HEAD
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
=======
        <!-- show customer -->
        <form action="">
            <?php
            $connect = mysqli_connect("localhost", "root", "", "computerstore");
            $sqlFname = 'SELECT cfirstname from customer';
            $sqlLname = 'SELECT clastname from customer';

            echo "Firstname ";
            echo '<select name="CFname">';
            $result = mysqli_query($connect, $sqlFname);
            echo '<option value="null1">Please Choose..</option>';
            while ($row = mysqli_fetch_assoc($result)) {
                while (list($key, $value) = each($row)) {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                }
            }
            echo '</select>';

            echo " Lastname ";
            echo '<select name="CLname">';
            echo '<option value="null2">Please Choose..</option>';
            $result = mysqli_query($connect, $sqlLname);
            while ($row = mysqli_fetch_assoc($result)) {
                while (list($key, $value) = each($row)) {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                }
            }
            echo '</select>';
            mysqli_close($connect);
            ?>
            <a href="../customer/index.php">Add Customer</a>
        </form>


    </div>


    <hr>

    <div>
        <form action="<?php $_SERVER["REQUEST_METHOD"] ?>" method="post">
            <h1>Add product</h1>
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
                    <td> Price : <input type="number" name="product_price"></td>
                    <td><button id="btnsub">SEARCH</button></td>
                </tr>
            </table>
>>>>>>> master
        </form>
    </div>

    <div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // require_once('../validation/validate.php');
            $connect = mysqli_connect("localhost", "root", "", "computerstore");
            $Brand = $_POST['select_brand'];
            $PName = $_POST['product_name'];
            // $PName = test_input($PName);
            $PPrice = $_POST['product_price'];
            $sql = 'SELECT PName,PDetail,Price,Unit FROM product as `p`
                inner join brand as `b` on p.BrandID = b.BrandID
                inner join stock as `s` on p.ProductID = s.ProductID 
                where BName="' . $Brand . '"';

            if (!empty($PName)) {
                $sql = $sql . 'and PName like "%' . $PName . '%"';
            } else {
                $sql = $sql;
            }
            if (!empty($PPrice)) {
                $sql = $sql . 'and Price =' . $PPrice . '';
            } else {
                $sql = $sql;
            }

            $result = mysqli_query($connect, $sql);
            if (!$result) {
                echo mysqli_error() . '<br>';
                die('Can not access database!');
            } else {
                $numrow = mysqli_num_rows($result);
                if ($numrow == 0)
                    echo '<center><h3>Not found</h3></center>';
                else {
                    echo '<table border="1">';
                    echo '<th>Product name</th><th>Product detail</th>
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
                }
                mysqli_close($connect);
            }
        } else {
            // echo'<table>';
            // echo'</table>';
            echo '<h1 align=center>PLEASE SEARCH</h1>';
        }
        ?>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="index.js"></script>

</html>