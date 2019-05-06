<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function validateSelect($data){
  if($data!="Choose..."){
    return true;
  }else{
    return false;
  }
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
function validateCName($cname){
  if(strlen($cname)>0&&strlen($cname)<=20)
    return true;
  else
    return false;
}
function validateBName($bname){
  if(strlen($bname)>0&&strlen($bname)<=20)
    return true;
  else
    return false;
}
function getPriceResult($priceResult){
  if(!$priceResult)
    return 'Price can not be 0 or more than 2147483647 <br>';
}
function getPDetailResult($pdetailResult){
  if(!$pdetailResult)
  return 'Details are required<br>';
}
function getPNameResult($pnameResult){
  if(!$pnameResult)
      return 'Name is required<br>';
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
function getcidResult($cidResult){
  if(!$cidResult){
    return 'Category is required<br>';
  }
}
function getbidResult($bidResult){
  if(!$bidResult){
    return 'Brand is required<br>';
  }
}
function getcnameResult($cnameResult){
  if(!$cnameResult){
    return 'Category Name can not be empty and lenght can not be more than 20 characters<br>';
  }
}
function getbnameResult($bnameResult){
  if(!$bnameResult){
    return 'Brand Name can not be empty and lenght can not be more than 20 characters<br>';
  }
}
?>
