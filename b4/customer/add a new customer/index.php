<!doctype html>
<html lang="en">

<head>
    <title>Add Customer</title>
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
        <h1 class="display-4">Add a New Customer</h1>
    </div>
    <hr>
    <div class="container col invalidation">
        <form method='post' action="add_customer.php" novalidate id="mainform">
            <table class="table">
                <tr>
                    <td>Firstname : </td>
                    <td><input type="text" placeholder="อนาตาปัตชัยเย" name="name" class="form-control is-valid"></td>
                    </td>
                </tr>

                <tr>
                    <td>Lastname : </td>
                    <td><input type="text" placeholder="อปัตติเถเถนา" name="Lname" class="form-control is-valid"></td>
                    </td>
                </tr>

                <tr>
                    <td>Address : </td>
                    <td><input type="text" name="address" class="form-control is-valid"></td>
                    </td>
                </tr>
                <tr>
                    <td>Telephone Number :</td>
                    <td> <input type="text" pattern="(\d{9,10})" placeholder="0912345678" name="phone" class="form-control"></td>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="submit" class="btn btn-primary btn-lg">
        </form>
        </td>
        <td>
            <form action="../"><input type="submit" value="Cancle" class="btn btn-primary btn-lg"></form>
        </td>
        </td>
        </tr>
        </table>
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