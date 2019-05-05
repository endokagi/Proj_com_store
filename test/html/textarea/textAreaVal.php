
<?php
$connect = mysqli_connect("localhost","root","","computerstore");
$sql = 'select pname,pdetail from product';
$result = mysqli_query($connect,$sql);
if(!$result){
    echo mysqli_error($connect);
    die("can not access database");
}else{
    echo '<form action="editTextAreaVal.php" method="get"> Product List <select name="pdetail">';
    while($row = mysqli_fetch_array($result)){
        echo '<option value="'.$row[1].'">'.$row[0].'</option>';
    }
    echo '</select> <input type="submit" value="submit"></form>';
}
?>