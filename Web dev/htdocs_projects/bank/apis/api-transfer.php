<?php

ini_set('user_agent', 'any');
ini_set('display_errors', 0);

session_start();
if( !isset($_SESSION['sUserId'] ) ){
  sendResponse(-1, __LINE__, 'You must login to use this api');
}

if( empty( $_GET['phone'] ) ){ sendResponse(-1, __LINE__, 'Phone missing'); }
if( empty( $_GET['amount'] ) ){ sendResponse(-1, __LINE__, 'Amount is missing'); }
if( empty( $_GET['message'] ) ){ sendResponse(-1, __LINE__, 'Message is missing'); }

// Validate phone
$sPhone = $_GET['phone'] ?? '';
if( strlen($sPhone) != 8 ){ sendResponse(-1, __LINE__, 'Phone must be 8 characters in length'); }
if( !ctype_digit($sPhone)  ){ sendResponse(-1, __LINE__, 'Phone can only contain numbers'); }

// Validate amount
$iAmount = $_GET['amount'] ?? '';
if( !ctype_digit($iAmount)  ){ sendResponse(-1, __LINE__, 'Amount can only contain numbers'); }

// Validate message
$sMessage = $_GET['message'] ?? '';

$sData = file_get_contents('../data/clients.json');
$jData = json_decode( $sData );

if( $jData == null){ sendResponse(-1, __LINE__, 'Cannot convert data to JSON'); }

$jInnerData = $jData->data;

//if the phone is not in my bank, get list from central bank
if( !$jInnerData->$sPhone ){
  $jListOfBanks = fnjGetListOfBanksFromCentralBank();
  // loop through the list
  // connect to each bank
  foreach( $jListOfBanks as $sKey => $jBank ){
    // echo $jBank->url;
    // echo $jBank->key;
    $sUrl = $jBank->url.'/apis/api-handle-transaction?phone='.$sPhone.'&amount='.$iAmount.'&message='.$sMessage;
    // echo $sUrl.'<br>';
    //talk to the other bank
    $sBankResponse =  file_get_contents($sUrl);
    $jBankResponse = json_decode($sBankResponse);

    if( $jBankResponse->status == 1 && 
        $jBankResponse->code && 
        $jBankResponse->message ){
        // header('Location: api-handle-transaction'); 
        sendResponse( 1, __LINE__ , $jBankResponse->message);
        // sendResponse( 1, __LINE__ , $jBankResponse->message + $iAmount);
    }
  }
  sendResponse( 2, __LINE__ , 'Phone does not exist' );
}


sendResponse( 1, __LINE__ , 'Phone registered locally' );
// Continue transfering the money
// Take money from the logged user
// Give it to the corresponding phone

// getListOfBanksFromCentralBank();

// **************************************************
function sendResponse($iStatus, $iLineNumber, $sMessage){
  echo '{"status":'.$iStatus.', "code":'.$iLineNumber.',"message":"'.$sMessage.'"}';
  exit;
}

// **************************************************
function fnjGetListOfBanksFromCentralBank(){
  // get the list of banks
  $sData = file_get_contents('https://ecuaguia.com/central-bank/api-get-list-of-banks.php?key=1111-2222-3333');
  return json_decode($sData);
}


