<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
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
        <h1 class="display-4">Ordering</h1>
    </div>
    <hr>
    <?php
    if(isset($_SESSION['alert_message'])){
        echo $_SESSION['alert_message'];
        $_SESSION['alert_message']="";
    }
    ?>
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-10 ">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Date(Year-Month-Day)</span>
                        </div>
                        <input type="text" class="form-control" placeholder="<?php echo date('Y-m-d'); ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Details</th>
                                    <th>#remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!isset($_SESSION['cart']))
                                    $_SESSION['cart']=array();
                                    if(count($_SESSION['cart'])==0){
                                        echo '<tr><th colspan="4" class="table-secondary"><center>Empty Cart</center></th></tr>';
                                    }else{
                                        for($i=0;$i<$_SESSION['cart'];$i++){
                                            echo '<tr></tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-10 ">
                <a name="" id="" class="btn btn-primary" href="../add a product to cart" role="button">Add a product to cart</a>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>