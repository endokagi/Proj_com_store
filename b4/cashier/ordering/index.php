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
    if (isset($_SESSION['alert_message'])) {
        echo $_SESSION['alert_message'];
        $_SESSION['alert_message'] = "";
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
                    <a name="" class="btn btn-warning" href="../reset order/reset.php" role="button">Reset</a>
                </div>
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Details</th>
                                <th>Amount</th>
                                <th>Price(Price per unit)</th>
                                <th>#remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!isset($_SESSION['cartStatus'])) {
                                $_SESSION['cartPID'] = array();
                                $_SESSION['cartSID'] = array();
                                $_SESSION['cartPname'] = array();
                                $_SESSION['cartPdetail'] = array();
                                $_SESSION['cartBname'] = array();
                                $_SESSION['cartCname'] = array();
                                $_SESSION['cartPrice'] = array();
                                $_SESSION['cartUnit'] = array();
                                $_SESSION['caetAmount'] = array();
                                $_SESSION['cartStatus'] = "idle";
                                $_SESSION['cartTotolPrice']=0;
                            }
                            if ($_SESSION['cartStatus'] == "idle") {
                                echo '<tr><th colspan="7" class="table-secondary"><center>Empty Order</center></th></tr>';
                            } else {
                                $countRows =0;
                                for ($i = 0; $i < count($_SESSION['cartPID']); $i++) {
                                    if($_SESSION['cartPID'][$i]!=''){
                                        echo "<tr>
                                        <th>" . ($countRows + 1) . "</th>
                                        <td>" . $_SESSION['cartPID'][$i] . "</td>
                                        <td>" . $_SESSION['cartPname'][$i] . "</td>
                                        <td>" . $_SESSION['cartPdetail'][$i] . "
                                        <br> brand: " . $_SESSION['cartBname'][$i] . "
                                        </td>
                                        <td>
                                        <input type='number'  class='text-center' disabled value='" . $_SESSION['cartAmount'][$i] . "'>
                                        <form action='../update amount of a product/index.php' method='post'>
                                        <input type='hidden' name='index' value='".$i."'>
                                        <input type='submit' value='update'></form>
                                        </td>
                                        <td>" . ($_SESSION['cartPrice'][$i] * $_SESSION['cartAmount'][$i]) .
                                        "(" . $_SESSION['cartPrice'][$i] . ")</td>  
                                        <td><form action='../remove a product/index.php' method='post'>
                                        <input type='hidden' name='index' value='".$i."'>
                                        <input type='submit' value='remove'>
                                        </form></td>
                                        </tr>";
                                        $countRows++;
                                    }
                                    
                                }
                                if($countRows==0){
                                    echo '<tr><th colspan="7" class="table-secondary"><center>Empty Order</center></th></tr>';
                                }
                            }
                            
                            ?>
                        </tbody>
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Totol Price</th>
                                <th><input disabled type="number" class="text-center" value="<?php echo $_SESSION['cartTotolPrice'] ?>"></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-10 ">
                <a class="btn btn-primary" href="../add a product to order" role="button">Add a product to order</a>
                <a class="btn btn-primary" href="../confirm order" role="button">Confirm Order</a>
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