<!doctype html>
<html lang="en">

<head>
    <title>Edit a Product</title>
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
        <h1 class="display-4">Edit a Product</h1>
    </div>
    <hr>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_SESSION['alert_message'])) {
            echo $_SESSION['alert_message'];
            $_SESSION['alert_message'] = "";
        }
    } else {
        header('location:../');
    }
    ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col ">
                <form action="edit.php" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Product ID</span>
                        </div>
                        <input type="text" disabled class="form-control" placeholder="<?php echo $_POST["productid"];?>" aria-label="Show productID" aria-describedby="basic-addon1">
                        <input name="productid" type="hidden" value="<?php echo $_POST["productid"];?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                            <textarea name="pname" maxlength="100" class="form-control" aria-label="Name"><?php echo $_POST["pname"]; ?></textarea>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Detail</span>
                            </div>
                            <textarea name="pdetail" class="form-control" maxlength="500" rows="5" aria-label="Detail"><?php echo $_POST['pdetail']; ?></textarea>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="brandSelect">Brand</label>
                        </div>
                        <select name="bid" class="custom-select" id="brandSelect">
                            <option>Choose...</option>
                            <?php
                            $connect = mysqli_connect("localhost", "root", "", "computerstore");
                            $sql = 'SELECT brandid,bname from brand';
                            $result = mysqli_query($connect, $sql);
                            if (!$result) {
                                echo mysqli_error($connect) . '<br>';
                                die('Can not access database!');
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($_POST['bname'] == $row['bname']) {
                                        echo '<option selected value="' . $row['brandid'] . '">' . $row['bname'] . '</option>';
                                    } else {
                                        echo '<option value="' . $row['brandid'] . '">' . $row['bname'] . '</option>';
                                    }
                                }
                                mysqli_close($connect);
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="categorySelect">Category</label>
                        </div>
                        <select name="cid" class="custom-select" id="categorySelect">
                            <option>Choose...</option>
                            <?php
                            $connect = mysqli_connect("localhost", "root", "", "computerstore");
                            $sql = 'SELECT categoryid,cname from category';
                            $result = mysqli_query($connect, $sql);
                            if (!$result) {
                                echo mysqli_error($connect) . '<br>';
                                die('Can not access database!');
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($_POST['cname'] == $row['cname']) {
                                        echo '<option selected value="' . $row['categoryid'] . '">' . $row['cname'] . '</option>';
                                    } else {
                                        echo '<option value="' . $row['categoryid'] . '">' . $row['cname'] . '</option>';
                                    }
                                }
                                mysqli_close($connect);
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price</span>
                        </div>
                        <input name="price" type="number" class="form-control" value="<?php echo $_POST['price']; ?>" aria-label="Amount (to the nearest baht)">
                        <div class="input-group-append">
                            <span class="input-group-text">Baht</span>
                        </div>
                    </div>


            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <input class="btn btn-warning" type="submit" value="Submit">
                <a class="btn btn-primary" href="../" role="button">Cancel</a>
            </div>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>