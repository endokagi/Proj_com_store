<!doctype html>
<html lang="en">

<head>
    <title>Add Stock</title>
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
    include('../htmltags/navbar.php');
    ?>
    <div class="container col">
        <h1 class="display-4">Add to Stock</h1>
    </div>
    <hr>
    <div class="container">
        <?php
        session_start();
        echo '<form action="./confirm_add.php"method="post">';
        echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text" id="inputGroup-sizing-lg">StockID</span>';
        echo '</div>';
        // $_SESSION['']
        echo '<input type="text" value="'  . $_POST['stockid']. '" disabled class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">';
        echo '<input type="hidden" name="stockid" value="'  . $_POST['stockid']. '">';
        echo '</div>';

        echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text" id="inputGroup-sizing-lg">Product Name</span>';
        echo '</div>';
        echo '<input type="text" value="' . $_POST['pname'] . '" disabled class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">';
        echo '</div>';

        echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text" id="inputGroup-sizing-lg">Unit to add</span>';
        echo '</div>';
        echo '<input type="number" name="add_stock" value="1" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">';
        echo '</div>';

        echo '<div class="row text-center">';
        echo '<div class="col"><input type="submit" value="Add" class="btn btn-primary btn-lg"></div>';
        echo '<div class="col"><a class="btn btn-primary btn-lg" href="./index.php">cancel</a></div>';
        echo '</div>';
        echo '</form>';
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>