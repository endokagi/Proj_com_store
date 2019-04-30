<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        require_once("../../validation/validate.php");
        $pdetail=test_input($_POST['pdetail']);
        $pname=test_input($_POST['pname']);
        $pid=$_POST['productid'];
        $price=$_POST['price'];
        $bid=$_POST['bid'];
        $cid=$_POST['cid'];

        $priceResult=validatePrice($price);
        $pdetailResult=validateProductDetail($pdetail);
        $pnameResult=validateProductName($pname);

        if($priceResult&&$pdetailResult&&$pnameResult){
            $connect=mysqli_connect("localhost","root","","computerstore");
            $sql='update product
            set 
            pname="'.$pname.'",
            pdetail="'.$pdetail.'",
            price='.$price.',
            categoryid='.$cid.',
            brandid='.$bid.'
            where productid='.$pid;
            $result=mysqli_query($connect,$sql);
            if(!$result){
                echo mysqli_error($connect).'<br>';
                die('Can not access database');
            }else
                echo 'Edit Successful.<br><a href="../">Product List</a>';
        }else{
            showPNameResult($pnameResult);
            showPDetailResult($pdetailResult);
            showPriceResult($priceResult);
            echo '<table border="1"><tr><td>Edit Fail.</td></tr></table><a href="../">Product List</a>';
        }
    }else{
        header("location:../");
    }


    
?>