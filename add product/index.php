<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <title>Add Product</title>
</head>

<body>

  <a href="/proj_com_store/">Home</a>
  <a href="/Proj_com_store/Productlist">Product list</a>
  <hr>
  <h1>Add Product</h1>
  <form action="<?php $_SERVER["REQUEST_METHOD"] ?>" method="post">
    Product Name<input type="text" name="pname"><br>
    Description <input type="text" name="pdetail"><br>
    Brand <input type="text" name="brandName"><br>
    Category <select name="category">
      <?php
      $connect = mysqli_connect("localhost", "root", "", "computerstore");
      $sql = 'SELECT categoryid,cname from category';
      $result = mysqli_query($connect, $sql);
      if (!$result) {
        echo mysqli_error() . '<br>';
        die('Can not access database!');
      } else {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row['categoryid'] . '">' . $row['cname'] . '</option>';
        }
        mysqli_close($connect);
      }
      ?>
    </select><br>
    Price <input type="number" name="price"><br>
    <input type="submit" value="SUBMIT">
  </form>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {/*
    $connect = mysqli_connect("localhost", "root", "", "computerstore");
    $sql = 'SELECT categoryid,cname from category';
    $result = mysqli_query($connect, $sql);
    if (!$result) {
      echo mysqli_error() . '<br>';
      die('Can not access database!');
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        
      }
      mysqli_close($connect);
    }*/
  }
  ?>
</body>

</html>