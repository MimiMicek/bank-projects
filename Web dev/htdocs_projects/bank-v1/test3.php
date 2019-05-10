<?php

$iSignupDate = time();

echo date('D-d-M-Y', $iSignupDate);
/* echo $iSignupDate; */

$sPassword = 'A1B2';
//password_hash(password, hash algorithm)
$sPasswordHash = password_hash($sPassword, 1);
echo $sPasswordHash;

$sLoginPassword = 'A1B2';
$sLoginPasswordHash = password_hash($sLoginPassword, PASSWORD_DEFAULT);
echo '<br>';

if($sPasswordHash == $sLoginPassword){
  echo 'MATCH';
}else{
  echo 'PROBLEM';
}

