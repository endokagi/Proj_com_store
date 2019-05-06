<!doctype html>
<html lang="en">

<head>
    <title>Confirm Customer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include('../../htmltags/navbar.php');
    ?>
    <div class="contaier">
        <h1 class="display-4">Confirm to Add Customer</h1>
    </div>
    <hr>
    <div class="container">
        <?php
        $connect = mysqli_connect("localhost", "root", "", "computerstore");
        $sql = 'INSERT INTO customer VALUES("","' . $_POST['name'] . '","' . $_POST['Lname'] . '","' . $_POST['address'] . '","' . $_POST['phone'] . '")';
        $result = mysqli_query($connect, $sql);

        $sqli = 'SELECT * FROM customer';
        $result1 = mysqli_query($connect, $sqli);

        echo '<table class="table">';
        echo '<tr><td>CustomerID</td><td>Firstname</td><td>Lastname</td><td>Address</td><td>Telephone Number</td>';

        while ($row = mysqli_fetch_assoc($result1)) {
            echo '<tr>';
            echo '<td>' . $row['CustomerID'] . '</td>';
            echo '<td>' . $row['CFirstname'] . '</td>';
            echo '<td>' . $row['CLastname'] . '</td>';
            echo '<td>' . $row['Address'] . '</td>';
            echo '<td>' . $row['TEL'] . '</td>';
        }
        echo '</table><br><br>';

        echo '<div class="text-right"><a class="btn btn-primary btn-lg" href="index.php">Add</a>&nbsp';
        echo '<a class="btn btn-primary btn-lg" href="../">Back</a></div>';
        mysqli_close($connect);


        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>