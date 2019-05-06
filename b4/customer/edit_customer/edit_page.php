<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

  require_once("../../../validation/validate.php");
  $Firstname=test_input($_POST['Fname']);
  $Lastname=test_input($_POST['Lname']);
  $Address=test_input($_POST['address']);
  $Tel=$_POST['tel'];



$FnameResult= validateFirstName($Firstname);
$LnameResult=validateLastName($Lastname);
$AddressResult=validateAddress($Address);
$TelResult=validateTel($Tel);


if($FnameResult&&$LnameResult&&$AddressResult&&$TelResult){
$connect = mysqli_connect("localhost","root","","computerstore");
$sql = 'UPDATE customer SET CFirstname="'.$_POST["Fname"].'", CLastname ="'.$_POST["Lname"].'",
Address= "'.$_POST["address"].'", TEL="'.$_POST["tel"].'" WHERE CustomerID = "'.$_POST["customerid"].'"';
$result = mysqli_query($connect,$sql);
    if(!$result){
                echo mysqli_error($connect).'<br>';
                die('Can not access database');
            }else
                echo '<script>alert("Edit Successful.")
                window.location.href="../list of customers/index.php"
                </script>';
        }else{
            showFirstNameResult($FnameResult);
            showLastNameResult($LnameResult);
            showAddressResult($AddressResult);
            showTelephoneResult($TelResult);
            echo '<table border="1"><tr><td>Edit Fail.</td></tr></table><a href="../">Product List</a>';
        }
    }else{
        header("location:../");
    }

?>