<?php

ini_set('display_errors',0);

session_start();
// 1. check if user is logged
// in new browser, redirect to login page, if session isn't logged in
if(!isset($_SESSION['sUserId']) ){
    //redirect in ajax with javascript, not header('Location:)
    //inform the user with the function, 0 = false / error
    sendResponse(-1,__LINE__, 'You must login to use this api');
}

// provide me with the phone number i have to check. if it is empty, show nothing
$sPhone = $_GET['phone'] ?? '';
// 2. check if phone is missing or not
if(empty($sPhone)){sendResponse(-1,__LINE__, 'Phone missing');}
// 3. validate phone - test in postman if the conditions work
if( strlen($sPhone) != 8 ){ sendResponse(-1, __LINE__, 'phone must be 8 characters in length'); }
if( !ctype_digit($sPhone)  ){ sendResponse(-1, __LINE__, 'phone can only contain numbers'); }


// 4. does the phone number exist? check the clients vs. the bank list api
$sData = file_get_contents('../data/clients.json');
// echo $sData;
$jData = json_decode($sData);
//if conversion was unsuccesfull

if($jData == null){ sendResponse(-1, __LINE__, 'cannot convert data to JSON'); }

//we know we have to work with the inner data
$jInnerData = $jData->data;

// if phone is not registered
if( !$jInnerData->$sPhone){
    //if the phone is not in the system, ask central bank for list of banks
    // sendResponse(0, __LINE__, 'phone not registered locally');
    
}


// SUCCESS
//if phone is valid, i can transfer money with people inside my own bank
sendResponse(1, __LINE__, 'Phone is registered locally');


//if success: continue transferring the money
//take money from the logged user
//give it to the corresponding phone


// getListOfBanksFromCentralBank();


// ************************************************************

function sendResponse($iStatus, $iLineNumber, $sMessage){
    echo '{"status":'.$iStatus.', "code":'.$iLineNumber.', "message":"'.$sMessage.'" }';
    exit;
  }

//if the phone is not in the system, ask central bank for list of banks
//void function, doesn't return anything
// function getListOfBanksFromCentralBank(){
//     //echo 'getting list...'
//     //get list of banks - connect to central bank with a key
//     //what you get from central bank is text
//     $sData = file_get_contents('https://ecuaguia.com/central-bank/api-get-list-of-banks.php?key=1111-2222-3333');
//     echo $sData;

// }

