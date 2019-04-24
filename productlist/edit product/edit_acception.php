<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
<h1>Edit Product</h1>
<hr>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo '<form action="edit_result.php" method="post"><table>';
        echo '<tr><td>Product ID :</td><td> <input type="text" value="'.$_POST["productid"].'" disabled></td></tr>';
        echo '<tr><td>Product Name :</td><td> <input type="text" value="'.$_POST["pname"].'" disabled></td></tr>';
        echo '<tr><td>Description :</td><td> <textarea rows="5" cols="30"  value="'.$_POST["pdetail"].'" disabled></textarea></td></tr>';
        echo '<tr><td>Brand :</td><td> <select name="showBname" disabled><option value="'.$_POST["bname"].'">'.$_POST["bname"].'</option></select></td></tr>';
        echo '<input type="hidden" name="bname" value="'.$_POST["bname"].'"><br>';
        echo '<tr><td>Category :</td><td> <select disabled>
        <option value="'.$_POST["cname"].'" >'.$_POST["cname"].'</option>';
        echo '</select></td></tr></table>';
        echo '<input type="hidden" name="cname" value="'.$_POST["cname"].'"><br>';
        echo '<table><tr><td><input type="submit" value="CONFIRM"></td></form>';
        echo '<td><form action="../"><input type="submit" value="Cancel"></form></td></tr></table>';
    }else{
        echo 'Plase try again';
    }
?>
<hr>
</body>
</html>