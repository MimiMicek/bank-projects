<?php

//poslati activation link prvo pa onda kad se klikne
//otici na novu stranicu Forgot password
//onda napraviti isto kao i u Change password
//samo napraviti novi password i save

//GET the Number from the database and send an email 
$sPhone = $_GET['phone'];

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
if( $jData == null ){ sendResponse(0, __LINE__); }
$jInnerData = $jData->data;

if(!$jInnerData->$sPhone){
  echo 'the phone doesnt match any in the database!';
}

//setting the activationKey and the link
$jInnerData->$sPhone->activationKey = uniqid();
$sActivationKey = $jInnerData->$sPhone->activationKey;
$sEmail = $jInnerData->$sPhone->email;
$sSubject = "Forgot password link";
$sContent = "Hello! Please click on the following link to get a new password :)! http://mimi-micek.website/set-new-password.php?phone=$sPhone&activation-key=$sActivationKey";

/* if($sActivationKey != $jInnerData->$sPhone->activationKey){
  echo 'Cannot activate this';
  exit;
} */

$sData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents('../data/clients.json', $sData);

mail($sEmail, $sSubject, $sContent);