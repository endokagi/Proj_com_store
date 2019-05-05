<!doctype html>
<html lang="en">

<head>
    <title>Sales report</title>
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
        <h1 class="display-4">Sales report</h1>
        <div class="container">
            <form action="<?php $_SERVER["REQUEST_METHOD"] ?>" method="post">
                <table class="table">
                    <tr>
                        <td>Search by </td>
                        <td><select name="date">
                                <option value="day">Day</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select></td>
                        <td><input type="submit" value="SEARCH"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            switch ($_POST['date']) {
                case "day":
                    $date = date("Y-m-d");
                    break;
                case "month":
                    $date = date("Y-m");
                    break;
                case "year":
                    $date = date("Y");
                    break;
            }

            $connect = mysqli_connect("localhost", "root", "", "computerstore");
            $sql = 'SELECT orderid,orderdate,totalprice,cfirstname,clastname 
            from ordering as `o`
            inner join customer as `c` on o.customerid = c.customerid
            where orderdate like "' . $date . '%"';
            $result = mysqli_query($connect, $sql);
            echo '<table class="table">';
            echo '<thead class="thead-light">';
            echo '<th>OrderID</th><th>OrderDate</th><th>TotalPrice</th><th>Firstname</th><th>lastname</th>';
            echo '</thead>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                while (list($key, $value) = each($row)) {
                    echo '<td>' . '<option name="' . $key . '" value="' . $value . '">' . $value . '</option>' . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
            mysqli_close($connect);
        } else {
            $date = date("Y-m-d");
            $connect = mysqli_connect("localhost", "root", "", "computerstore");
            $sql = 'SELECT orderid,orderdate,totalprice,cfirstname,clastname 
            from ordering as `o`
            inner join customer as `c` on o.customerid = c.customerid
            where orderdate like "' . $date . '%"';
            $result = mysqli_query($connect, $sql);
            echo '<table class="table">';
            echo '<thead class="thead-light">';
            echo '<th>OrderID</th><th>OrderDate</th><th>TotalPrice</th><th>Firstname</th><th>lastname</th>';
            echo '</thead>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                while (list($key, $value) = each($row)) {
                    echo '<td>' . '<option name="' . $key . '" value="' . $value . '">' . $value . '</option>' . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
            mysqli_close($connect);
        }

        ?>
    </div>
    <hr>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>