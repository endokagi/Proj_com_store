<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function validatePrice($price){
  if($price>0&&$price<=2147483647){
    return true;
  }else{
    return false;
  }
}
function validateProductDetail($pdetail){
  if(strlen($pdetail)>0&&strlen($pdetail)<=500)
    return true;
  else
    return false;
}
function validateProductName($pname){
  if(strlen($pname)>0&&strlen($pname)<=100)
    return true;
  else
    return false;
}
function showPriceResult($priceResult){
  if(!$priceResult)
      echo 'Invalid Price<br>';
}
function showPDetailResult($pdetailResult){
  if(!$pdetailResult)
      echo 'Invalid Detail<br>';
}
function showPNameResult($pnameResult){
  if(!$pnameResult)
      echo 'Invalid Name<br>';
}

?>
