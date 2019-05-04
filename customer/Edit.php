<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/scripts.js"></script>
</head>
<body>
<?php
$connect = mysqli_connect('localhost','root','','computerstore');
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
        echo '<table border = "1">';
        echo '<th>Cudtomer ID</th><th>Frist Name</th><th>Last Name</th>
    <th>Address</th><th>Telephone Number</th><th>#EDIT</th><th>#DELETE</th>';
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<form action="EditPage_2.php"method="post"><tr>';
            while (list($key, $value) = each($row)) {
                echo '<td><input type="hidden" name="'.$key.'" value="'.$value.'">' . $value . '</td>';
            }
            echo '<td><input type="submit" value="Edit"></td></form>';
            echo '<form action="Delete.php" method="post"><td>
            <input type="hidden" name="Cdelete" value="'
            .$row['CustomerID'].'"><input type="submit" value="Delete" onClick="return confirmDelete();"></td></form></tr>';
        }
        echo '</table><br><br>';
    }

    echo '<a href="../">Back</a>';
    mysqli_close($connect);
}

?>
</body>
</html>



