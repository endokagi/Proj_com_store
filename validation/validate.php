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


function validateTel($Tel){
  if(strlen($Tel)>0&&strlen($Tel)<=20){
    return true;
  }else{
    return false;
  }
}

function validateFirstName($Firstname){
  if(strlen($Firstname)>0&&strlen($Firstname)<=20)
    return true;
  else
    return false;
}

function validateLastName($Lastname){
  if(strlen($Lastname)>0&&strlen($Lastname)<=20)
    return true;
  else
    return false;
}

function validateAddress($Address){
  if(strlen($Address)>0&&strlen($Address)<=30)
    return true;
  else
    return false;
}

function showFirstNameResult($FnameResult){
  if(!$FnameResult)
      echo 'Invalid Firstname<br>';
}

function showLastNameResult($LnameResult){
  if(!$LnameResult)
      echo 'Invalid Lastname<br>';
}

function showAddressResult($AddressResult){
  if(!$AddressResult)
      echo 'Invalid Address<br>';
}

function showTelephoneResult($TelResult){
  if(!$TelResult)
      echo 'Invalid Telephone<br>';
}

?>
