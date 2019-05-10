<?php

session_start();
$sUserId = $_SESSION['sUserId'];

if( !isset($_SESSION['sUserId'] ) ){
    sendResponse(-1, __LINE__, 'You must login to use this api');
}

//fetch all data that hasnt been read

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
// check if json is valid
if($jData == null ){sendResponse(-1, __LINE__, 'cant fetch json data'); }
$jInnerData = $jData->data;

$jTransactionsNotRead = $jInnerData->$sUserId->transactionsNotRead;
$jTransactionsRead = $jInnerData->$sUserId->transactions;

echo json_encode($jTransactionsNotRead);


//delete whats inside the transactionsNotRead
// if($jTransactionsNotRead != $jTransactionsRead){
//     echo json_encode($jTransactionsNotRead);
// }

