<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>List of Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include('../../htmltags/navbar.php');
    ?>
    <div class="contaier">
        <h1 class="display-4">List of Products</h1>
    </div>
    <hr>
    <?php
    if(isset($_SESSION['alert_message'])){
        echo $_SESSION['alert_message'];
        $_SESSION['alert_message']="";
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <form form action="search.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="keyword" value="<?php if(!isset($_SESSION['search_products']))
                            $_SESSION['search_products']=""; echo $_SESSION['search_products']; ?>" class="form-control" placeholder="Search products" aria-label="Search products" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9 table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">#edit</th>
                            <th scope="col">#delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "", "computerstore");
                        $sql = 'SELECT productid,pname,stockid,pdetail,bname,cname,price 
                        FROM product as `p` 
                        inner join brand as `b` on p.brandid = b.brandid 
                        inner join category as `c` on p.categoryid = c.categoryid 
                        where productid like "%' . $_SESSION['search_products'] . '%" 
                        or pname like "%'.$_SESSION['search_products'].'%" 
                        or pdetail like "%'.$_SESSION['search_products'].'%" 
                        or cname like "%' . $_SESSION['search_products'] . '%"
                        or bname like  "%' . $_SESSION['search_products'] . '%" ';
                        
                        
                        $result = mysqli_query($connect, $sql);
                        if (!$result) {
                            echo mysqli_error($connect) . '<br>';
                            die('Can not access database!');
                        } else {
                            $numrow = mysqli_num_rows($result);

                            if($numrow==0){
                                echo '<tr><th colspan="8" class="table-secondary"><center>Not Found</center></th></tr>';
                            }else{
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<form action="../edit a product/index.php"method="post"><tr>';
                                    while (list($key, $value) = each($row)) {
                                        if($key!='stockid')
                                        echo '<td><input type="hidden" name="'.$key.'" value="'.$value.'">' . $value . '</td>';
                                    }
                                    echo '<td><button class="btn-warning" type="submit" >Edit</button></td></form>';
                                    echo '<form action="../delete a product/delete.php" method="post"><td>
                                    <input  type="hidden" name="pid_delete" value="'
                                    .$row['productid'].'">
                                    <input  type="hidden" name="sid_delete" value="'
                                    .$row['stockid'].'">
                                    <input class="btn-danger" type="submit" value="Delete" onClick="return confirmDelete();">
                                    </td></form></tr>';
                                }
                            }
                            mysqli_close($connect);
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="../../js/scripts.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>