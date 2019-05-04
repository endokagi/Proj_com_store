<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '<form action="EditPage_3.php" method="post"><table>';
        echo '<tr><td>CustomerID :</td><td> <input type="text" value="' . $_POST["CustomerID"] . '" disabled></td></tr>';
        echo '<input name="customerid" type="hidden" value="' . $_POST["CustomerID"] . '">';
        echo '<tr><td>First Name :</td><td> <input type="text"  name="Fname" value="' . $_POST["CFirstname"] . '"></td></tr>';
        echo '<tr><td>Last Name :</td> <td><input type="text" name="Lname" value="'.$_POST['CLastname'].'"></td></tr>';
        echo '<tr><td>Address :</td> <td><input type="text" name="address" value="'.$_POST['Address'].'"></td></tr>';
        echo '<tr><td>Telephon Number :</td> <td><input type="text" name="tel" value="'.$_POST['TEL'].'"></td></tr>';
        echo '<tr><td><input type="submit" value="Submit"></td></form>';
        echo '<td><form action="../"> <input type="submit" value="Cancle"></td></tr></table>';
    } else {
        header('location:../');
    }
    ?>
</body>
</html>

