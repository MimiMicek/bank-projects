<?php

ini_set('display_errors', 0);

$jClient->name = 'A';
echo $jClient->name;

if(!$jClient->price){ echo 'No price';}
/* $jTransaction->amount = 10;
$jClient->transactions = $jTransaction;
 */
/* $aLetters = [];
array_push($aLetters, 'a', 'b', 'c');
//Associative array
$aLettersTest = []; 
$aLettersTest['one'] = "a";//dont need to delcare an array before we use it
$aLettersTest['two'] = "a";
echo json_encode($aLettersTest);*/
