<?php

$sData = file_get_contents('clients.json');
$jData = json_decode($sData);

if($jData == null){
  echo 'check the database';
}

$jData = $jData->data;
$sLogedUserId = 'ID1';

//direct pointer inside of the memory to use instead of loops, because its faster
$sLogedName = $jData->$sLogedUserId->name;
$sLogedPhone = $jData->$sLogedUserId->phone;
$sLogedBalance = $jData->$sLogedUserId->balance;
$iTransferAmount = 1;
$jData->$sLogedUserId->balance -= $iTransferAmount;

echo "<div>Name is: $sLogedName </div>";
echo "<div>Phone is: $sLogedPhone </div>";
echo "<div>Balance is: {$jData->$sLogedUserId->balance} </div>";//putting a complex structure with {}

$jData->ID3->balance += $iTransferAmount;

echo "<div>Name is: {$jData->ID3->name} </div>";
echo "<div>Phone is: {$jData->ID3->phone} </div>";
echo "<div>Balance is: {$jData->ID3->balance} </div>";