<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $i = $_POST['index'];
} else {
    header('location:../');
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Update Amount</title>
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
        <h1 class="display-4">Update Amount</h1>
    </div>
    <hr>
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-10 ">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Product Name</span>
                    </div>
                    <input type="text" class="form-control" disabled value="<?php echo $_SESSION['cartPrice'][$i]; ?>">
                </div>

                

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Detail</span>
                    </div>
                    <textarea class="form-control" disabled aria-label="product details"><?php echo $_SESSION['cartPdetail'][$i] . ' [Brand:' . $_SESSION['cartBname'][$i] . ']'; ?></textarea>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Price</span>
                    </div>
                    <input type="text" class="form-control" disabled value="<?php echo $_SESSION['cartPrice'][$i]; ?>" aria-label="price">
                    <div class="input-group-append">
                        <span class="input-group-text">Baht</span>
                    </div>
                </div>
                <form action="updateAmount.php" method="post" >
                    <input type="hidden" name="index" value="<?php echo $i;?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Amount</span>
                        </div>
                        <input type="number" name='amount' class="form-control" value="<?php echo $_SESSION['cartAmount'][$i]; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </form>
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