<?php

$sPhone = '25252525';
$sOldPass = $_POST['txtOldPass'] ?? '';
$sNewPass = $_POST['txtNewPass'] ?? '';
$sConfirmNewPass = $_POST['txtConfirmNewPass'] ?? '';

//VALIDATE

$sUser = file_get_contents($sPhone.'.json');//opening the file 25252525.json
$jUser = json_decode($sUser);

//check if the conversion is well done 

if($jUser->oldPass != $sOldPass ){
  echo 'The old password is not found in the system';
  exit;
} 

if($jUser->newPass == $sOldPass ){
  echo 'The old password and the new are the same!';
  exit;
}

if($sNewPass != $sConfirmNewPass){
  echo 'New passwords dont match';
  exit;
}


$jUser->oldPass = $sNewPass;
$jUser->confirmNewPass = $sConfirmNewPass;
$sData = json_encode($jUser, JSON_PRETTY_PRINT);
file_put_contents($sPhone.'.json', $sData);

echo 'User activated <a href="login"> click here to login </a>';

