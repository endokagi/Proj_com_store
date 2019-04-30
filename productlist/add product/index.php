<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proj_com_store/css/style.css">
    <title>Add Product</title>
</head>

<body>

    <a href="/proj_com_store/">Home</a>
    <a href="/Proj_com_store/Productlist">Product list</a>
    <hr>
    <h1>Add Product</h1>
    <form action="<?php $_SERVER["REQUEST_METHOD"] ?>" method="post">
        <table>
            <tr>
                <td>Product Name</td>
                <td><textarea cols="50" rows="2" name="pname"></textarea></td>
            </tr>
            <tr>
                <td> Description </td>
                <td><textarea cols="50" rows="10" name="pdetail"></textarea></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td> <select name="bid">
                        <?php
            $connect = mysqli_connect("localhost", "root", "", "computerstore");
            $sql = 'SELECT brandid,bname from brand';
            $result = mysqli_query($connect, $sql);
            if (!$result) {
              echo mysqli_error($connect) . '<br>';
              die('Can not access database!');
            } else {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['brandid'] . '">' . $row['bname'] . '</option>';
              }
              mysqli_close($connect);
            }
            ?>
                    </select></td>
            </tr>
            <tr>
                <td>Category </td>
                <td><select name="cid">
                        <?php
            $connect = mysqli_connect("localhost", "root", "", "computerstore");
            $sql = 'SELECT categoryid,cname from category';
            $result = mysqli_query($connect, $sql);
            if (!$result) {
              echo mysqli_error($connect) . '<br>';
              die('Can not access database!');
            } else {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['categoryid'] . '">' . $row['cname'] . '</option>';
              }
              mysqli_close($connect);
            }
            ?>
                    </select></td>
            </tr>
            <tr>
                <td>Price</td>
                <td> <input type="number" name="price"></td>
            </tr>
        </table><br>
        <table>
            <tr>
                <td> <input type="submit" value="SUBMIT"></td>
            </tr>
        </table>
    </form>
    
  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    require_once("../../validation/validate.php");
    $pdetail=test_input($_POST['pdetail']);
    $pname=test_input($_POST['pname']);
    $price=$_POST['price'];
    $bid=$_POST['bid'];
    $cid=$_POST['cid'];

    $priceResult=validatePrice($price);
    $pdetailResult=validateProductDetail($pdetail);
    $pnameResult=validateProductName($pname);
    if($priceResult&&$pdetailResult&&$pnameResult){
      $connect=mysqli_connect("localhost","root","","computerstore");
      $sql='insert into product
      values(0, 
      "'.$pname.'",
      "'.$pdetail.'",
      '.$bid.',
      '.$cid.',
      '.$price.')';
      $result=mysqli_query($connect,$sql);
      if(!$result){
        echo mysqli_error($connect).'<br>';
        die('Can not access database');
      }else
        echo '<h2>Result :</h2><table border="1"><tr><td>Add a product Successful.</td></tr></table>';
    }else{
      echo '<h2>Result :</h2><table border="1"><tr><td>Add a product Fail.</td></tr></table>';
      showPNameResult($pnameResult);
      showPDetailResult($pdetailResult);
      showPriceResult($priceResult);
      
    }
  }
  ?>
</body>

</html>