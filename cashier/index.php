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
    

    <div>
        <form action="index2.php" method="post">
            <h1>Add product</h1><p></p>
            Select brand
            <select name="select_Brand">
                <?php
                    $connect = mysqli_connect("localhost","root","","computerstore");
                    $sqlBrand = 'SELECT BName FROM brand';
                    $resultBrand = mysqli_query($connect,$sqlBrand);
                    while($row = mysqli_fetch_assoc($resultBrand)){
                        while(list($key,$value) = each($row)){
                            echo '<option value="'.$value.'">'.$value.'</option>';
                        }
                    }           
                    mysqli_close($connect);
                ?>
            </select>
            Name
            <input type="text" name="product_name">
            <button id="btnsub">Submit</button>
        </form>
    </div>    
    
    
</body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
    </script>
    <!-- <script src="index.js"></script> -->

</html>