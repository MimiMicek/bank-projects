<?php

ini_set('display_errors', 0);

$sPhone = $_POST['txtLoginPhone'] ?? '';
if( empty($sPhone) ){ sendResponse(0, __LINE__);  }
if( strlen($sPhone) != 8 ){ sendResponse(0, __LINE__); }
if( !ctype_digit($sPhone)  ){ sendResponse(0, __LINE__);  }

$sPassword = $_POST['txtLoginPassword'] ?? '';
if( empty($sPassword) ){ sendResponse(0, __LINE__);  }
if( strlen($sPassword) < 4 ){ sendResponse(0, __LINE__); }
if( strlen($sPassword) > 50 ){ sendResponse(0, __LINE__); }

//when all is valid, open the file and check it
$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
if( $jData == null ){ sendResponse(0, __LINE__); }
$jInnerData = $jData->data;

//check if input password matched hashed password in database

if( !password_verify( $sPassword, $jInnerData->$sPhone->password )  ){ 
  sendResponse(0, __LINE__); 
}


/* $date = date('d m y', time());
$jInnerData->$sPhone->attemptLoginDate = $date;
console.log($jClient);
$loginCounter += 1;
$jInnerData->$sPhone->loginCounter = $loginCounter;
if ($loginCounter == 3) {
  echo 'your account is now blocked';
} */

//$jInnerData ->active == 1 new if statement check if user is active
//if($jInnerData->$sPhone->active != 1){sendResponse};

// SUCCESS
session_start();
$_SESSION['sUserId'] = $sPhone;
sendResponse(1, __LINE__);


// **************************************************

function sendResponse($bStatus, $iLineNumber){
  echo '{"status":'.$bStatus.', "code":'.$iLineNumber.'}';
  exit;
}
