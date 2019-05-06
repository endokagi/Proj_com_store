<!doctype html>
<html lang="en">

<head>
    <title>Customer List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../../../js/scripts.js"></script>
</head>

<body>
    <?php
    include('../../htmltags/navbar.php');
    ?>
    <div class="contaier col">
        <h1 class="display-4">List of Customers</h1>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <form action="<?php $_SERVER["REQUEST_METHOD"] ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search Products" aria-label="Search Products">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container col">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $connect = mysqli_connect('localhost', 'root', '', 'computerstore');
            $sql = 'SELECT * FROM customer
            where cfirstname like "%' . $_POST['search'] . '%"
            or clastname like "%' . $_POST['search'] . '%"';
            $result = mysqli_query($connect, $sql);
            if (!$result) {
                echo mysqli_error($connect) . '<br>';
                die('Can not access database!');
            } else {
                $numrow = mysqli_num_rows($result);
                if ($numrow == 0) {
                    echo '<div class="container">';
                    echo '<table class="table">';
                    echo '<thead class="thead-dark">';
                    echo '<th>CustomerID</th><th>Frist Name</th><th>Last Name</th><th>Address</th>
                <th>Telephone Number</th><th>#EDIT</th><th>#DELETE</th>';
                    echo '</thead><tr>';
                    echo '<tr><th colspan="7" class="table-secondary"><center>Not Found</center></th></tr>';
                    echo '</tr></table>';
                    echo '</div>';
                } else {
                    echo '<center><h3>found ' . $numrow . ' entries.</h3></center>';
                    echo '<div class="container">';
                    echo '<table class="table">';
                    echo '<thead class="thead-dark">';
                    echo '<th>CustomerID</th><th>Frist Name</th><th>Last Name</th><th>Address</th>
                    <th>Telephone Number</th><th>#EDIT</th><th>#DELETE</th>';
                    echo '</thead>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<form action="../edit_customer/index.php"method="post"><tr>';
                        while (list($key, $value) = each($row)) {
                            echo '<td><input type="hidden" name="' . $key . '" value="' . $value . '">' . $value . '</td>';
                        }
                        echo '<td><input type="submit" value="Edit"></td></form>';
                        echo '<form action="../delete_customer/index.php" method="post"><td>';
                        echo '<input type="hidden" name="Cdelete" value="' . $row['CustomerID'] . '">';
                        echo '<input type="submit" value="Delete" onClick="return confirmDelete();"></td></form></tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                }
                mysqli_close($connect);
            }
        } else {
            $connect =  mysqli_connect('localhost', 'root', '', 'computerstore');
            $sql = 'SELECT * FROM customer';
            $result = mysqli_query($connect, $sql);
            if (!$result) {
                echo mysqli_error($connect) . '<br>';
                die('Can not access database!');
            } else {
                $numrow = mysqli_num_rows($result);
                if ($numrow == 0)
                    echo '<center><h3>Not found</h3></center>';

                else {
                    echo '<center><h3>found ' . $numrow . ' entries.</h3></center>';
                    echo '<div class="container">';
                    echo '<table class="table">';
                    echo '<thead class="thead-dark">';
                    echo '<th>CustomerID</th><th>Frist Name</th><th>Last Name</th><th>Address</th>
                    <th>Telephone Number</th><th>#EDIT</th><th>#DELETE</th>';
                    echo '</thead>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<form action="../edit_customer/index.php"method="post"><tr>';
                        while (list($key, $value) = each($row)) {
                            echo '<td><input type="hidden" name="' . $key . '" value="' . $value . '">' . $value . '</td>';
                        }
                        echo '<td><input type="submit" value="Edit"></td></form>';
                        echo '<form action="../delete_customer/index.php" method="post"><td>';
                        echo '<input type="hidden" name="Cdelete" value="' . $row['CustomerID'] . '">';
                        echo '<input type="submit" value="Delete" onClick="return confirmDelete();"></td></form></tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                }
                mysqli_close($connect);
            }
        }
        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>