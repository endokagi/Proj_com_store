<!doctype html>
<html lang="en">

<head>
    <title>Edit Customer</title>
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
    <div class="container col">
        <h1 class="display-4">Edit a Customer Details</h1>
    </div>
    <hr>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo '<form action="edit_page.php" method="post" onvalidation id="mainform"><table>';
            echo '<tr><td><span class="input-group-text">CustomerID :</span></td>';
            echo '<td> <input class="form-control" type="text" value="' . $_POST["CustomerID"] . '" disabled></td></tr>';
            echo '<input name="customerid" type="hidden" value="' . $_POST["CustomerID"] . '">';
            echo '<tr><td><span class="input-group-text">First Name :</span></td>';
            echo '<td><input type="text" class="form-control is-valid" name="Fname" value="' . $_POST["CFirstname"] . '"></td></tr>';
            echo '<tr><td><span class="input-group-text">Last Name :</span></td>';
            echo '<td><input type="text" class="form-control is-valid" name="Lname" value="' . $_POST['CLastname'] . '"></td></tr>';
            echo '<tr><td><span class="input-group-text">Address :</span></td>';
            echo '<td><input type="text" class="form-control is-valid" name="address" value="' . $_POST['Address'] . '"></td></tr>';
            echo '<tr><td><span class="input-group-text">Telephon Number:</span></td>';
            echo '<td><input type="text" pattern="(\d{9,10})" class="form-control" name="tel" value="' . $_POST['TEL'] . '"></td></tr>';
            echo '<tr><td><input type="submit" class="btn btn-primary btn-lg" value="Submit"></td></form>';
            echo '<td><form action="../"> <input type="submit" class="btn btn-primary btn-lg" value="Cancle"></td></tr></table>';
        } else {
            header('location:../');
        }
        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('#mainform').submit(function(event) {
                var form = $('#mainform')[0];
                if (form.checkValidity() === false) {
                    event.preventDefault();
                }
                $(this).addClass('was-validated');
            });
        });
    </script>
</body>

</html>