<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
$connect = mysqli_connect("localhost","root","","computerstore");
$sql = 'INSERT INTO customer VALUES("","'.$_POST['name'].'","'.$_POST['Lname'].'","'.$_POST['address'].'","'.$_POST['phone'].'")';
$result = mysqli_query($connect,$sql);

$sqli = 'SELECT * FROM customer';
$result1 = mysqli_query($connect,$sqli);

echo '<table border = "1" cellpading = "0" cellsacing = "0">';
echo'<tr><td>CustomerID</td><td>Firstname</td><td>Lastname</td><td>Address</td><td>Telephone Number</td>';            

while ($row=mysqli_fetch_assoc($result1)){                                                                                                                                  
echo'<tr>';
echo '<td>'.$row['CustomerID'].'</td>';
echo '<td>'.$row['CFirstname'].'</td>';
echo '<td>'.$row['CLastname'].'</td>';
echo '<td>'.$row['Address'].'</td>';
echo '<td>'.$row['TEL'].'</td>';

}
echo '</table><br><br>' ;

echo '<a href="Addcustomer.php">Add</a><a href="../">Back</a>';

  mysqli_close($connect);


?>
</body>
</html>